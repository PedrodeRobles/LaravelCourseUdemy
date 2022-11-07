@extends('layout')

@section('title', 'Contact')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            
            <form class="bg-white shadow rounded py-3 px-4" method="POST" action="{{ route('messages.store') }}">
                @csrf
                <h1 class="display-4">{{ __('Contact') }}</h1>
                <hr>
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input class="form-control bg-light shadow-sm @error('name') is-invalid @enderror border-0"
                        id="name"
                        name="name" 
                        type="text" 
                        placeholder="Nombre..." 
                        value="{{ old('name') }}">
        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                </div>
        
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control bg-light shadow-sm @error('email') is-invalid @enderror border-0"
                        id="email"
                        name="email" 
                        type="email" 
                        placeholder="Email..." 
                        value="{{ old('email') }}">
        
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                </div>
        
                <div class="form-group">
                    <label for="subject">Asunto</label>
                    <input 
                        class="form-control bg-light shadow-sm @error('subject') is-invalid @enderror border-0"
                        id="subject"
                        name="subject" 
                        type="text" 
                        placeholder="Asunto..." 
                        value="{{ old('subject') }}">
                        
                    @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                </div>
                
                <div class="form-group">
                    <label for="content">Contenido</label>
                    <textarea 
                        class="form-control bg-light shadow-sm @error('content') is-invalid @enderror border-0"
                        name="content" 
                        placeholder="Mensaje...">{{ old('content') }}
                    </textarea>
                        
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror    
                    <br>
                </div>
        
                <button class="btn btn-primary btn-lg btn-block text-white">{{__("Send") }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
