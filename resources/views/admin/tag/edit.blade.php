@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h1 class="mb-4">Edition de la catégorie '{{$tag->name}}': </h1>
        <div>
            <a class="btn btn-primary mt-1" href="{{ route('tag.index') }}">Retour</a>
        </div>
    </div>

    @include('partials.validation')

    <form class="row mb-4" method="post" action="{{route('tag.update',$tag->id)}}">
        @method('PUT')
        @csrf
        <div class="col-2">
            <label class="form-label" for="title">Nom</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nom" value="{{$tag->name}}" max="50" required>
        </div>
        <div class="col-1">
            <label class="form-label" for="title">Couleur</label>
            <input  class="border-0 h-50" name="color" id="color" value="{{$tag->color}}" type="color"/>
        </div>
        <div class="col-12">
            <button type="submit"class="btn btn-primary mt-1">Valider</button>
        </div>
    </form>
</div>  
@endsection