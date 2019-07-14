<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.layouts.styles')
    <title>Talamedia.id</title>
</head>
<body>
@include('frontend.layouts.header_dekstop')
@include('frontend.layouts.header_mobile')
@include('frontend.layouts.menu_mobile')
@include('frontend.layouts.wrap')
@yield('content')
@include('frontend.layouts.back_to_top')
@include('frontend.layouts.footer')
@include('frontend.layouts.script')
</body>
</html>
