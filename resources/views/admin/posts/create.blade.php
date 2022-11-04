@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h1 class="mb-4">Ajout d'article: </h1>
        <div>
            <a class="btn btn-primary mt-1" href="{{ route('posts.index') }}">Retour</a>
        </div>
    </div>

    <form class="row mb-4" method="post" action="{{route('posts.store')}}">
        @csrf
        <div class="col">
            <label class="form-label" for="title">Titre</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Titre" required>
        </div>
        <div class="col">
            <label class="form-label" for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" placeholder="slug" required>
        </div>
        <div class="col">
            <label class="form-label" for="description">Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Description" required>
        </div>
        
        <div class="col-12">
            <button type="submit"class="btn btn-primary mt-1">Valider</button>
        </div>
    </form>
</div>  
@endsection