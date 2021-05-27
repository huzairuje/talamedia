@extends('admin.layouts.app')
@section('title', 'Role')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="pull-left">Roles</h2>
            <a class="btn btn-primary pull-right"  href="{{ route('role.create') }}"> Create </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('admin.backend.roles.table')
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>

@endsection