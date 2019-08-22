@extends('admin.backend.pagestatic.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="col-lg-2 float-left">
                <a class="btn btn-primary" href="{{ route('pagestatic.index') }}"> Back To Index</a>
            </div>
            <div class="col-lg-12 pull-left">
                <h2>Edit Static Page</h2>
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

    <form action="{{ route('pagestatic.update', $data) }}" method="POST"  enctype="multipart/form-data">
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
                        <textarea name="content" id="ckview">{{$data->content}}</textarea>
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
                        <input type="text" name="seo_title"  class="form-control" placeholder="Title" value="{{$data->seo_title}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>SEO Description :</strong>
                        <input type="text" name="seo_description"  class="form-control" placeholder="Description" value="{{$data->seo_description}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>SEO Keywords :</strong>
                        <input type="text" name="seo_keyword"  class="form-control" placeholder="Keywords" value="{{$data->seo_keyword}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Status :</strong>
                        <select class="status form-control" name="status" data-placeholder="Status" id="status">
                            <option value="Published">Published</option>
                            <option value="Draft">Draft</option>
                            <option value="InActive">InActive</option>
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
