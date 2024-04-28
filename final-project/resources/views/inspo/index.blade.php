@extends('layout')

@section('title', 'Inspo')

@section('main')

    <h1>{{ $user->name }}'s Vegetarian Recipe Inspiration</h1>

    <hr>

    
    <table class="table table-striped">
        <thead>
            <tr>
            <th class = "align-middle text-center">Title</th>
            <th class = "align-middle text-center">Prep Time (minutes)</th>
            <th></th>
            <th></th>
            
            </tr>
        </thead>
        <tbody>
            @foreach ($response->results as $result)
                <tr>
                    <td class = "align-middle text-center">{{ $result->title }}</td>
                    <td class = "align-middle text-center">{{ $result->readyInMinutes }}</td>
                    <td>
                        <img src = "{{ $result->image }}" alt="Recipe Image" height="100">
                    </td>
                    <td class = "align-middle"><a class = "btn btn-link" href="{{ $result->sourceUrl }}" target="_blank">More Info</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
