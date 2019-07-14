@extends('frontend.layouts.app')

@section('content')
    @if($pageCategory->name=="InfoKampus" or $pageCategory->name=="RuangKota" or $pageCategory->name=="Podcast")
        @include('frontend.instagram.category_feed_instagram')
        @include('frontend.layouts.latest')
    @else
        @include('frontend.layouts.latest')
    @endif
{{--    @include('frontend.instagram.category_feed_instagram')--}}
{{--    @include('frontend.layouts.latest')--}}
@endsection
