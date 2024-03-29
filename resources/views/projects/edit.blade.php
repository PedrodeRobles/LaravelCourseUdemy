@extends('layout')

@section('title', 'Editar portafolio')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">

            @include('partials.validation-errors')

            {{-- @include('projects._form', [
                'btnText' => 'Actualizar'
                'action' => route('projects.update', $project),
                'method' => 'POST',
            ]) --}}
            
            <form class="bg-white py-3 px-4 shadow rounded" 
                method="POST" 
                action="{{ route('projects.update', $project) }}"
                enctype="multipart/form-data">
                @method('PUT')
                <h1 class="display-4">Editar portafolio</h1>
                <hr>
                @include('projects._form', ['btnText' => 'Actualizar'])
            </form>
        </div>
    </div>
</div>
@endsection
