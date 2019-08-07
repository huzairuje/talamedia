@extends('admin.backend.adverts.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Add New Advert</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('advert.index') }}"> Back</a>
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
   
<form action="{{ route('advert.store') }}" method="POST"  enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
{{--        <div class="col-xs-12 col-sm-12 col-md-12 date">--}}
{{--            <div class="form-group" data-provide="datepicker">--}}
{{--                <strong>Date Time:</strong>--}}
{{--                <input type="date" name="publish_datetime" class="form-control">--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="col-md-6">
            <div class="form-group">
                <strong>Picture:</strong>
                <input type="file" class="form-control" name="featured_image" placeholder="Image">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group" data-provide="content">
                <strong>Content :</strong>
                <textarea name="content" id="ckview"> </textarea>
                <script src="{{url('themes/tinymce/jquery.tinymce.min.js')}}"></script>
                <script src="{{url('themes/tinymce/tinymce.min.js')}}"></script>
                <script>
                    tinymce.init({
                        selector: '#ckview',
                        height: 300,
                        menubar: 'file edit insert view format table tools help',
                        plugins:'link imagetools table spellchecker preview code image',
                        contextmenu: "link image imagetools table spellchecker",
                        toolbar1:'preview code image',
                    });
                </script>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Title :</strong>
                <input type="text" name="meta_title"  class="form-control" placeholder="Title">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Cannocial Link :</strong>
                <input type="text" name="cannonical_link"  class="form-control" placeholder="Cannonical Link">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Link Advert :</strong>
                <input type="text" name="slug"  class="form-control" placeholder="Link Advert">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Description :</strong>
                <input type="text" name="meta_description"  class="form-control" placeholder="Description">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Keywords :</strong>
                <input type="text" name="meta_keywords"  class="form-control" placeholder="Keywords">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Status :</strong>

                <select class="status form-control select2" name="status" data-placeholder="Status" id="status">
                    <option>---Status---</option>
                <option value="Published">Published</option>
                <option value="Draft">Draft</option>
                <option value="InActive">InActive</option>
                <option value="Scheduled">Scheduled</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Category :</strong>
                <select class="form-control" name="advert_category_id" id="advert_category_id">
                <option></option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"{{ old('advert_category')==$category->id ? ' selected' : '' }}>{{ $category->name }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Is Featured Advert :</strong>
                <select class="status form-control select2" name="is_featured_advert" data-placeholder="is_featured_advert" id="is_featured_advert">
                    <option>---Status---</option>
                    <option value=1>YES</option>
                    <option value=0>NO</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Is on Category Page :</strong>
                <select class="status form-control select2" name="is_on_category_page" data-placeholder="is_on_category_page" id="is_on_category_page">
                    <option>---Status---</option>
                    <option value=1>YES</option>
                    <option value=0>NO</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Is on Article Page :</strong>
                <select class="status form-control select2" name="is_on_article_page" data-placeholder="is_on_article_page" id="is_on_article_page">
                    <option>---Status---</option>
                    <option value=1>YES</option>
                    <option value=0>NO</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection

{{--<script>--}}
{{--    $('.datepicker').datepicker();--}}
{{--</script>--}}
