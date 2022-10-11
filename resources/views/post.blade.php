@extends('layouts.main')
@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                <p>By: <a class="text-decoration-none" href="/author/{{ $post->user->username }}">{{ $post->user->name }}</a>
                    in <a class="text-decoration-none"
                        href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>

                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top img-fluid"
                    alt="{{ $post->category->name }}">

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
                <a href="/posts" class="d-block mt-3 text-decoration-none">Back To Posts</a>
            </div>
        </div>
    </div>
@endsection
