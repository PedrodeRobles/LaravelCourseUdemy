@csrf
<div class="input-group mb-3">
    <div class="custom-file">
        <input name="image" type="file" class="custom-file-input" id="inputGroupFile02">
        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
    </div>
    <div class="input-group-append">
        <span class="input-group-text" id="">Upload</span>
    </div>
</div>

<div class="form-group">
    <label>
        Título del proyecto
    </label>
    <input 
        class="form-control border-0 bg-light shadow-sm"
        type="text" 
        name="title" 
        value="{{ old('title', $project->title) }}">
    <br>
</div>

<div class="form-group">
    <label>
        URL del proyecto
    </label>
    <input 
        class="form-control border-0 bg-light shadow-sm"
        type="text" 
        name="url" 
        value="{{ old('url', $project->url) }}">
    <br>
</div>

<div class="form-group">
    <label>
        Descripción del proyecto
    </label>
    <textarea 
        class="form-control border-0 bg-light shadow-sm"
        name="description"> {{ old('description', $project->description) }}
    </textarea>
    <br>
</div>



<button class="btn btn-primary btn-lg btn-block text-white">{{ $btnText }}</button>

<a class="btn btn-link btn-block"
    href="{{ route('projects.index') }}">
    Cancelar
</a>