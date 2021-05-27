@extends('admin.backend.podcasts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="col-lg-2 float-right">
                <a class="btn btn-primary" href="{{ route('podcasts.index') }}">Back To Index</a>
            </div>
            <div class="col-lg-12 float-left">
                <h2>Add New Podcast</h2>
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

    <form action="{{ route('podcasts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Listen Note Podcast Id :</strong>
                    <input type="text" name="listen_note_podcast_id" class="form-control" placeholder="Listen Note Podcast Id">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Title :</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Publisher :</strong>
                    <input type="text" name="publisher"  class="form-control" placeholder="Publisher">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Description :</strong>
                    <input type="text" name="description"  class="form-control" placeholder="Description">
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
                    <strong>Country :</strong>
                    <input type="text" name="country"  class="form-control" placeholder="Country">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Language :</strong>
                    <input type="text" name="language"  class="form-control" placeholder="Language">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Rss Url from listen Note :</strong>
                    <input type="text" name="rss_url_from_listen_note"  class="form-control" placeholder="Rss Url from listen Note">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Listen Note Url :</strong>
                    <input type="text" name="listen_note_url"  class="form-control" placeholder="Listen Note Url">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Is Explicit Content :</strong>
                    <select class="status form-control select2" name="explicit_content" data-placeholder="explicit_content" id="explicit_content">
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
