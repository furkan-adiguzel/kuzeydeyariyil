<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assamble 2022 | Admin Panel</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/fontawesome-free/css/all.min.css") }}"/>
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
          href="{{ asset("admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") }}"/>
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}"/>
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/jqvmap/jqvmap.min.css") }}"/>
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("admin/css/adminlte.min.css") }}"/>
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css") }}"/>
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/daterangepicker/daterangepicker.css") }}"/>
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/summernote/summernote-bs4.min.css") }}"/>
    <!-- toastr -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/toastr/toastr.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("admin/plugins/select2/css/select2.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css") }}" />
    <!-- Datatables -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css") }}"/>
    <style>
        .mb-10 {
            margin-bottom: 10px;
        }
    </style>
    @yield('css')
</head>
<body class="{{ auth()->user()->getIsAdmin() ? 'hold-transition sidebar-mini' : 'hold-transition layout-top-nav' }}  layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset("admin/img/AdminLTELogo.png") }}" alt="Assabmle Agora" height="60"
             width="60">
    </div>

    @include('admin.layouts.navbar')

    @if(auth()->user()->getIsAdmin())
    @include('admin.layouts.sidebar')
    @endif

    <div class="content-wrapper">


        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        @if(auth()->user()->getIsAdmin())
                        <h1 class="m-0">Admin</h1>
                        @else
                        <h1 class="m-0">Manager</h1>
                        @endif
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2022 Genc Developers.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 0.1.0-rc
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset("admin/plugins/jquery/jquery.min.js") }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset("admin/plugins/jquery-ui/jquery-ui.min.js") }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset("admin/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<!-- ChartJS -->
<script src="{{ asset("admin/plugins/chart.js/Chart.min.js") }}"></script>
<!-- Sparkline -->
<script src="{{ asset("admin/plugins/sparklines/sparkline.js") }}"></script>
<!-- JQVMap -->
<script src="{{ asset("admin/plugins/jqvmap/jquery.vmap.min.js") }}"></script>
<script src="{{ asset("admin/plugins/jqvmap/maps/jquery.vmap.usa.js") }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset("admin/plugins/jquery-knob/jquery.knob.min.js") }}"></script>
<!-- daterangepicker -->
<script src="{{ asset("admin/plugins/moment/moment.min.js") }}"></script>
<script src="{{ asset("admin/plugins/daterangepicker/daterangepicker.js") }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset("admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") }}"></script>
<!-- Summernote -->
<script src="{{ asset("admin/plugins/summernote/summernote-bs4.min.js") }}"></script>
<!-- toastr -->
<script src="{{ asset("admin/plugins/toastr/toastr.min.js") }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset("admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }}"></script>
<script src="{{ asset("admin/plugins/select2/js/select2.full.min.js") }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset("admin/js/adminlte.js") }}"></script>

<script type="text/javascript">
    let url = "{{ url('/') }}/";
    let url_admin = "{{ route('admin.home') }}";
    let csrf_token = "{{ csrf_token() }}";

    window.route_path = function (path, id, selector) {
        return path.replace(selector, id);
    }

    window.delete_confirm = function (dataTables) {
        $(document).on('click', '.confirm-delete', function (e) {
            if (!confirm(`Uyarı! Kaydı silmek üzeresiniz!`)) {
                return;
            }

            $.ajax({
                url: $(this).data('url'),
                type: "DELETE",
                dataType: 'JSON',
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function (response) {
                    if (response.type === 'success') {
                        toastr.success(response.message);
                        dataTables
                            .row($(this).parents('tr'))
                            .remove()
                            .draw();
                    } else {
                        toastr.error(response.message);
                    }
                }
            });
        });
    }

    $('.select2-form').select2({theme: 'bootstrap4'});
</script>

@if(session()->has('notice'))
    <script>
        $(function () {
            if ("{!! session("notice")["type"] !!}" == "success") {
                toastr.success('{!! session("notice")["message"] !!}');
            } else if ("{!! session("notice")["type"] !!}" == "error") {
                toastr.error('{!! session("notice")["message"] !!}');
            } else {
                toastr.info('{!! session("notice")["message"] !!}');
            }
        });
    </script>
@endif

@yield('js')

</body>
</html>
