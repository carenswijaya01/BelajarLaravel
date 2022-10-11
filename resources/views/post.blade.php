@extends('layouts.main')
@section('container')
    <h1>{{ $post->title }}</h1>
    <p>By: <a class="text-decoration-none" href="/author/{{ $post->user->username }}">{{ $post->user->name }}</a> in <a
            class="text-decoration-none" href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
    {!! $post->body !!}
    <a href="/posts" class="d-block mt-3 text-decoration-none">Back To Posts</a>
@endsection
