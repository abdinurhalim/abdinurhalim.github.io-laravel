@extends('dashboard.templates.layout')

@section('title', 'Dashboard')

@section('container')

    <div class="container">
        <h1 class="text-center mb-3">My Blogs</h1>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <a href="/dashboard/blog/create" class="btn btn-primary mb-2">Create New Blog</a>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead class="text-center table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->category->name }}</td>
                                <td class="text-center">
                                    <a href="/dashboard/blog/{{ $blog->slug }}" class="badge badge-info"><i
                                            class="fas fa-fw fa-eye"></i></a>
                                    <a href="/dashboard/blog/{{ $blog->slug }}/edit" class="badge badge-warning"><i
                                            class="fas fa-fw fa-edit"></i></a>
                                    <form action="/dashboard/blog/{{ $blog->slug }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="badge badge-danger border-0"><i
                                                class="fas fa-fw fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-center">
        {{ $blogs->links() }}
    </div>

@endsection
