@extends('layout')

@section('title', 'Crear portafolio')


@section('content')
    <h1>Crear un nuevo portafolio</h1>

    @include('partials.validation-errors') 

    <form method="POST" action="{{ route('projects.store') }}">

        @include('projects._form', ['btnText' => 'Guardar'])
    </form>

@endsection
