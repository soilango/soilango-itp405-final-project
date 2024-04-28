@extends('layout')

@section('title', "{$post->title}")

@section('main')

    @if (session('success'))
        <div class = "alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class = "alert alert-danger" role="alert">
            {{ session()->pull('error') }}
        </div>
    @endif

    <h1 class = "text-center">{{ $post->title }} by {{ $post->user->username}}</h1>

    <div class="d-flex">
        <div class = "container">
            <h2 class = "text-center"><u>Recipe Details</u></h4>
            <h4 class = "text-center">Cuisine: {{ $post->cuisine }}</h4>
            <h4 class = "text-center">Allergens: {{ $post->allergens }}</h4>
            <h4 class = "text-center"><a href="{{ $post->instructions }}" target="_blank">Instructions</a></h4>
        </div>
        
        <hr>

        <div class ="container">
            <h2 class = "text-center"><u>Comments</u></h4>
            @if ($commentCount == 0)
                <h6 class = "text-center">No comments yet!</h6>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th>Poster</th>
                        <th>Date/Time</th>
                        <th>Body</th>
                        <th></th>
                        <th></th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td class = "align-middle">{{ $comment->user->username }}</td>
                                <td class = "align-middle">{{ date("F j, Y, g:i a",strtotime($comment->updated_at)) }}</td>
                                <td class = "align-middle">{{ $comment->body }}</td>
                                @if ($user->id == $comment->user->id)
                                    <td class = "align-middle"><a class = "btn btn-warning" href="{{ route('comment.edit', [$comment->id]) }}">Edit</a></td>
                                    <td class = "align-middle">
                                        <form method="post" action="{{ route('comment.delete') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                            <input type="hidden" id="commentId" name="commentId" value="{{ $comment->id }}" />
                                            <input type="hidden" id="postId" name="postId" value="{{ $comment->post_id }}" />
                                        </form>
                                    </td>
                                @else
                                    <td></td>
                                    <td></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            <h6 class = "text-end"><a class = "btn btn-primary" href="{{ route('comment.add', [$post->id]) }}">Add Comment</a></h6>
        </div>
    </div>
    


@endsection