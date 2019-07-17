<!-- Feature post -->
<section class="bg0">
    <div class="container">
        <div class="row m-rl--1">
            @foreach($featuredArticle->take(4) as $featuredArticles)
                <div class="col-sm-6 p-rl-1 p-b-2">
                    <div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url({{Storage::url($featuredArticles->featured_image)}});">
                        <a href="{{route('articleSlug', $featuredArticles->slug)}}" class="dis-block how1-child1 trans-03"></a>

                        <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                            <a href="{{route('category', $featuredArticles->category->name)}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                {{$featuredArticles->category->name}}
                            </a>

                            <h3 class="how1-child2 m-t-14">
                                <a href="{{route('article', $featuredArticles->id)}}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                    {{$featuredArticles->name}}
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
