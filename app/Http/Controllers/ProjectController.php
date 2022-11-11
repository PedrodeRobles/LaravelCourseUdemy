<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        $projects = Project::latest()->paginate();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create', [
            'project' => new Project()
        ]);
    }

    public function store(SaveProjectRequest $request)
    {
        $project = new Project( $request->validated() );
        $project->image = $request->file('image')->store('images', 'public');
        $project->save();

        return redirect()->route('projects.index')->with('status', 'El proyecto fue creado con éxito');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(SaveProjectRequest $request, Project $project)
    {
        $project->update($request->validated());

        return redirect()->route('projects.show', $project)->with('status', 'El proyecto fue actualizado con éxito');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('status', 'El proyecto fue eliminado con éxito');
    }
}
