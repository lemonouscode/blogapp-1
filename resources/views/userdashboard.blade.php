@extends('layout.default')

@section('content')



@include('components.error-handler')
@include('components.session-handler')


@foreach ($users as $user)
    <h1>{{ $user->name }}</h1>
    <h2>{{ $user->email }}</h2>

    <p>{{ $user->created_at->diffForHumans() }}</p>
    <p>Is Admin: {{ $isAdmin = $user->isAdmin ? 'true' : 'false'; }}</p>
    <hr>
@endforeach

@endsection