@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h1 class="mb-4">Les articles creatives: </h1>
        <div>
            <a class="btn btn-primary mt-1" href="{{ route('posts.create') }}">Creer</a>
        </div>
    </div>

    <div class="list-group w-auto mb-4">
        @if (!($posts->isEmpty()))   
            @foreach ( $posts as $post )
                <div class="d-flex gap-2 w-75 justify-content-between align-items-center">
                    <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3">
                        <div>
                            <h6 class="mb-0">{{$post->title}}</h6>
                            <p class="mb-0 opacity-75">{{$post->description}}</p>
                        </div>
                        <small class="opacity-50 text-nowrap">{{$post -> created_at}}</small>
                    </a>  
                    <div>
                        <form method="post" action="{{ route('post.destroy', $post->id )}}">
                            @csrf
                            {{ method_field('DELETE') }}
                        
                            <button type="submit" class="btn btn-danger">Effacer</button>
                        </form>
                        <form method="post" action="{{ route('post.edit', $post->id )}}">
                            @csrf
                            {{ method_field('GET') }}
                        
                            <button type="submit" class="btn btn-primary">Editer</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>  
@endsection