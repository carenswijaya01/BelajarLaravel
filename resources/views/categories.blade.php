@extends('layouts.main')
@section('container')
    <h1>{{ $title }}</h1>
    @foreach ($categories as $category)
        <ul>
            <li>
                <h2>
                    <a class="text-decoration-none" href="/category/{{ $category->slug }}">{{ $category->name }}</a>
                </h2>
            </li>
        </ul>
    @endforeach
@endsection
