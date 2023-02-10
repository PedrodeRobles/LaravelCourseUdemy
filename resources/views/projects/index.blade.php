@extends('layout')

@section('title', 'Portafolio')


@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        @isset($category)
            <div>
                <h1 class="display-4 mb-0">{{ $category->name }}</h1>
                <a href="{{ route('projects.index') }}">Regresar al portafolio</a>
            </div>
        @else
            <h1 class="display-4 mb-0">Portafolio</h1>
        @endisset
        @can('create', $newProject)
            <a class="btn btn-primary text-white" href="{{ route('projects.create') }}">
                Crear proyecto
            </a>
        @endcan
    </div>

    <p class="lead text-secondary">Proyectos realizados Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        
    <div class="d-flex flex-wrap justify-content-between align-items-start">
        @forelse ($projects as $project)
            <div class="card" style="width: 18rem;">
                @if ($project->image)
                    <img class="card-img-top" 
                        style="height: 150px; object-fit: cover" 
                        src="/storage/{{ $project->image }}" 
                        alt="Card image cap">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">{{ $project->created_at->format('d/m/Y') }}</p>
                    <p class="card-text text-truncate">{{ $project->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('projects.show', $project) }}" class="btn btn-primary">Ver más...</a>
                        @if ($project->category_id)
                            <a href="{{ route('categories.show', $project->category) }}" class="badge badge-secondary bg-black">  
                                {{ $project->category->name }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
        <li class="list-group-item border-0 mb-3 shadow-sm">
            No hay proyectos para mostrar
        </li>
        @endforelse
        {{ $projects->links() }}
    </div>
    @can('view-deleted-projects')    
        <h4>Papelera</h4>
        <ul class="list-group">
            @foreach ($deletedProjects as $deletedProject)
                <li class="list-item">
                    {{ $deletedProject->title }}
                    @can('restore', $deletedProject)
                    <form method="POST" 
                        action="{{ route('projects.restore', $deletedProject) }}" 
                        class="d-inline">
                        @csrf @method('PATCH')
                        <button class="btn btn-sm btn-info">Restaurar</button>
                    </form>
                    @endcan
                    @can('forceDelete', $deletedProject)
                    <form method="POST" 
                        onsubmit="return confirm('Esta acción no se puede deshacer, ¿Éstas seguro que desea realizar esta acción?')"
                        action="{{ route('projects.forceDelete', $deletedProject) }}" 
                        class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar permanentemente</button>
                    </form>
                    @endcan
                </li>
            @endforeach
        </ul>
    @endcan
</div>
@endsection
