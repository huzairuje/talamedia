@extends('admin.backend.articles.layout')

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
                                <a class="btn btn-primary" href="{{ route('article.index') }}"> Back</a>
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
                                                {{ $data->picture }}
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
                                                {{ $data->meta_title }}
                                                <label class="col-form-label">
                                                </label>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">
                                                <strong>slug:</strong>
                                                {{ $data->slug }}
                                                <label class="col-form-label">
                                                </label>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">
                                                <strong>Description :</strong>
                                                {{ $data->meta_description }}
                                                <label class="col-form-label">
                                                </label>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">
                                                <strong>Keywords :</strong>
                                                {{ $data->meta_keywords }}
                                                <label class="col-form-label">
                                                </label>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">
                                                <strong>Status:</strong>
                                                {{ $data->status == 1 ? 'Active' : 'InActive'  }}
                                                <label class="col-form-label">
                                                </label>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">
                                                <strong>Category :</strong>
                                                {{ $data->article_category_id }}
                                                <label class="col-form-label">
                                                </label>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">
                                                <strong>Tag :</strong>
                                                    @foreach($tags as $tag)
                                                        <div value="{{ $tag->id }}"{{ old('article_tag_id') ? (old('article_tag_id') == $tag->id ? ' selected' : '') : ($data->article_tag_id == $tag->id ? ' selected' : '') }}>{{ $tag->name }}</div>
                                                    @endforeach
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
