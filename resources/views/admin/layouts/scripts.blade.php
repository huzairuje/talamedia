


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="{{asset('themes/AdminLTE/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('themes/AdminLTE/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

{{--<script src="{{ asset('themes/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>--}}
<script src="{{ asset('themes/AdminLTE/bower_components/raphael/raphael.min.js')}}"></script>
{{--<script src="{{ asset('themes/AdminLTE/bower_components/morris.js/morris.min.js')}}"></script>--}}
{{--<script src="{{ asset('themes/AdminLTE/bower_components/jquery-sparkline/dist/js/bootstrap.min.js')}}"></script>--}}
{{--<script src="{{ asset('themes/AdminLTE/bower_components/bootstrap/dist/jquery.sparkline.min.js')}}"></script>--}}
{{--<script src="{{ asset('themes/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>--}}
{{--<script src="{{ asset('themes/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>--}}
{{--<script src="{{ asset('themes/AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>--}}
<script src="{{ asset('themes/AdminLTE/bower_components/moment/min/moment.min.js')}}"></script>
{{--<script src="{{ asset('themes/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>--}}
{{--<script src="{{ asset('themes/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>--}}
{{--<script src="{{ asset('themes/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>--}}
{{--<script src="{{ asset('themes/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>--}}
<script src="{{ asset('themes/AdminLTE/bower_components/fastclick/lib/fastclick.js')}}"></script>
{{--<script src="{{ asset('themes/AdminLTE/dist/js/adminlte.min.js')}}"></script>--}}
{{--<script src="{{ asset('themes/AdminLTE/dist/js/pages/dashboard.js')}}"></script>--}}
{{--<script src="{{ asset('themes/AdminLTE/dist/js/demo.js')}}"></script>--}}
<script src="{{ asset('themes/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.js')}}"></script>

<script src="{{ asset('themes/fontawesome/js/all.js')}}"></script>
<script src="{{ asset('themes/fontawesome/js/fontawesome.js')}}"></script>
@yield('scripts')
@stack('scripts')