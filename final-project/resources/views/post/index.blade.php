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

    @if ($count == 0)
        <h3>No posts yet!</h3>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                <th>Title</th>
                <th>Poster</th>
                <th></th>
                
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user->username }}</td>
                        <!-- <td>{{ $post->cuisine }}</td>
                        <td>{{ $post->allergens }}</td>
                        <td><a href="{{ $post->instructions }}" target="_blank">Instructions</a><td> -->
                        <td><a href="{{ route('post.show', [$post->id]) }}">Details</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
