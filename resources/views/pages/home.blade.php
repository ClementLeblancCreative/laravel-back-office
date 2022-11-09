@extends('layouts.app')
@section('content')

<div class="px-4 py-5 my-5 text-center">
    <img class="d-inline-block mb-3" src="https://www.creative-formation.fr/wp-content/themes/creative-formation/assets/lettre-creative.svg" alt="Le C du logo Créative Formation" style="width: 50px">
    <h1 class="display-5 fw-bold">Bienvenue sur le blog de Créative</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Retrouvez-ici nos dernières actualités !</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a class="btn btn-primary btn-lg px-4 gap-3" href="#news">Accédez aux actualités</a>
        </div>
    </div>
</div>
    
<h1 class="mb-4">Les derniers articles : </h1>
<div class="container d-flex" id="news" style="margin-bottom:150px">

    <div class="list-group w-75 mb-4">
        @foreach ( $posts as $post )
            <div class="d-flex gap-3 w-100 justify-content-between align-items-center">
                <a href="{{route('index.post', ['Acceuil',$post->slug,$post->id] )}}" class="list-group-item list-group-item-action d-flex py-3 justify-content-between align-items-center">
                    <div class="d-flex">
                        @if($post->image)
                            <img src="{{asset('/images/'.$post->image)}}" alt="illustration" width="100" height="100">
                        @endif
                        <div class="mx-2">
                            @if ($post->category)
                            <span class="badge rounded-pill bg-info text-dark mb-2">{{$post->category->name}}</span><br>
                            @endif
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
        @endforeach
    </div>
    <div class="mx-5 w-25">
        @if(isset($categories))
            <div class="card-body p-2 mb-2 border-opacity-50  rounded-start rounded-5 border border-secondary"">
                <h5 class="card-title">Categories</h5>
                <p class="card-text">
                @foreach ($categories as $category)
                    <a href="{{route('searchCategory',$category->id )}}" class="badge rounded-pill bg-info text-dark mb-2 text-decoration-none">{{$category->name}}</a>
                @endforeach</p>
            </div>
        @endif
        @if(isset($tags))
            <div class="card-body p-2 mb-2 border-opacity-50 rounded-start rounded-5 border border-secondary"">
                <h5 class="card-title">Tags</h5>
                <p class="card-text">
                @foreach ($tags as $tag)
                    <a class="badge mb-2 rounded-pill text-decoration-none" href="{{route('searchTag',$tag->id )}}"
                    style="background-color: {{$tag->color}}; 
                    color: #{{str_pad(dechex(255-hexdec(substr($tag->color,1,2))), 2, "0", STR_PAD_LEFT)
                    .str_pad(dechex(255-hexdec(substr($tag->color,3,2))), 2, "0", STR_PAD_LEFT)
                    .str_pad(dechex(255-hexdec(substr($tag->color,5,2))), 2, "0", STR_PAD_LEFT)}};"">{{$tag->name}}</a>
                @endforeach</p>
            </div>
        @endif
        <a href="{{route('index')}}" class="btn btn-primary">Reset</a>
    </div>
</div>
@endsection