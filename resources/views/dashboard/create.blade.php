@extends('dashboard.templates.layout')

@section('title')

@section('container')

    <div class="container">
        <h1 class="text-center">Form Create Blog</h1>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <form action="/dashboard/blog" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title') }}" id="title" name="title" placeholder="Title">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                            name="slug" placeholder="Slug" value="{{ old('slug') }}">
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                            name="category_id">
                            <option selected disabled>Select Category ...</option>
                            @foreach ($categories as $category)
                                @if (old('category_id') == $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <img src="" alt="" class="img-preview img-profile col-sm-5 mb-2">
                        <div class="custom-file mt-2">
                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                id="image" name="image" onchange="previewImg()">
                            <label class="custom-file-label" for="image">Choose file</label>
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <input id="body" type="hidden" name="body">
                        <trix-editor input="body"></trix-editor>
                        @error('body')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create Blog</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/blog/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept',
            function(e) {
                e.preventDefault();
            });

        function previewImg() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            const sampul = document.querySelector('.custom-file-label');

            imgPreview.style.display = 'block';

            const reader = new FileReader();

            reader.readAsDataURL(image.files[0]);

            reader.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>

@endsection
