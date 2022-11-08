@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <h1 class="mb-4">{{$post->title}} </h1>
        <div>
            <a class="btn btn-primary mt-1" 
                href="{{ route('posts.index') }}">Modifier</a>
        </div>
    </div>
    
    @if ($post->category)
    <div class="badge rounded-pill bg-info text-dark mb-2">{{$post->category->name}}</div><br>
    @endif
    @if($post->image)
        <img src="{{asset('/images/'.$post->image)}}" alt="illustration">
    @endif
    <p>{{$post->description}}</p>
    <p>Crée le {{$post->created_at}}</p> 
    @if ($post->updated_at)
        <p> Mis à jour le {{$post->updated_at}}</p>
    @endif
@endsection