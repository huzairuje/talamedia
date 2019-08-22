@extends('admin.backend.pagestatic.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="col-lg-2 float-left">
                <a class="btn btn-primary" href="{{ route('podcastepisodes.index') }}"> Back To Index</a>
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

    <form action="{{ route('podcastepisodes.update', $data) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card shadow mb-4">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Category :</strong>
                        <select class="form-control" name="article_category_id">
                            <option></option>
                            @foreach($podcasts as $podcast)
                                <option value="{{ $podcast->id }}"{{ old('podcast_id') ? (old('podcast_id') == $podcast_id->id ? ' selected' : '') : ($data->podcast_id == $podcast->id ? ' selected' : '') }}>{{ $podcast->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Listen Note Episode Id:</strong>
                        <input type="text" class="form-control" name="listen_note_episode_id" placeholder="Listen Note Episode Id" value="{{$data->listen_note_episode_id}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Title Episode:</strong>
                        <input type="text" class="form-control" name="title" placeholder="Title Episode" value="{{$data->title}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Description Episode:</strong>
                        <input type="text" class="form-control" name="description" placeholder="Description Episode" value="{{$data->description}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Listen Note Audio Url:</strong>
                        <input type="text" name="listen_note_audio_url"  class="form-control" placeholder="Listen Note Audio Url" value="{{$data->listen_note_audio_url}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Audio Length In Second :</strong>
                        <input type="number" name="audio_length_in_second"  class="form-control" placeholder="Audio Length In Second" value="{{$data->audio_length_in_second}}">
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
