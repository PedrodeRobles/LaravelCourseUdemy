@extends('layout')

@section('title', 'Portafolio')


@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="display-4 mb-0">Portafolio</h1>
        @auth
            <a class="btn btn-primary text-white" href="{{ route('projects.create') }}">
                Crear proyecto
            </a>
        @endauth
    </div>

    <p class="lead text-secondary">Proyectos realizados Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        
    <div class="d-flex flex-wrap justify-content-between align-items-start">
        @forelse ($projects as $project)
            <div class="card" style="width: 18rem;">
                @if ($project->image)
                    <img class="card-img-top" src="/storage/{{ $project->image }}" alt="Card image cap">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text text-truncate">{{ $project->description }}</p>
                    <p class="card-text">{{ $project->created_at->format('d/m/Y') }}</p>
                    <a href="{{ route('projects.show', $project) }}" class="btn btn-primary">Ver más...</a>
                </div>
            </div>
        @empty
        <li class="list-group-item border-0 mb-3 shadow-sm">
            No hay proyectos para mostrar
        </li>
        @endforelse
        {{ $projects->links() }}
    </div>
</div>
@endsection
