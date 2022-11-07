@extends('layout')

@section('title', 'Portafolio | ' . $project->title)

@section('content')
    <h1>{{ $project->title }}</h1>
    @auth
        <a href="{{ route('projects.edit', $project) }}">Editar</a>
        
        <form action="{{ route('projects.destroy', $project) }}" method="POST">
            @csrf @method('DELETE')
            <button>Eliminar</button>
        </form>
    @endauth

    <p>{{ $project->description }}</p>
    {{-- <p>{{ $project->description }}</p> --}}
@endsection