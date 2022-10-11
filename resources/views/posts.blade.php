@extends('layouts.main')
@section('container')
    <h1 class="mb-5">{{ $title }}</h1>

    @if ($posts->count())
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top"
                alt="{{ $posts[0]->category->name }}">
            <div class="card-body text-center">
                <a class="text-decoration-none text-dark" href="/post/{{ $posts[0]->slug }}">
                    <h3 class="card-title">{{ $posts[0]->title }}</h3>
                </a>
                <p>
                    <small class="text-muted">
                        By:
                        <a class="text-decoration-none"
                            href="/author/{{ $posts[0]->user->username }}">{{ $posts[0]->user->name }}</a>
                        in
                        <a class="text-decoration-none"
                            href="/category/{{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a class="text-decoration-none btn btn-primary" href="/post/{{ $posts[0]->slug }}">Read more</a>
            </div>
        </div>
    @else
        <p class="text-center fs-4">No Post Found</p>
    @endif

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                            <a class="text-decoration-none text-white"
                                href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                        </div>
                        <img src="https://source.unsplash.com/500x500?{{ $post->category->name }}" class="card-img-top"
                            alt="{{ $post->category->name }}">
                        <div class="card-body">
                            <a class="text-decoration-none text-dark" href="/post/{{ $post->slug }}">
                                <h5 class="card-title">{{ $post->title }}</h5>
                            </a>
                            <p class="card-text">
                                <small class="text-muted">
                                    By:
                                    <a class="text-decoration-none"
                                        href="/author/{{ $post->user->username }}">{{ $post->user->name }}</a>
                                    in
                                    <a class="text-decoration-none"
                                        href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                                    {{ $post->created_at->diffForHumans() }}
                                </small>
                            </p>
                            <p class="card-text">{{ $post->excerpt }}</p>
                            <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
