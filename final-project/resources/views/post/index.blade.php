@extends('layout')

@section('title', 'Posts')

@section('main')
    
    @if (session('success'))
        <div class = "alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <h1>{{ $user->name }}'s Recipe Feed</h1>

    <a href="{{ route('post.add') }}">Add Post</a>
    <table class="table table-striped">
        <thead>
            <tr>
            <th>Title</th>
            <th>Poster</th>
            <th>Cuisine</th>
            <th>Allergens</th>
            <th></th>
            <th></th>
            
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->user->username }}</td>
                    <td>{{ $post->cuisine }}</td>
                    <td>{{ $post->allergens }}</td>
                    <td><a href="{{ $post->instructions }}" target="_blank">Instructions</a><td>
                    <td>DETAILS</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection