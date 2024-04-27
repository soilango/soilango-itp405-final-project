@extends('layout')

@section('title', 'Add Post')

@section('main')
    
    <h1>New Post by {{ $user->name }}</h1>

    <form method="post" action="{{ route('post.create') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="cuisine">Cuisine</label>
            <input type="text" id="cuisine" name="cuisine" class="form-control" value="{{ old('cuisine') }}">
            @error('cuisine')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="allergens">Allergen Information</label>
            <input type="text" id="allergens" name="allergens" class="form-control" value="{{ old('allergens') }}">
            @error('allergens')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="instructions">Instructions (Link)</label>
            <input type="url" id="instructions" name="instructions" class="form-control" value="{{ old('instructions') }}">
            @error('instructions')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}" />
        <input type="submit" value="Post" class="btn btn-primary">
    </form>
@endsection