@extends('layout')

@section('title', "Edit Comment on {$comment->post->title}")

@section('main')
    
    <h1>Edit Comment by {{ $user->name }} on {{ $comment->post->title }}</h1>

    <form method="post" action="{{ route('comment.submitEdit') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="body"></label>
            <input type="body" id="body" name="body" class="form-control" value="{{ old('body', $comment->body) }}">
            @error('body')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}" />
        <input type="hidden" id="postId" name="postId" value="{{ $comment->post_id }}" />
        <input type="hidden" id="commentId" name="commentId" value="{{ $comment->id }}" />

        <input type="submit" value="Edit Comment" class="btn btn-primary">
    </form>
@endsection