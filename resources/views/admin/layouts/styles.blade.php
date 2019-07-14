<meta name="csrf-token" content="{{ csrf_token() }}">
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />--}}
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

<link href="{{ asset('themes/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('themes/AdminLTE/bower_components/bootstrap/dist/css/checkbox.css') }}" rel="stylesheet" type="text/css">
{{--<link href="{{ asset('themes/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">--}}
{{--<link href="{{ asset('themes/AdminLTE/Ionicons/css/ionicons.min.css') }}" rel="stylesheet" type="text/css">--}}
<link href="{{ asset('themes/AdminLTE/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('themes/AdminLTE/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('themes/AdminLTE/bower_components/morris.js/morris.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('themes/AdminLTE/bower_components/jvectormap/jquery-jvectormap.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('themes/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
{{--<link href="{{ asset('themes/AdminLTE/bower_components/bootstrap-datepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css">--}}
<link href="{{ asset('themes/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('themes/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('themes/fontawesome/css/all.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('themes/fontawesome/css/fontawesome.css') }}" rel="stylesheet" type="text/css">

<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

@stack('styles')