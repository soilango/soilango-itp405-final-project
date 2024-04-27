@extends('layout')

@section('title', 'Posts')

@section('main')
    
    @if (session('success'))
        <div class = "alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <h1>{{ $user->name }}'s Recipe Feed</h1>

    <a class = "btn btn-primary" href="{{ route('post.add') }}">Add Post</a>

    @if ($count == 0)
        <h3>No posts yet!</h3>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                <th>Title</th>
                <th>Poster</th>
                <th></th>
                <th></th>
                
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td class = "align-middle">{{ $post->title }}</td>
                        <td class = "align-middle">{{ $post->user->username }}</td>
                        <!-- <td>{{ $post->cuisine }}</td>
                        <td>{{ $post->allergens }}</td>
                        <td><a href="{{ $post->instructions }}" target="_blank">Instructions</a><td> -->
                        <td class = "align-middle"><a class = "btn btn-info" href="{{ route('post.show', [$post->id]) }}">Details</a></td>
                        <td>
                            <form method="post" action="{{ route('favorites.add') }}">
                                @csrf
                                <button type="submit" class="btn btn-success">Add to Favorites</button>
                                <input type="hidden" id="username" name="username" value="{{ $user->username }}" />
                                <input type="hidden" id="postId" name="postId" value="{{ $post->id }}" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
