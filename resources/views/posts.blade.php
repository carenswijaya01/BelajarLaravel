@extends('layouts.main')
@section('container')
    <h1 class="mb-5">{{ $title }}</h1>
    @foreach ($posts as $post)
        <article class="mb-5 border-bottom pb-4">
            <h2>
                <a class="text-decoration-none" href="/post/{{ $post->slug }}">{{ $post->title }}</a>
            </h2>

            <p>By: <a class="text-decoration-none" href="/author/{{ $post->user->username }}">{{ $post->user->name }}</a> in
                <a class="text-decoration-none" href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </p>

            <p>{{ $post->excerpt }}</p>

            <a class="text-decoration-none" href="/post/{{ $post->slug }}">Read more ...</a>
        </article>
    @endforeach
@endsection
