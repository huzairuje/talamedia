@extends('admin.backend.articlecategorys.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Add New Category</h2>
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
   
<form action="{{ route('articlecategory.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Picture On the Page:</strong>
                <input type="file" class="form-control" name="featured_image" placeholder="Image">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Instagram access token 1:</strong>
                <input type="text" name="instagram_access_token_1" class="form-control" placeholder="Instagram Token 1">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Instagram access token 2:</strong>
                <input type="text" name="instagram_access_token_2" class="form-control" placeholder="Instagram Token 2">
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
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection

<script>
    $('.datepicker').datepicker();
</script>
