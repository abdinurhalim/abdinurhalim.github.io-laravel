@extends('dashboard.templates.layout')

@section('title', 'Wellcome')

@section('container')

    <div class="container">
        <h1 class="h3 text-center">Wellcome, {{ auth()->user()->name }}</h1>
    </div>

@endsection
