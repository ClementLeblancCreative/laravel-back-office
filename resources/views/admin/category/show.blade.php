@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <h1 class="mb-4">{{$category->name}} </h1>
        <div>
            <a class="btn btn-primary mt-1" 
                href="{{ route('category.index') }}">Détails</a>
        </div>
    </div>
@endsection