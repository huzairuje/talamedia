@extends('admin.backend.pagestatic.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="col-lg-2 float-right">
                <a class="btn btn-primary" href="{{ route('pagestatic.index') }}">Back To Index</a>
            </div>
            <div class="col-lg-12 float-left">
                <h2>Add New Page Static</h2>
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

    <form action="{{ route('pagestatic.store') }}" method="POST" enctype="multipart/form-data">
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
                    <strong>Picture:</strong>
                    <input type="file" class="form-control" name="featured_image" placeholder="Image">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" data-provide="content">
                    <strong>Content :</strong>
                    <textarea name="content" id="ckview"> </textarea>
                    <script src="{{url('themes/tinymce/jquery.tinymce.min.js')}}"></script>
                    <script src="{{url('themes/tinymce/tinymce.min.js')}}"></script>
                    <script>
                        tinymce.init({
                            selector: '#ckview',
                            height: 600,
                            plugins:'wordcount fullscreen link image code preview media',
                            toolbar1:'preview code',
                        });
                    </script>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>SEO Title :</strong>
                    <input type="text" name="seo_title"  class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>SEO Description :</strong>
                    <input type="text" name="seo_description"  class="form-control" placeholder="Description">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>SEO Keyword :</strong>
                    <input type="text" name="seo_keyword"  class="form-control" placeholder="Keywords">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Status :</strong>
                    <select class="status form-control select2" name="status" data-placeholder="Status" id="status">
                        <option>---Status---</option>
                        <option value="Published">Published</option>
                        <option value="Draft">Draft</option>
                        <option value="InActive">In Active</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
