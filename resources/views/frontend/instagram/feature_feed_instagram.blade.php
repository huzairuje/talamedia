
{{--Feed Instagram--}}
<section class="bg0 p-t-70">
    <div class="container">
        <div class="row m-rl--1 centered">
            @foreach($instagrams as $instagram)
                <div class="p-2">
                    <a href="{{ $instagram->link }}" class="instagram-image">
                        <img src="{{ $instagram->images->thumbnail->url }}" class="css-class" alt="alt text">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
