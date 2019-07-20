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
  
    <form action="{{ route('article.update', $data) }}" method="POST"  enctype="multipart/form-data">
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
                        <input type="file" class="hidden img-responsive" name="featured_image" id="featured_image"
                               value="{{ old($data->featured_image) }}"
                               placeholder="Foto"  accept="image/*">
                        <div class="input-file-pk">
                            <input type="file" name="featured_image" value="{{ $data->featured_image}}">
                            <input type="hidden" name="featured_image" value="{{ $data->featured_image}}">
                        <img id="preview-foto" width="150" height="150"
                             class="img-responsive"{!! $data->featured_image!=null ? ' src="'.asset(Storage::url('images/'.$data->featured_image)).'"' : ' data-src="holder.js/150x150?text=Klik untuk meng-upload gambar"' !!}>
                        </div>
                        <p>Klik gambar untuk mengedit</p>
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
                        <strong>Link Article :</strong>
                        <input type="text" name="slug"  class="form-control" placeholder="Link Article" value="{{$data->slug}}">
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
                            <option value="{{$data->status}}">{{$data->status}}</option>
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
                        <select class="form-control select2" name="article_tag_id" value="{{$data->article_tag_id}}" multiple data-placeholder="Tag">
{{--                            <option></option>--}}
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}"{{ old('article_tag_id') ? (old('article_tag_id') == $tag->id ? ' selected' : '') : ($data->article_tag_id == $tag->id ? ' selected' : '') }}>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Is Featured Article :</strong>
                        <select class="status form-control" name="is_featured_article" data-placeholder="is_featured_article" id="is_featured_article">
                            <option value="{{$data->is_featured_article}}">{{$data->is_featured_article == 1 ? 'YES' : 'NO'}}</option>
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
