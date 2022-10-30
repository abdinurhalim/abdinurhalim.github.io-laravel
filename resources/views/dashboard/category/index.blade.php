@extends('dashboard.templates.layout')

@section('title', 'Category')

@section('container')

    <div class="container">
        <h1 class="text-center mb-3">Category</h1>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <table class="table table-bordered">
                    <thead class="text-center table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $blog)
                            <tr>
                                <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $blog->name }}</td>
                                <td class="text-center">
                                    <a href="/dashboard/category/{{ $blog->slug }}" class="badge badge-info"><i
                                            class="fas fa-fw fa-eye"></i></a>
                                    <a href="/dashboard/category/{{ $blog->slug }}/edit" class="badge badge-warning"><i
                                            class="fas fa-fw fa-edit"></i></a>
                                    <form action="/dashboard/category/{{ $blog->slug }}" method="post" class="d-inline">
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

@endsection
