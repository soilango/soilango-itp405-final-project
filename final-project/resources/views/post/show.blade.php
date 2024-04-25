@extends('layout')

@section('title', " {{ $post->title }} ")

@section('main')

    <h1 class = "text-center">{{ $post->title }} by {{ $post->user->username}} </h1>

    <div class="d-flex p-2">
        <div class = "container">
            <h2 class = "text-center"><u>Recipe Details</u></h4>
            <h4 class = "text-center">Cuisine: {{ $post->cuisine }}</h4>
            <h4 class = "text-center">Allergens: {{ $post->allergens }}</h4>
            <h4 class = "text-center"><a href="{{ $post->instructions }}" target="_blank">Instructions</a></h4>
        </div>
        

        <div class ="container">
            <h2 class = "text-center"><u>Comments</u></h4>
            <h6 class = "text-center">No comments yet!</h6>
        </div>
    </div>
    


@endsection