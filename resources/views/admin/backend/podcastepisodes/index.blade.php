@extends('admin.layouts.app')
@section('title', 'Podcast Episode')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="pull-left">Podcast Episode Management</h2>
            <a class="btn btn-primary pull-right"  href="{{ route('podcastepisodes.create') }}"> Create </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('admin.backend.podcastepisodes.table')
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>
@endsection
