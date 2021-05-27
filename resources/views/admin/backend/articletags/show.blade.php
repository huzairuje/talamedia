@extends('admin.backend.articletags.layout')

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="float-left">
                            <h2> Show Article</h2>
                        </div>
                        <div class="pull-left">
                            <a class="btn btn-primary" href="{{ route('articletag.index') }}"> Back</a>
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
                                            <strong>Status :</strong>
                                            {{ $data->status == 1 ? 'Active' : 'InActive'}}
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
