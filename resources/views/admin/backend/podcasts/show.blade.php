@extends('admin.backend.pagestatic.layout')

@section('content')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="float-left">
                            <h2> Show Podcast</h2>
                        </div>
                        <div class="pull-left">
                            <a class="btn btn-primary" href="{{ route('pagestatic.index') }}"> Back</a>
                        </div>
                        <div class="card">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label">
                                            <strong>Name :</strong>
                                            {{ $data->name }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label">
                                            <strong>Picture :</strong>
                                            {{ $data->featured_image }}
                                            <label class="col-form-label">
                                            </label>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label">
                                            <strong>Content :</strong>
                                            {{ $data->content }}
                                            <label class="col-form-label">
                                            </label>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label">
                                            <strong>Title :</strong>
                                            {{ $data->seo_title }}
                                            <label class="col-form-label">
                                            </label>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label">
                                            <strong>Description :</strong>
                                            {{ $data->seo_description }}
                                            <label class="col-form-label">
                                            </label>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label">
                                            <strong>Keywords :</strong>
                                            {{ $data->seo_keyword }}
                                            <label class="col-form-label">
                                            </label>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label">
                                            <strong>Status:</strong>
                                            {{ $data->status}}
                                            <label class="col-form-label">
                                            </label>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
