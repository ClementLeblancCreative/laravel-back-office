@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h1 class="mb-4">Edition de la catégorie '{{$category->name}}': </h1>
        <div>
            <a class="btn btn-primary mt-1" href="{{ route('category.index') }}">Retour</a>
        </div>
    </div>

    @include('partials.validation')

    <form class="row mb-4" method="post" action="{{route('category.update',$category->id)}}">
        @method('PUT')
        @csrf
        <div class="col">
            <label class="form-label" for="title">Nom</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nom" value="{{$category->name}}" required>
        </div>
        
        <div class="col-12">
            <button type="submit"class="btn btn-primary mt-1">Valider</button>
        </div>
    </form>
</div>  
@endsection