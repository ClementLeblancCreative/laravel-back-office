@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <h1 class="mb-4">{{$post->title}} </h1>
        <div>
            <a class="btn btn-primary mt-1" 
            @if (isset($retour))
                href="{{ route('index') }}">Retour</a>
            @else
                href="{{ route('posts.index') }}">Retour</a>
            @endif
        </div>
    </div>
    
    @if ($post->category)
    <div class="badge rounded-pill bg-info text-dark mb-2">{{$post->category->name}}</div>
    @endif
    @foreach ( $post->tags as $tag )
        <span class="badge rounded-pill mb-2"
        style="background-color: {{$tag->color}}; 
        color: #{{str_pad(dechex(255-hexdec(substr($tag->color,1,2))), 2, "0", STR_PAD_LEFT)
        .str_pad(dechex(255-hexdec(substr($tag->color,3,2))), 2, "0", STR_PAD_LEFT)
        .str_pad(dechex(255-hexdec(substr($tag->color,5,2))), 2, "0", STR_PAD_LEFT)}};"">{{$tag->name}}</span>
    @endforeach
    <br>
    @if($post->image)
        <img src="{{asset('/images/'.$post->image)}}" alt="illustration">
    @endif
    <p>{{$post->description}}</p>
    <p>Crée le {{$post->created_at}}</p> 
    @if ($post->updated_at)
        <p> Mis à jour le {{$post->updated_at}}</p>
    @endif
@endsection