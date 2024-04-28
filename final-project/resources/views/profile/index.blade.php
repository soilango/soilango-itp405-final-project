@extends('layout')

@section('title', "{$user->name}'s Profile")

@section('main')

    @if (session('error'))
        <div class = "alert alert-danger" role="alert">
            {{ session()->pull('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class = "alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    
    <h1 class ="text-center">{{ $user->name }}'s Profile</h1>
    <div class = "container">
        <h5> Username: {{ $user->username }}</h5>
        <h5>Email: {{ $user->email }}</h5>
    </div>
    <hr>
    <div class = "container">
        <h3>Favorites:</h3>
        @if ($favoritesCount == 0)
            <p>No favorites yet! View your feed to start adding posts to favorites.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Poster</th>
                        <th>Date/Time Faved</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($favorites as $favorite)
                        <tr>
                            <td class = "align-middle">{{ $favorite->post->title }}</td>
                            <td class = "align-middle">{{ $favorite->post->user->username }}</td>
                            <td class = "align-middle">{{ date("F j, Y, g:i a",strtotime($favorite->updated_at)) }}</td>
                            <td class = "align-middle"><a class = "btn btn-info" href="{{ route('post.show', [$favorite->post->id]) }}">Details</a></td>
                            <td>
                                <form method="post" action="{{ route('favorites.delete') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    <input type="hidden" id="favoriteId" name="favoriteId" value="{{ $favorite->id }}" />
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection