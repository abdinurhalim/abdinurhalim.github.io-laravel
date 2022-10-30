@extends('templates.layout')

@section('title', 'Blog')

@section('container')

    @include('templates.navbar')

    <div class="container mt-3">
        <h1 class="text-center mb-3">{{ $title }}</h1>
        <div class="row justify-content-center">
            <div class="col-lg-6 mb-2">
                <form action="/blog">
                    <div class="input-group mb-3">
                        @if (Request('category'))
                            <input type="hidden" name="category" value="{{ Request('category') }}">
                        @endif
                        @if (Request('author'))
                            <input type="hidden" name="author" value="{{ Request('author') }}">
                        @endif
                        <input type="text" class="form-control" placeholder="Search" name="keyword" autofocus
                            value="{{ Request('keyword') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-fw fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            @if ($blogs->count())
                <div class="col-lg-9">
                    <div class="card mb-5">
                        <a href="/blog?category={{ $blogs[0]->category->slug }}"
                            class="text-decoration-none text-white-50 position-absolute p-4"
                            style="background-color:rgba(0, 0, 0, 0.7)">
                            {{ $blogs[0]->category->name }}
                        </a>
                        @if ($blogs[0]->image)
                            <div style="max-height: 350px; overflow: hidden;">
                                <img src="{{ asset('storage/' . $blogs[0]->image) }}" class="card-img-top"
                                    alt="{{ $blogs[0]->category->name }}">
                            </div>
                        @else
                            <img src="https://source.unsplash.com/1200x600?{{ $blogs[0]->category->slug }}"
                                class="card-img-top" alt="{{ $blogs[0]->category->name }}">
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $blogs[0]->title }}</h5>
                            <small class="card-text">By : <a class="text-decoration-none"
                                    href="/blog?author={{ $blogs[0]->author->username }}">{{ $blogs[0]->author->name }}</a>
                                in <a class="text-decoration-none"
                                    href="/blog?category={{ $blogs[0]->category->slug }}">{{ $blogs[0]->category->name }}</a>
                                <br> {{ $blogs[0]->created_at->diffForHumans() }}</small>
                            <p class="card-text">{{ $blogs[0]->excerpt }}</p>
                            <a href="/blog/{{ $blogs[0]->slug }}" class="card-text"><small class="text-muted">Read
                                    more...</small></a>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($blogs->skip(1) as $blog)
                        <div class="col-lg-4 mb-4">
                            <div class="card">
                                <a href="/blog?category={{ $blog->category->slug }}"
                                    class="text-decoration-none text-white-50 position-absolute p-3"
                                    style="background-color: rgba(0, 0, 0, 0.7)">
                                    {{ $blog->category->name }}
                                </a>
                                @if ($blog->image)
                                    <div style="max-height: 200px; overflow:hidden;">
                                        <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top"
                                            alt="{{ $blog->category->name }}">
                                    </div>
                                @else
                                    <img src="https://source.unsplash.com/1200x600?{{ $blog->category->slug }}"
                                        class="card-img-top" alt="{{ $blog->category->name }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $blog->title }}</h5>
                                    <small class="card-text">
                                        By : <a class="text-decoration-none"
                                            href="/blog?author={{ $blog->author->username }}">{{ $blog->author->name }}</a>
                                        in <a
                                            href="/blog?category={{ $blog->category->slug }}">{{ $blog->category->name }}</a>
                                        <br> {{ $blog->created_at->diffForHumans() }}
                                    </small>
                                    <p class="card-text">{{ $blog->excerpt }}</p>
                                    <a href="/blog/{{ $blog->slug }}" class="btn btn-primary">Read more...</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="container">
                    <div class="row justify-content-center">
                        <small class="text-center text-danger">No Blogs Found</small>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $blogs->links() }}
    </div>

@endsection
