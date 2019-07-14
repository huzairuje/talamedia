@extends('admin.backend.articles.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Add New Article</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('article.index') }}"> Back</a>
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
   
<form action="{{ route('article.store') }}" method="POST">
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
                <script>tinymce.init({selector: '#ckview'});</script>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Tittle :</strong>
                <input type="text" name="meta_title"  class="form-control" placeholder="Title">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Slug :</strong>
                <input type="text" name="slug"  class="form-control" placeholder="Slug">
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
                <select class="form-control" name="article_category_id">
                <option></option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"{{ old('article_category')==$category->id ? ' selected' : '' }}>{{ $category->name }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Tag :</strong>
                <select class="form-control" name="article_tag_id">
                <option></option>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}"{{ old('article_tag')==$tag->id ? ' selected' : '' }}>{{ $tag->name }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection
