@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="d-flex justify-content-between">
        <h1 class="mb-4">Ajout de categories: </h1>
        <div>
            <a class="btn btn-primary mt-1" href="{{ route('category.index') }}">Retour</a>
        </div>
    </div>

    @include('partials.alert')
    @include('partials.validation')

    <form class="row" method="post" action="{{route('category.store')}}">
        @csrf
        <div class="col-2">
            <label class="form-label" for="title">Nom</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nom" max="50" required>
        </div>
        
        <div class="col-12">
            <button type="submit"class="btn btn-primary mt-1">Valider</button>
        </div>
    </form>
</div>  
@endsection