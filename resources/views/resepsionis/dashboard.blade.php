<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Da Hotel | Dashboard</title>
    <link rel="icon" href="{{ asset('img/icon.svg') }}" type="image/icon type">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed bg-white">
    <div class="wrapper">
        @include('../component.layout.header')
        <!-- /.navbar -->
        @include('../component.layout.sidebar')
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    
                </div>
            </section>
            <!-- /.content -->
        </div>

        @include('../component.layout.footer')
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar">
            <!-- Control sidebar content goes here -->
        </aside>
    <!-- /.control-sidebar -->
    </div>

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js ') }}"></script>
    <!-- jQuery Mapael -->
    <script src="{{ asset('lte/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('lte/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('lte/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>
    <script>
        $(function () {
        bsCustomFileInput.init();
        });
    </script>
</body>
</html>