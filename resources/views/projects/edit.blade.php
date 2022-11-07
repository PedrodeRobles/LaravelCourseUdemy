@extends('layout')

@section('title', 'Editar portafolio')


@section('content')
    <h1>Editar portafolio</h1>

    @include('partials.validation-errors')

    <form method="POST" action="{{ route('projects.update', $project) }}">
        @method('PUT')
        
        @include('projects._form', ['btnText' => 'Actualizar'])
    </form>

@endsection
