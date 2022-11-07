@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <h1 class="mb-4">{{$post->title}} </h1>
        <div>
            <a class="btn btn-primary mt-1" 
                href="{{ route('posts.index') }}">Détails</a>
        </div>
    </div>
    @if (!($post->statut=="Published"))
        <h4>{{$post->statut=="Published"?"Publié":"Non publié"}}</h4>
    @endif
    <p>{{$post->description}}</p>
    <p>Crée le {{$post->created_at}}</p> 
    @if ($post->updated_at)
        <p> Mis à jour le {{$post->updated_at}}</p>
    @endif
@endsection