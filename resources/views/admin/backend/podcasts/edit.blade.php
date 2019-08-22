@extends('admin.backend.pagestatic.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="col-lg-2 float-left">
                <a class="btn btn-primary" href="{{ route('podcasts.index') }}"> Back To Index</a>
            </div>
            <div class="col-lg-12 pull-left">
                <h2>Edit Podcasts</h2>
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

    <form action="{{ route('podcasts.update', $data) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card shadow mb-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Listen Note Podcast Id :</strong>
                        <input type="text" name="listen_note_podcast_id" class="form-control" placeholder="Listen Note Podcast Id" value="{{$data->listen_note_podcast_id}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Title :</strong>
                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{$data->title}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Publisher :</strong>
                        <input type="text" name="publisher"  class="form-control" placeholder="Publisher" value="{{$data->publisher}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Description :</strong>
                        <input type="text" name="description"  class="form-control" placeholder="Description" value="{{$data->description}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Image Url Listen Note :</strong>
                        <input type="text" name="image_url_listen_note"  class="form-control" placeholder="Image Url Listen Note" value="{{$data->image_url_listen_note}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Thumbnail Url Listen Note :</strong>
                        <input type="text" name="thumbnail_url_listen_note"  class="form-control" placeholder="Thumbnail Url Listen Note" value="{{$data->thumbnail_url_listen_note}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Country :</strong>
                        <input type="text" name="country"  class="form-control" placeholder="Country" value="{{$data->country}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Language :</strong>
                        <input type="text" name="language"  class="form-control" placeholder="Language" value="{{$data->language}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Rss Url from listen Note :</strong>
                        <input type="text" name="rss_url_from_listen_note"  class="form-control" placeholder="Rss Url from listen Note" value="{{$data->rss_url_from_listen_note}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Listen Note Url :</strong>
                        <input type="text" name="listen_note_url"  class="form-control" placeholder="Listen Note Url" value="{{$data->listen_note_url}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Is Explicit Content :</strong>
                        <select class="status form-control select2" name="explicit_content" data-placeholder="explicit_content" id="explicit_content">
                            <option value="{{$data->explicit_content}}">{{$data->explicit_content == 1 ? 'YES' : 'NO'}}</option>
                            <option>---Status---</option>
                            <option value=1>YES</option>
                            <option value=0>NO</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Is Published :</strong>
                        <select class="status form-control select2" name="is_published" data-placeholder="is_published" id="is_published">
                            <option value="{{$data->is_published}}">{{$data->is_published == 1 ? 'YES' : 'NO'}}</option>
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
