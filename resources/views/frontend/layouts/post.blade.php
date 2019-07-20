<!-- Post -->
<section class="bg0 p-t-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="p-b-20">
                    <!-- Entertainment -->
                    <div class="row p-t-35">
                    @foreach($featuredArticle->take(6) as $getAllArticles)
                        <!-- Tab panes -->
                            <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                <!-- Item latest -->
                                <div class="m-b-45">
                                    <a href="{{route('articleSlug', $getAllArticles->slug)}}" class="wrap-pic-w hov1 trans-03">
                                        <img src="{{url(Storage::url('images/'.$getAllArticles->featured_image))}}" alt="IMG">
                                    </a>

                                    <div class="p-t-16">
                                        <h5 class="p-b-5">
                                            <a href="{{route('articleSlug', $getAllArticles->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                <a href="{{route('articleSlug', $getAllArticles->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                    {{$getAllArticles->name}}
                                                </a>
                                            </a>
                                        </h5>
                                        <span class="cl8">
												<a href="{{route('category', $getAllArticles->category->name)}}" class="f1-s-4 cl8 hov-cl10 trans-03">
													#{{$getAllArticles->category->name}}
												</a>

												<span class="f1-s-3 m-rl-3">
													-
												</span>

												<span class="f1-s-3">
													{{ $getAllArticles->created_at }}
												</span>
									</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-10 col-lg-4">
                <div class="p-l-10 p-rl-0-sr991 p-b-20">
                    <!--  -->
                    <div>
                        <div class="how2 how2-cl4 flex-s-c">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Recent
                            </h3>
                        </div>

                        <ul class="p-t-35">
                            @foreach($getAllArticle->take(4) as $getAllArticles)
                            <li class="flex-wr-sb-s p-b-22">
                                <div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                </div>
                                <a href="{{route('articleSlug' , $getAllArticles->slug)}}" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                    {{$getAllArticles->name}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="p-t-50">
                        <div class="how2 how2-cl4 flex-s-c">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Stay Connected
                            </h3>
                        </div>

                        <ul class="p-t-35">
                            <li class="flex-wr-sb-c p-b-20">
                                <a href="https://www.instagram.com/talamedia.id/" class="size-a-8 flex-c-c borad-3 size-a-8 bg-instagram fs-16 cl0 hov-cl0">
                                    <span class="fab fa-instagram"></span>
                                </a>

                                <div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											@talamedia.id
										</span>

                                    <a href="https://www.instagram.com/talamedia.id/" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                        Follow
                                    </a>
                                </div>
                            </li>

                            <li class="flex-wr-sb-c p-b-20">
                                <a href="https://line.me/R/ti/p/@rvn6239a" class="size-a-8 flex-c-c borad-3 size-a-8 bg-line fs-16 cl0 hov-cl0">
                                    <span class="fab fa-line"></span>
                                </a>

                                <div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											Talamedia
										</span>

                                    <a href="https://www.instagram.com/talamedia.id/" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                        Add
                                    </a>
                                </div>
                            </li>

                            <li class="flex-wr-sb-c p-b-20">
                                <a href="https://www.facebook.com/talamedia.id/" class="size-a-8 flex-c-c borad-3 size-a-8 bg-facebook fs-16 cl0 hov-cl0">
                                    <span class="fab fa-facebook-f"></span>
                                </a>

                                <div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											@talamedia.id
										</span>

                                    <a href="https://www.facebook.com/talamedia.id/" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                        Like
                                    </a>
                                </div>
                            </li>

                            <li class="flex-wr-sb-c p-b-20">
                                <a href="https://twitter.com/talamediaID" class="size-a-8 flex-c-c borad-3 size-a-8 bg-twitter fs-16 cl0 hov-cl0">
                                    <span class="fab fa-twitter"></span>
                                </a>

                                <div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											@talamediaID
										</span>

                                    <a href="https://twitter.com/talamediaID" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                        Follow
                                    </a>
                                </div>
                            </li>
                            <li class="flex-wr-sb-c p-b-20">
                                <a href="https://twitter.com/talamediaID" class="size-a-8 flex-c-c borad-3 size-a-8 bg-linkedin fs-16 cl0 hov-cl0">
                                    <span class="fab fa-linkedin"></span>
                                </a>

                                <div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											Talamedia Networks
										</span>

                                    <a href="https://twitter.com/talamediaID" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                        Follow
                                    </a>
                                </div>
                            </li>

                            <li class="flex-wr-sb-c p-b-20">
                                <a href="https://www.youtube.com/channel/UCkKBUvs4azMDb-DQLAquUDQ" class="size-a-8 flex-c-c borad-3 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
                                    <span class="fab fa-youtube"></span>
                                </a>

                                <div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											Talamedia ID
										</span>

                                    <a href="https://www.youtube.com/channel/UCkKBUvs4azMDb-DQLAquUDQ" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                        Subscribe
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
