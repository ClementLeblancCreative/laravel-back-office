@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h1 class="mb-4">Les articles creatives: </h1>
        <div>
            <a class="btn btn-primary mt-1" href="{{ route('posts.create') }}"><i class="bi bi-plus-lg"></i> Creer</a>
        </div>
    </div>

    @include('partials.alert')

    <div class="list-group w-auto mb-4">
        @if (!($posts->isEmpty()))   
            @foreach ( $posts as $post )
                <div class="d-flex gap-3 w-100 justify-content-between align-items-center">
                    <a href="{{route('posts.show', [$post->id,$post->slug] )}}" class="list-group-item list-group-item-action d-flex py-3 justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">{{$post->title}}</h6>
                            <p class="mb-0 opacity-75">{{$post->description}}</p>
                        </div>
                        <div class="d-flex align-self-start gap-3">
                            <small class="opacity-50 text-nowrap">{{$post -> created_at}}</small>
                        </div> 
                    </a>
                    <div class="d-flex align-content-start gap-3">
                        <form method="get" action="{{ route('posts.destroy', $post->id )}}">
                            @csrf
                        
                            <button type="submit" class="btn btn-danger" onclick="if(!confirm('Vouler-vous vraiment supprimer l\'article {{$post->title}}')){return false}"><i class="bi bi-trash3"></i></button>
                        </form>
                        <a href="{{ route('posts.edit', $post->id )}}" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                    </div> 
                </div>
            @endforeach
        @endif
    </div>
</div>  
@endsection