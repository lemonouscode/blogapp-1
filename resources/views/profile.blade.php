@extends('layout.default')

@section('content')



@include('components.error-handler')
@include('components.session-handler')


@php
    $u = Auth::user();
    $isAdmin = $u->isAdmin ? 'true' : 'false';
@endphp

<h1>Name: {{ $u->name }}</h1>
<h3>Email: {{ $u->email }}</h3>
<h3>Is admin: {{ $isAdmin  }}</h3>

@endsection