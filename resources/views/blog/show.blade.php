@extends('templates.layout')

@section('title', 'Show')

@section('container')

    @include('templates.navbar')

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card mb-5">
                    <a href="/category/{{ $blog->category->slug }}"
                        class="text-decoration-none text-white-50 position-absolute p-4"
                        style="background-color:rgba(0, 0, 0, 0.7)">
                        {{ $blog->category->name }}
                    </a>
                    <img src="https://source.unsplash.com/1200x600?{{ $blog->category->slug }}" class="card-img-top"
                        alt="{{ $blog->category->name }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <small class="card-text">By : <a class="text-decoration-none"
                                href="/author/{{ $blog->author->username }}">{{ $blog->author->name }}</a> in <a
                                class="text-decoration-none"
                                href="/category/{{ $blog->category->slug }}">{{ $blog->category->name }}</a>
                            <br> {{ $blog->created_at->diffForHumans() }}</small>
                        <p class="card-text">{!! $blog->body !!}</p>
                        <a href="/blog" class="card-text"><small class="text-muted">&laquo; back to blog</small></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
