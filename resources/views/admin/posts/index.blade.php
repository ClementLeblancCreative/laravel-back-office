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
                    <div class="list-group-item list-group-item-action d-flex p-0 align-items-center px-3">
                        @if($post->image)
                            <div class="d-flex">
                                <a class="position-relative h-100 me-3 text-danger text-decoration-none" href="{{route('posts.imagedestroy', $post->id )}}" onclick="if(!confirm('Vouler-vous vraiment supprimer l\'image')){return false}">
                                    <img src="{{asset('/images/'.$post->image)}}" alt="illustration" height="100" width="100">
                                    <i class="bi bi-x-lg end-0 me-1 position-absolute top-0"></i>
                                </a>
                            </div>
                        @endif
                        <a href="{{route('posts.show', [$post->id,$post->slug,false] )}}" class="align-items-center d-flex justify-content-between py-3 text-decoration-none text-muted w-100">
                            <div class="d-flex">
                                <div class="mx-2">
                                    @if ($post->statut == "Published")
                                        <span class="badge rounded-pill bg-success text-white">Publié</span>
                                    @else
                                        <span class="badge rounded-pill bg-danger text-white">Non publié</span>
                                    @endif
                                    @if ($post->category)
                                        <span class="badge rounded-pill bg-info text-dark mb-2">{{$post->category->name}}</span>
                                    @endif
                                    <br>
                                    @foreach ( $post->tags as $tag )
                                        <span class="badge rounded-pill mb-2"
                                        style="background-color: {{$tag->color}}; 
                                        color: #{{str_pad(dechex(255-hexdec(substr($tag->color,1,2))), 2, "0", STR_PAD_LEFT)
                                        .str_pad(dechex(255-hexdec(substr($tag->color,3,2))), 2, "0", STR_PAD_LEFT)
                                        .str_pad(dechex(255-hexdec(substr($tag->color,5,2))), 2, "0", STR_PAD_LEFT)}};"">{{$tag->name}}</span>
                                    @endforeach
                                    <h6 class="mb-0">{{$post->title}}</h6>
                                    <p class="mb-0 opacity-75">{{$post->description}}</p>
                                </div>
                            </div>
                            <div class="d-flex align-self-start gap-3">
                                <small class="opacity-50 text-nowrap">{{$post -> created_at}}</small>
                            </div> 
                        </a>
                    </div>
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