
{{--Feed Instagram--}}
<section class="">
    <div class="container">
        @if($pageCategory->name=="Podcast" && !is_null($pageCategory->instagram_access_token_1))
        <div class="row m-rl--1">
            <div class="col-md-12">
                <div class="panel panel-body center-block">
                    <iframe src="https://open.spotify.com/embed-podcast/show/6Ng48GePyfYEBjhuvhiVtm" width="100%" height="232" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                </div>
            </div>
        </div>
            <div class="row m-rl--1 centered">
                @if(!is_null($pageCategory->instagram_access_token_1 || $pageCategory->instagram_access_token_2))

                    @foreach($imageInstagramFirst as $contentForImageFirst)
                        <div class="p-2">
                            <a href="{{ $contentForImageFirst->link }}" target="_blank"  class="instagram-image">
                                <img src="{{ $contentForImageFirst->images->thumbnail->url }}" class="css-class" alt="alt text">
                            </a>
                        </div>
                    @endforeach
                    {{--get instagram for self--}}
                    {{--<img src="{{ $instagrams->profile_picture }}" alt="{{ $instagrams->full_name }}">--}}

                @elseif(is_null($pageCategory->instagram_access_token_1))
                    <div class="col-xs-12">
                        <div class="panel panel-body center-block">

                        </div>
                    </div>
                @elseif(is_null($pageCategory->instagram_access_token_2))
                            @foreach($imageInstagramFirst as $contentForImageFirst)
                                <div class="p-2">
                                    <a href="{{ $contentForImageFirst->link }}" target="_blank" class="instagram-image">
                                        <img src="{{ $contentForImageFirst->images->thumbnail->url }}" class="css-class" alt="alt text">
                                    </a>
                                </div>
                            @endforeach
                            {{--get instagram for self--}}
                            {{--<img src="{{ $instagrams->profile_picture }}" alt="{{ $instagrams->full_name }}">--}}
                @elseif(is_null($pageCategory->instagram_access_token_1 || $pageCategory->instagram_access_token_2))
                    <div class="col-xs-12">
                        <div class="panel panel-body center-block">

                        </div>
                    </div>
                @endif
            </div>
        @else
            <div class="row m-rl--1 centered">
                @if(!is_null($pageCategory->instagram_access_token_1 or $pageCategory->instagram_access_token_2) )
                            @foreach($imageInstagramFirst as $contentForImageFirst)
                                <div class="p-2">
                                    <a href="{{ $contentForImageFirst->link }}" target="_blank" class="instagram-image">
                                        <img src="{{ $contentForImageFirst->images->thumbnail->url }}" class="css-class" alt="alt text">
                                    </a>
                                </div>
                            @endforeach
                            {{--get instagram for self--}}
                            {{--<img src="{{ $instagrams->profile_picture }}" alt="{{ $instagrams->full_name }}">--}}
                            @foreach($imageInstagramSecond as $contentForImageSecond)
                                <div class="p-2">
                                    <a href="{{ $contentForImageSecond->link }}" target="_blank" class="instagram-image">
                                        <img src="{{ $contentForImageSecond->images->thumbnail->url }}" class="css-class" alt="alt text">
                                    </a>
                                </div>
                            @endforeach
                            {{--get instagram for self--}}
                            {{--<img src="{{ $instagrams->profile_picture }}" alt="{{ $instagrams->full_name }}">--}}
                @elseif(is_null($pageCategory->instagram_access_token_1))
                    <div class="col-xs-12">
                        <div class="panel panel-body center-block">

                        </div>
                    </div>
                @elseif(is_null($pageCategory->instagram_access_token_2))
                            @foreach($imageInstagramFirst as $contentForImageFirst)
                                <div class="p-2">
                                    <a href="{{ $contentForImageFirst->link }}" target="_blank" class="instagram-image">
                                        <img src="{{ $contentForImageFirst->images->thumbnail->url }}" class="css-class" alt="alt text">
                                    </a>
                                </div>
                            @endforeach
                            {{--get instagram for self--}}
                            {{--<img src="{{ $instagrams->profile_picture }}" alt="{{ $instagrams->full_name }}">--}}
                @elseif(is_null($pageCategory->instagram_access_token_1 or $pageCategory->instagram_access_token_2))
                    <div class="col-xs-12">
                        <div class="panel panel-body center-block">
                        </div>
                    </div>

                @endif
            </div>
            @endif
    </div>
</section>
