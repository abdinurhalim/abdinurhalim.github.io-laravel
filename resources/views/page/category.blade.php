@extends('templates.layout')

@section('title', 'Category')

@section('container')

    @include('templates.navbar')

    <div class="container mt-3">
        <h1 class="text-center mb-3">Category</h1>
        <div class="row justify-content-center">
            @foreach ($categories as $category)
                <div class="col-lg-3">
                    <a href="/category/{{ $category->slug }}">
                        <div class="card bg-dark ">
                            <img src="https://source.unsplash.com/600x600?{{ $category->slug }}" alt="{{ $category->name }}"
                                class="card-img">
                            <div class="d-flex align-items-center card-img-overlay p-0">
                                <div class="flex-fill text-center text-white-50 p-4"
                                    style="background-color: rgba(0, 0, 0, 0.7)">
                                    {{ $category->name }}</div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
