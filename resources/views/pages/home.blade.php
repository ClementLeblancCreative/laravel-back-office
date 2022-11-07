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

<div class="container" id="news" style="margin-bottom:150px">
    <h1 class="mb-4">Les derniers articles : </h1>

    <div class="list-group w-auto mb-4">
        @if (!($posts->isEmpty()))   
            @foreach ( $posts as $post )
                <div class="d-flex gap-3 w-100 justify-content-between align-items-center">
                    <a href="{{route('posts.show', [$post->id,$post->slug,true] )}}" class="list-group-item list-group-item-action d-flex py-3 justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">{{$post->title}}</h6>
                            <p class="mb-0 opacity-75">{{$post->description}}</p>
                        </div>
                        <div class="d-flex align-self-start gap-3">
                            <small class="opacity-50 text-nowrap">{{$post -> created_at}}</small>
                        </div> 
                    </a>        
                </div>
            @endforeach
            <div class="justify-content-end d-flex">
                <a class="btn btn-primary mt-1" href="{{route('posts.index')}}">Modifier</a>
            </div>
        @endif
</div>

@endsection