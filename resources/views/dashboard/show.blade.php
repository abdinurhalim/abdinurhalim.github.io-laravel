@extends('dashboard.templates.layout')

@section('title')

@section('container')

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card mb-5">
                    <a href="/blog?category={{ $blog->category->slug }}"
                        class="text-decoration-none text-white-50 position-absolute p-4"
                        style="background-color:rgba(0, 0, 0, 0.7)">
                        {{ $blog->category->name }}
                    </a>
                    @if ($blog->image)
                        <div style="max-height: 350px; overflow:hidden;">
                            <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top"
                                alt="{{ $blog->category->name }}">
                        </div>
                    @else
                        <img src="https://source.unsplash.com/1200x600?{{ $blog->category->slug }}" class="card-img-top"
                            alt="{{ $blog->category->name }}">
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <a href="/dashboard/blog" class="btn btn-primary">&laquo; back to dashboard</a>
                        <a href="/dashboard/blog" class="btn btn-warning"><i class="fas fa-fw fa-edit"></i> Edit</a>
                        <form action="/dashboard/blog/{{ $blog->slug }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-fw fa-times"></i> Delete</button>
                        </form>
                        <p class="card-text">{!! $blog->body !!}</p>
                        <a href="/dashboard/blog" class="card-text"><small class="text-muted">&laquo; back to
                                blog</small></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
