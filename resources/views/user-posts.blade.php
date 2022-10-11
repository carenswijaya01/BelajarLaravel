@extends('layouts.main')
@section('container')
    <h1>User: {{ $name }}</h1>
    @foreach ($posts as $post)
        <article class="mb-5">
            <h2>
                <a class="text-decoration-none" href="/post/{{ $post->slug }}">{{ $post->title }}</a>
            </h2>
            <h5>In <a class="text-decoration-none"
                    href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </h5>
            <p>{{ $post->excerpt }}</p>
        </article>
    @endforeach
@endsection
