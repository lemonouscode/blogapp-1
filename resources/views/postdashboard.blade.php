@extends('layout.default')

@section('content')

@foreach ($posts as $post)
    

    <form action=" {{ url('/deletepost/'.$post->id) }} " method="POST">
        @csrf
        <h1>{{ $post->title }}</h1>
        <input type="hidden" name="id" value="{{ $post->id }}">
        <input type="submit" value="Delete post">
    </form>


@endforeach

@include('components.error-handler')
@include('components.session-handler')




@endsection