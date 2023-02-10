<?php

namespace App\Http\Controllers;

use App\Events\ProjectSaved;
use App\Http\Requests\SaveProjectRequest;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        // return Project::onlyTrashed()->with('category')->latest()->paginate();
        $projects = Project::with('category')->latest()->paginate();
        $newProject = new Project;
        $deletedProjects =  Project::onlyTrashed()->get();

        return view('projects.index', compact('projects', 'newProject', 'deletedProjects'));
    }

    public function create()
    {
        $this->authorize('create', $project = new Project);

        return view('projects.create', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id'),
        ]);
    }

    public function store(SaveProjectRequest $request)
    {
        $project = new Project( $request->validated() );
        
        $this->authorize('create', $project);

        $project->image = $request->file('image')->store('images', 'public');

        $project->save();

        ProjectSaved::dispatch($project);
        
        return redirect()->route('projects.index')->with('status', 'El proyecto fue creado con éxito');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);

        return view('projects.edit', [
            'project'    => $project,
            'categories' => Category::pluck('name', 'id'),
        ]);
    }

    public function update(SaveProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);

        if ( $request->hasFile('image') ) {
            Storage::disk('public')->delete($project->image);

            $project->fill( $request->validated() );
            $project->image = $request->file('image')->store('images', 'public');
            $project->save();

            ProjectSaved::dispatch($project);

        } else {
            $project->update( array_filter($request->validated()));
        }


        return redirect()->route('projects.show', $project)->with('status', 'El proyecto fue actualizado con éxito');
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        // Storage::disk('public')->delete($project->image);

        $project->delete();
        
        return redirect()->route('projects.index')->with('status', 'El proyecto fue eliminado con éxito');
    }

    public function restore($projectUrl)
    {
        $project = Project::withTrashed()->whereUrl($projectUrl)->firstOrFail();

        $this->authorize('restore', $project);

        $project->restore();
        
        return redirect()->route('projects.index')->with('status', 'El proyecto fue eliminado restaurado con éxito');
    }

    public function forceDelete($projectUrl)
    {
        $project = Project::withTrashed()->whereUrl($projectUrl)->firstOrFail();

        $this->authorize('forceDelete', $project);

        Storage::disk('public')->delete($project->image);
        
        $project->forceDelete();
        
        return redirect()->route('projects.index')->with('status', 'El proyecto fue eliminado permanentemente');
    }
}
