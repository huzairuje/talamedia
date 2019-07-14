
{{--Feed Instagram--}}
<section class="bg0 p-t-70">
    <div class="container">
        <div class="tab01-head how2 how2-cl2 bocl12 flex-s-c m-r-10 m-r-0-sr991">
            <!-- Brand tab -->
            <h3 class="f1-m-2 cl13 tab01-title">
                Feed Instagram
            </h3>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#" role="tab">{{$pageCategory->name}}</a>
                </li>

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" data-toggle="tab" href="#tab2-2" role="tab">Info Unpad</a>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" data-toggle="tab" href="#tab2-3" role="tab">Info ITB</a>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" data-toggle="tab" href="#tab2-4" role="tab">Nangor Info</a>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" data-toggle="tab" href="#tab2-4" role="tab">BdgNetijen</a>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" data-toggle="tab" href="#tab2-4" role="tab">WFI</a>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" data-toggle="tab" href="#tab2-4" role="tab">Trifantasia</a>--}}
{{--                </li>--}}

{{--                --}}{{--                <li class="nav-item-more dropdown dis-none">--}}
{{--                    --}}{{--                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">--}}
{{--                        --}}{{--                        <i class="fa fa-ellipsis-h"></i>--}}
{{--                        --}}{{--                    </a>--}}

{{--                    --}}{{--                    <ul class="dropdown-menu">--}}

{{--                        --}}{{--                    </ul>--}}
{{--                    --}}{{--                </li>--}}
            </ul>

            {{--            <!--  -->--}}
            {{--            <a href="category-01.html" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">--}}
                {{--                View all--}}
                {{--                <i class="fs-12 m-l-5 fa fa-caret-right"></i>--}}
                {{--            </a>--}}
        </div>


        <div class="row m-rl--1">
            @foreach($imageInstagramFirst as $contentForImageFirst)
                <a href="{{ $contentForImageFirst->link }}">
                    <img src="{{ $contentForImageFirst->images->thumbnail->url }}" class="css-class" alt="alt text">
                </a>
            @endforeach
        </div>
    </div>
</section>
