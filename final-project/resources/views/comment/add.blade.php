@extends('layout')

@section('title', "Add Comment on {$post->title}")

@section('main')
    
    <h1>New Comment by {{ $user->name }} on {{ $post->title }}</h1>

    <form method="post" action="{{ route('comment.create') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="body"></label>
            <input type="body" id="body" name="body" class="form-control" value="{{ old('body') }}">
            @error('body')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}" />
        <input type="hidden" id="postId" name="postId" value="{{ $post->id }}" />
        <input type="submit" value="Post Comment" class="btn btn-primary">
    </form>
@endsection