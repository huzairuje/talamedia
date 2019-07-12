<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @include('admin.layouts.styles')
    @include('admin.layouts.scripts')

    <![endif]-->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')

    @include('admin.layouts.wrapper')
    @include('admin.layouts.footer')

</body>
</html>
