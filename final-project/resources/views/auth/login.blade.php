@extends('layout')

@section('title', 'Login')

@section('main')
    @if (session('error'))
        <div class = "alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <h1>Login</h1>

    <form method="post" action="{{ route('auth.login') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <input type="submit" value="Login" class="btn btn-primary">
    </form>
@endsection