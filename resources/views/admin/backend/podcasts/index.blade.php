@extends('admin.layouts.app')
@section('title', 'Podcasts')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="pull-left">Podcasts Management</h2>
            <a class="btn btn-primary pull-right"  href="{{ route('podcasts.create') }}">Create</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('admin.backend.podcasts.table')
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>
@endsection
