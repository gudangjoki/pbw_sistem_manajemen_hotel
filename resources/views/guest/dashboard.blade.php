<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing | Hotel Landing Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
    <style>
        .hero-section {
            background-image: url("{{ asset('img/background.jpg') }}");
            background-size: cover;
            background-position: center;
            height: 100vh;
            color: white;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .hero-section::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .hero-section h1,
        .hero-section p,
        .hero-section a {
            z-index: 2;
            position: relative;
        }

        .hero-section h1 {
            font-size: 4rem;
            margin-bottom: 20px;
        }

        .hero-section p {
            font-size: 1.5rem;
            margin-bottom: 30px;
        }

        .room-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
        }

        .room-card img {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .room-card-body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .room-rating {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
        }

        .room-location,
        .room-price {
            margin: 0;
            color: #6c757d;
        }

        .room-price {
            font-size: 1.25rem;
            font-weight: bold;
            color: #28a745;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
        }

        .facilities-section {
            padding: 50px 0;
        }

        .facility-item {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
        }

        .facility-icon {
            font-size: 2rem;
            color: #007bff;
        }

        .facility-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #404044
        }

        .facility-text {
            color: #6c757d;
        }

        .content-wrapper {
            padding-top: 20px;
        }

        .content-header {
            padding-bottom: 20px;
        }

        .destination-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
        }

        .destination-card-body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .card-title,
        .card-text {
            margin: 0;
            color: #6c757d;
            text-align: left;
        }
    </style>
</head>

<body class="hold-transition layout-top-nav dark-mode">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark" style="height: 100px;">
            <div class="container">
                <a href="" class="navbar-brand">
                    <img src="{{ asset('img/icon1.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Hotel</span>
                </a>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/guest/dashboard/home" class="nav-link">Kamar</a>
                        </li>
                        <li class="nav-item">
                            <a href="/guest/dashboard/fasilitas" class="nav-link">Fasilitas</a>
                        </li>
                        <li class="nav-item">
                            <a href="/guest/dashboard/guest" class="nav-link">Wisata Terdekat</a>
                        </li>
                        <li class="nav-item">
                            <a href="/guest/dashboard/history" class="nav-link">History</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="/dashboard/histori" class="nav-link">History</a>
                        </li> -->
                    </ul>
                </div>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item px-2">
                            <a href="" class="btn btn-outline-secondary text-white px-5">Login</a>
                        </li>
                        <li class="nav-item px-2">
                            <a href="" class="btn btn-secondary text-white px-5">Daftar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- /.navbar -->
        <!-- buatkan switch case untuk router -->
        <!-- case 1 routerkan ini ke page 1 yang dilihat user -->
        @switch($result)
        @case(in_array('home', $result) && in_array('dashboard', $result))
            @include('guest.landing')
        @break
        <!-- break -->
        <!-- case 2 buatkan rute untuk detail kamar yang pilih oleh user  -->
         <!-- cek apakah beberapa value dari array id_tipe_kamar ada di array result? -->
          
        @case(($result['segment3']) !== null && in_array(array_key_exists(1, explode("_", $result['segment3'])) ? explode("_", $result['segment3'])[1] : "", $ids) && in_array('dashboard', $result))
            @include('guest.list_kamar_detail')
        @break
        <!-- case 3 buatkan rute untuk Pembayaran setelah klik booking oleh user -->
        <!-- break -->
        @case(in_array('pembayaran', $result) && in_array('dashboard', $result))
            @include('guest.list_pembayaran')
        @break

        @case(in_array('history', $result) && in_array('dashboard', $result))
            @include('guest.list_histori_booking')
        @break
        <!-- case 4 buatkan rute untuk histori bookingan tombol klik berada pada header -->
            <!-- include('guest.list_histori_booking') -->
        @case(in_array('verifikasi', $result) && in_array('dashboard', $result))
            @include('guest.list_verifikasi_booking')
        @break
        @endswitch
        <!-- break -->
    </div>
    @include('../component.layout.footer')

    <!-- jQuery -->
    <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#dp1').datepicker({

        beforeShowDay: function(date) {
            return date.valueOf() >= now.valueOf();
        },
        autoclose: true

        }).on('changeDate', function(ev) {
        if (ev.date.valueOf() > checkout.datepicker("getDate").valueOf() || !checkout.datepicker("getDate").valueOf()) {

            var newDate = new Date(ev.date);
            newDate.setDate(newDate.getDate() + 1);
            checkout.datepicker("update", newDate);

        }
        $('#dp2')[0].focus();
        });


        var checkout = $('#dp2').datepicker({
        beforeShowDay: function(date) {
            if (!checkin.datepicker("getDate").valueOf()) {
            return date.valueOf() >= new Date().valueOf();
            } else {
            return date.valueOf() > checkin.datepicker("getDate").valueOf();
            }
        },
        autoclose: true

        }).on('changeDate', function(ev) {});
    </script>
</body>

</html>
