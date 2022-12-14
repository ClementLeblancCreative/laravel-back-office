@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h1 class="mb-4">Les tags creatifs: </h1>
        <div>
            <a class="btn btn-primary mt-1" href="{{ route('tag.create') }}"><i class="bi bi-plus-lg"></i> Creer</a>
        </div>
    </div>

    @include('partials.alert')

    <div class="list-group w-auto mb-4">
        @if (!($tag->isEmpty()))   
            @foreach ( $tag as $ta )
                <div class="d-flex gap-3 w-100 justify-content-between align-items-center">
                    <a href="{{route('tag.show', [$ta->id,$ta->slug,false] )}}" class="list-group-item list-group-item-action d-flex py-3 justify-content-between align-items-center" 
                        style="background-color: {{$ta->color}}; 
                        color: #{{str_pad(dechex(255-hexdec(substr($ta->color,1,2))), 2, "0", STR_PAD_LEFT)
     .str_pad(dechex(255-hexdec(substr($ta->color,3,2))), 2, "0", STR_PAD_LEFT)
     .str_pad(dechex(255-hexdec(substr($ta->color,5,2))), 2, "0", STR_PAD_LEFT)}};">
                            <div>
                                <h6 class="mb-0">{{$ta->name}}</h6>
                            </div>
                            <div class="d-flex align-self-start gap-3">
                                <small class="opacity-50 text-nowrap">{{$ta -> created_at}}</small>
                            </div> 
                    </a>
                    <div class="d-flex align-content-start gap-3">
                        <form method="get" action="{{ route('tag.destroy', $ta->id )}}">
                            @csrf
                        
                            <button type="submit" class="btn btn-danger" onclick="if(!confirm('Vouler-vous vraiment supprimer le tag {{$ta->title}}')){return false}"><i class="bi bi-trash3"></i></button>
                        </form>
                        <a href="{{ route('tag.edit', $ta->id )}}" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                    </div> 
                </div>
            @endforeach
        @endif
    </div>
</div>  
@endsection