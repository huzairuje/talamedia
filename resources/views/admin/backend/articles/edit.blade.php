@extends('admin.backend.articles.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit </h2>
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
  
    <form action="{{ route('article.update', $data) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card shadow mb-4">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{$data->name}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Picture:</strong>
                        <input type="file" class="form-control" name="featured_image" placeholder="Image" value="{{$data->image}}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group" data-provide="content">
                        <strong>Content :</strong>
{{--                        {{dd($data->content)}}--}}
                        <textarea name="content" id="ckview">{{$data->content}}</textarea>
                        <script src="{{url('themes/tinymce/jquery.tinymce.min.js')}}"></script>
                        <script src="{{url('themes/tinymce/tinymce.min.js')}}"></script>
                        <script>tinymce.init({selector: '#ckview'});</script>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Tittle :</strong>
                        <input type="text" name="meta_title"  class="form-control" placeholder="Title" value="{{$data->meta_title}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Slug :</strong>
                        <input type="text" name="slug"  class="form-control" placeholder="Slug" value="{{$data->slug}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Description :</strong>
                        <input type="text" name="meta_description"  class="form-control" placeholder="Description" value="{{$data->meta_description}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Keywords :</strong>
                        <input type="text" name="meta_keywords"  class="form-control" placeholder="Keywords" value="{{$data->meta_keywords}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Status :</strong>
                        <select class="status form-control" name="status" data-placeholder="Status" id="status" value="{{$data->status}}">
                            <option></option>
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
                        <select class="form-control" name="article_category_id" value="{{$data->article_category_id}}">
                            <option></option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"{{ old('article_category_id') ? (old('article_category_id') == $category->id ? ' selected' : '') : ($data->article_category_id == $category->id ? ' selected' : '') }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Tag :</strong>
                        <select class="form-control select2" name="article_tag_id" value="{{$data->article_tag_id}}" multiple data-placeholder="ini placeholder">
                            <option></option>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}"{{ old('article_tag_id') ? (old('article_tag_id') == $tag->id ? ' selected' : '') : ($data->article_tag_id == $tag->id ? ' selected' : '') }}>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Is Featured Article :</strong>
                        <select class="status form-control select2" name="is_featured_article" data-placeholder="is_featured_article" id="is_featured_article">
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
        </div>
    </form>
@endsection
