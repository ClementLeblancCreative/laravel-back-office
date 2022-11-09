@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="d-flex justify-content-between">
        <h1 class="mb-4">Ajout d'article: </h1>
        <div>
            <a class="btn btn-primary mt-1" href="{{ route('posts.index') }}">Retour</a>
        </div>
    </div>

    @include('partials.alert')
    @include('partials.validation')

    <form class="row g-3 mb-4" method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-4">
            <label class="form-label" for="title">Titre</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Titre" required>
        </div>
        <div class="col-4">
            <label class="form-label" for="description">Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Description" required>
        </div>
        <div class="col">
            <label class="form-label">Statut</label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="status" name="statut" checked>
                <label class="form-check-label" for="status">Publié</label>
            </div>
        </div>
        <div class="col">
            <label class="form-label" for="categorie">Categories</label>
            <select class="form-select"  id="categorie" name="categorie">
                <option value="">Aucune</option>
                @foreach ($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option> 
                @endforeach
              </select>
        </div>

        <div class="col-4">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" id="image" name="image" accept="image/png, image/jpeg">
        </div>

        <div class="col-4">
            <label class="form-label" for="tag">Tags</label>
            <select class="form-select"  id="tag" name="tag[]" multiple>
                @foreach ($tag as $t)
                    <option value="{{$t->id}}"   @if (in_array($t->id,old('tags',[])))
                        selected
                    @endif>{{$t->name}}</option> 
                @endforeach
              </select>
        </div>
        
        <div class="col-12">
            <button type="submit"class="btn btn-primary mt-1">Valider</button>
        </div>
    </form>
</div>  
@endsection