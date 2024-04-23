@extends('layout')

@section('title', 'Profile')

@section('main')
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
        <h6>Favorites:</h6>
    </div>
@endsection