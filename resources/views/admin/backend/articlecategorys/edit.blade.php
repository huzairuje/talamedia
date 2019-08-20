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
  
    <form action="{{ route('articlecategory.update', $data) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card shadow mb-4">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong> Name:</strong>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $data->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Picture On the Page:</strong>
                    <input type="file" class="form-control" name="featured_image" placeholder="Image">
                </div>
            </div>
{{--            <div class="col-md-6">--}}
{{--                <div class="form-group">--}}
{{--                    <input type="file" class="hidden img-responsive" name="featured_image" id="featured_image"--}}
{{--                           value="{{ old($data->featured_image) }}"--}}
{{--                           placeholder="Foto"  accept="image/*">--}}
{{--                    <div class="input-file-pk">--}}
{{--                        <input type="file" name="featured_image" value="{{ $data->featured_image}}">--}}
{{--                        <input type="hidden" name="featured_image" value="{{ $data->featured_image}}">--}}
{{--                        <img id="preview-foto" width="150" height="150"--}}
{{--                             class="img-responsive"{!! $data->featured_image !=null ? ' src="'.asset(Storage::url('images/'.$data->featured_image)).'"' : ' data-src="holder.js/150x150?text=Klik untuk meng-upload gambar"' !!}>--}}
{{--                    </div>--}}
{{--                    <p>Klik gambar untuk mengedit</p>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Instagram access token 1:</strong>
                    <input type="text" name="instagram_access_token_1" class="form-control" placeholder="Name" value="{{ $data->instagram_access_token_1 }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Instagram access token 2:</strong>
                    <input type="text" name="instagram_access_token_2" class="form-control" placeholder="Name" value="{{ $data->instagram_access_token_2 }}">
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
