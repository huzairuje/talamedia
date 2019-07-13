@extends('admin.layouts.app')
@section('title', 'Article')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="float-left">Article Management</h2>
            <a class="btn btn-primary float-right"  href="{{ route('article.create') }}"> Create </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('admin.backend.articles.table')
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>

@endsection