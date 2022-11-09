@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-1"></div>
    <div class="card col">
        <div class="card-body">
            <h5 class="card-title">Posts</h5>
            <p class="card-text">Les postes de créative</p>
            <a href="{{ route('posts.index')}}" class="btn btn-primary">Y accéder</a>   
        </div>
    </div>
    <div class="col-1"></div>
    <div class="card col">
        <div class="card-body">
            <h5 class="card-title">Catégories</h5>
            <p class="card-text">Les catégories des postes</p>
            <a href="{{ route('category.index')}}" class="btn btn-primary">Y accéder</a>   
        </div>
    </div>
    <div class="col-1"></div>
    <div class="card col">
        <div class="card-body">
            <h5 class="card-title">Tags</h5>
            <p class="card-text">Les tags des postes</p>
            <a href="{{ route('tag.index')}}" class="btn btn-primary">Y accéder</a>   
        </div>
    </div>
    <div class="col-1"></div>
</div>
@endsection