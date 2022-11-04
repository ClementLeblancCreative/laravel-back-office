@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h1 class="mb-4">Edition de l'article '{{$post->title}}': </h1>
        <div>
            <a class="btn btn-primary mt-1" href="{{ route('posts.index') }}">Retour</a>
        </div>
    </div>

    <form class="row mb-4" method="post" action="{{route('posts.update',$post->id)}}">
        @method('PATCH')
        @csrf
        <div class="col">
            <label class="form-label" for="title">Titre</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Titre" value="{{$post->title}}" required>
        </div>
        <div class="col">
            <label class="form-label" for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" placeholder="slug" value="{{$post->slug}}" required>
        </div>
        <div class="col">
            <label class="form-label" for="description">Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="{{$post->description}}" required>
        </div>
        
        <div class="col-12">
            <button type="submit"class="btn btn-primary mt-1">Valider</button>
        </div>
    </form>
</div>  
@endsection