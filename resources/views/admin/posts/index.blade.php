@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h1 class="mb-4">Les articles creatives: </h1>
        <div>
            <a class="btn btn-primary mt-1" href="{{ route('posts.create') }}"><i class="bi bi-plus-lg"></i> Creer</a>
        </div>
    </div>

    <div class="list-group w-auto mb-4">
        @if (!($posts->isEmpty()))   
            @foreach ( $posts as $post )
                <div class="d-flex gap-2 w-100">
                    <div href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3 justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">{{$post->title}}</h6>
                            <p class="mb-0 opacity-75">{{$post->description}}</p>
                        </div>
                        <div class="d-flex align-content-start gap-3">    
                            <small class="opacity-50 text-nowrap">{{$post -> created_at}}</small>
                            <a href="{{ route('posts.destroy', $post->id )}}" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                            <a href="{{ route('posts.edit', $post->id )}}" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                        </div>
                    </div>  
                </div>
            @endforeach
        @endif
    </div>
</div>  
@endsection