@extends('admin.backend.articlecategorys.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit </h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('articlecategory.index') }}"> Back</a>
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
  
    <form action="{{ route('articlecategory.update', $data) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card shadow mb-4">

        <div class="row">
            <div class="col-lg-7">
                <div class="form-group">
                    <strong> Name:</strong>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $data->name }}">
                    </input>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-group">
                    <select class="status form-control select2" value="{{$data->status}}" name="status" data-placeholder="Status" id="status">
                        <option>---Status---</option>
                        <option value=1>Active</option>
                        <option value=0>InActive</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </div>
    </form>
@endsection
