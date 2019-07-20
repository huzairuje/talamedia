<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TZN3VPC');</script>
    <!-- End Google Tag Manager -->
    @include('frontend.layouts.styles')
    <title>Talamedia.id</title>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TZN3VPC"
          height="0" width="0" style="display:none;visibility:hidden">
    </iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
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
