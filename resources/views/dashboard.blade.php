@extends('layouts.app')
@section('content')
<a href="{{ route('posts.index')}}" class="btn btn-primary">Posts</a>
<a href="{{ route('category.index')}}" class="btn btn-primary">Categories</a>
<a href="{{ route('tag.index')}}" class="btn btn-primary">Tags</a>
@endsection