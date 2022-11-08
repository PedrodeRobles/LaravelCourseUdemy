@extends('layout')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-12 col-lg-6">
            <h1 class="display-4 text-primary">Desarrollo Web</h1>
            <p class="lead text-secodnary">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio magni sequi obcaecati maiores inventore, sed sint aspernatur harum cupiditate, laudantium maxime dignissimos perspiciatis ab architecto consequuntur, cumque dolorum vitae nemo.
            </p>
            <a class="btn btn-lg btn-block btn-primary text-white" href="{{ route('contact') }}">
                Contáctame
            </a>
            <a class="btn btn-lg btn-block btn-outline-primary" href="{{ route('projects.index') }}">
                Portafolio
            </a>
        </div>
        <div class="col-12 col-lg-6">
            <img class="img-fluid my-4" src="/img/home.svg" alt="Dessarrollo Web">
        </div>
    </div>
</div>

@endsection