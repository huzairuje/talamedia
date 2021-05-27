@extends('admin.backend.podcastepisodes.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="col-lg-2 float-right">
                <a class="btn btn-primary" href="{{ route('podcastepisodes.index') }}">Back To Index</a>
            </div>
            <div class="col-lg-12 float-left">
                <h2>Add New Podcast Episode</h2>
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

    <form action="{{ route('podcastepisodes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Podcast By :</strong>
                    <select class="form-control" name="podcast_id">
                        <option></option>
                        @foreach($podcasts as $podcast)
                            <option value="{{ $podcast->id }}"{{ old('podcasts')==$podcast->id ? ' selected' : '' }}>{{ $podcast->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Listen Note Episode Id:</strong>
                    <input type="text" class="form-control" name="listen_note_episode_id" placeholder="Listen Note Episode Id">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Title Episode:</strong>
                    <input type="text" class="form-control" name="title" placeholder="Title Episode">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Description Episode:</strong>
                    <input type="text" class="form-control" name="description" placeholder="Description Episode">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Listen Note Audio Url:</strong>
                    <input type="text" name="listen_note_audio_url"  class="form-control" placeholder="Listen Note Audio Url">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Audio Length In Second :</strong>
                    <input type="number" name="audio_length_in_second"  class="form-control" placeholder="Audio Length In Second">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Image Url Listen Note :</strong>
                    <input type="text" name="image_url_listen_note"  class="form-control" placeholder="Image Url Listen Note">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Thumbnail Url Listen Note :</strong>
                    <input type="text" name="thumbnail_url_listen_note"  class="form-control" placeholder="Thumbnail Url Listen Note">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Is Explicit Content :</strong>
                    <select class="status form-control select2" name="explicit_content" data-placeholder="Is Explicit Content" id="explicit_content">
                        <option>---Status---</option>
                        <option value=1>Yes</option>
                        <option value=0>No</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Is Published :</strong>
                    <select class="status form-control select2" name="is_published" data-placeholder="Is Published" id="is_published">
                        <option>---Status---</option>
                        <option value=1>Yes</option>
                        <option value=0>No</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
