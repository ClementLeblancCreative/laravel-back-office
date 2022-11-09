@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <h1 class="mb-4">{{$post->title}} </h1>
        <div>
            <a class="btn btn-primary mt-1" href="
            @if (isset($retour))
                {{ route('index') }}
            @else
                {{ route('posts.index') }}
            @endif
            ">Retour</a>
        </div>
    </div>
    
    @if ($post->category)
    <div class="badge rounded-pill bg-info text-dark mb-2">{{$post->category->name}}</div><br>
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
    <div class="d-flex">
        <a class="position-relative h-100 me-3 text-danger text-decoration-none" href="{{route('posts.imagedestroy', $post->id )}}" onclick="if(!confirm('Vouler-vous vraiment supprimer l\'image')){return false}">
            <img src="{{asset('/images/'.$post->image)}}" alt="illustration">
            <i class="bi bi-x-lg m-2 mt-1 position-absolute top-0 end-0"></i>
        </a>
    </div>
    @endif
    <p>{{$post->description}}</p>
    <p>Crée le {{$post->created_at}}</p> 
    @if ($post->updated_at)
        <p> Mis à jour le {{$post->updated_at}}</p>
    @endif
@endsection