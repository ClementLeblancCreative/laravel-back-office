@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h1 class="mb-4">Les catégories creatives: </h1>
        <div>
            <a class="btn btn-primary mt-1" href="{{ route('category.create') }}"><i class="bi bi-plus-lg"></i> Creer</a>
        </div>
    </div>

    @include('partials.alert')

    <div class="list-group w-auto mb-4">
        @if (!($category->isEmpty()))   
            @foreach ( $category as $cat )
                <div class="d-flex gap-3 w-100 justify-content-between align-items-center">
                    <a href="{{route('category.show', [$cat->id,$cat->slug,false] )}}" class="list-group-item list-group-item-action d-flex py-3 justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">{{$cat->name}}</h6>
                        </div>
                        <div class="d-flex align-self-start gap-3">
                            <small class="opacity-50 text-nowrap">{{$cat -> created_at}}</small>
                        </div> 
                    </a>
                    <div class="d-flex align-content-start gap-3">
                        <form method="get" action="{{ route('category.destroy', $cat->id )}}">
                            @csrf
                        
                            <button type="submit" class="btn btn-danger" onclick="if(!confirm('Vouler-vous vraiment supprimer la catégorie {{$cat->title}}')){return false}"><i class="bi bi-trash3"></i></button>
                        </form>
                        <a href="{{ route('category.edit', $cat->id )}}" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                    </div> 
                </div>
            @endforeach
        @endif
    </div>
</div>  
@endsection