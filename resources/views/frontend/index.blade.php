@extends('frontend.layouts.app')

@section('content')
    @include('frontend.layouts.headline')
    @include('frontend.layouts.feature_post')
    @include('frontend.instagram.feature_feed_instagram')
    @include('frontend.layouts.post')
    @include('frontend.layouts.banner')
    @include('frontend.layouts.latest')
@endsection
