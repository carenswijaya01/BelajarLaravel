@extends('layouts.main')
@section('container')
    <h1>Post Category: {{ $category }}</h1>
    @foreach ($posts as $post)
        <article class="mb-5">
            <h2>
                <a class="text-decoration-none" href="/post/{{ $post->slug }}">{{ $post->title }}</a>
            </h2>
            <h5>By: <a class="text-decoration-none" href="/author/{{ $post->user->username }}">{{ $post->user->name }}</a>
            </h5>
            <p>{{ $post->excerpt }}</p>
        </article>
    @endforeach
@endsection
