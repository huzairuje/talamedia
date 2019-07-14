@extends('admin.backend.advertcategorys.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit </h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('advertcategory.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('advertcategory.update', $data) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card shadow mb-4">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong> Name:</strong>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $data->name }}">
                    </input>
                </div>
            </div>
            <div class="col-md-6">
                <label class="container">Active
                    <input type="checkbox" name="status" value=1>
                    <span class="checkmark"></span>
                </label>

                <label class="container">InActive
                    <input type="checkbox" name="status" value=0>
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </div>
    </form>
@endsection
