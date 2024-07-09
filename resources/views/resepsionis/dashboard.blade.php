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
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/fullcalendar/main.css') }}">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed bg-white">
    <div class="wrapper">
        @include('../component.layout.header')
        <!-- /.navbar -->
        @include('../component.layout.sidebar')
        <div class="content-wrapper">
        @switch($result)
            @case(in_array('calender', $result) && in_array('dashboard', $result))
                @include('resepsionis.calender')
            @break
            @case(in_array('detail_kamar', $result) && in_array('dashboard', $result))
                @include('resepsionis.detail_kamar')
            @break
            @case(in_array('detail_konfirmasi', $result) && in_array('dashboard', $result))
                @include('resepsionis.detail_konfirmasi')
            @break
            @case(in_array($id_booking_room, $result) && in_array('detail_verifikasi', $result) && in_array('dashboard', $result))
                @include('resepsionis.detail_verifikasi')
            @break
            @case(in_array('list_kamar_status', $result) && in_array('dashboard', $result))
                @include('resepsionis.list_kamar_status')
            @break
            @case(in_array('list_konfirmasi', $result) && in_array('dashboard', $result))
                @include('resepsionis.list_konfirmasi')
            @break
            @case(in_array('list_verifikasi', $result) && in_array('dashboard', $result))
                @include('resepsionis.list_verifikasi')
            @break
            @case(in_array('list_ruangan', $result) && in_array('dashboard', $result))
                @include('resepsionis.list_ruangan')
            @break
        @endswitch
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
    <!-- jQuery UI -->
    <script src="{{ asset('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/fullcalendar/main.js') }}"></script>
    <script>
        $(function () {
        bsCustomFileInput.init();
        });
    </script>
    <!-- <script>
        $(function () {

            /* initialize the calendar
            -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d    = date.getDate(),
                m    = date.getMonth(),
                y    = date.getFullYear()

            var Calendar = FullCalendar.Calendar;
            var calendarEl = document.getElementById('calendar');

            var calendar = new Calendar(calendarEl, {
            headerToolbar: {
                left  : 'prev,next today',
                center: 'title',
                right : 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            themeSystem: 'bootstrap',
            //Random default events
            events: [
                {
                title          : 'All Day Event',
                start          : new Date(y, m, 1),
                backgroundColor: '#f56954', //red
                borderColor    : '#f56954', //red
                allDay         : true
                },
                {
                title          : 'Long Event',
                start          : new Date(y, m, d - 5),
                end            : new Date(y, m, d - 2),
                backgroundColor: '#f39c12', //yellow
                borderColor    : '#f39c12' //yellow
                },
                {
                title          : 'Test b5',
                start          : new Date(y, m, d),
                end            : new Date(y, m, d + 5),
                backgroundColor: '#f39c12', //yellow
                borderColor    : '#f39c12' //yellow
                },
                {
                title          : 'Meeting',
                start          : new Date(y, m, d, 10, 30),
                allDay         : false,
                backgroundColor: '#0073b7', //Blue
                borderColor    : '#0073b7' //Blue
                },
                {
                title          : 'Lunch',
                start          : new Date(y, m, d, 12, 0),
                end            : new Date(y, m, d, 14, 0),
                allDay         : false,
                backgroundColor: '#00c0ef', //Info (aqua)
                borderColor    : '#00c0ef' //Info (aqua)
                },
                {
                title          : 'Birthday Party',
                start          : new Date(y, m, d + 1, 19, 0),
                end            : new Date(y, m, d + 1, 22, 30),
                allDay         : false,
                backgroundColor: '#00a65a', //Success (green)
                borderColor    : '#00a65a' //Success (green)
                },
                {
                title          : 'Click for Google',
                start          : new Date(y, m, 28),
                end            : new Date(y, m, 29),
                url            : 'https://www.google.com/',
                backgroundColor: '#3c8dbc', //Primary (light-blue)
                borderColor    : '#3c8dbc' //Primary (light-blue)
                }
            ],
            editable  : true,
            droppable : false // Disable the drop functionality
            });

            calendar.render();
            // $('#calendar').fullCalendar()
        })
    </script> -->
    <script>
        $(document).ready(function() {
            // Initialize BS custom file input
            bsCustomFileInput.init();

            // Initialize FullCalendar
            var bookingRooms = @json($booking_rooms);
            var bookingHalls = @json($booking_halls);

            var events = bookingRooms.map(function(booking) {
                return {
                    title: 'Kamar '+ booking.nomor_kamar + ' (' + booking.nama_tipe_kamar + ')',
                    start: booking.check_in,
                    end: booking.check_out,
                    backgroundColor: booking.status === 'available' ? '#00a65a' : '#f56954',
                    borderColor: booking.status === 'available' ? '#00a65a' : '#f56954'
                };
            });

            var eventsHall = bookingHalls.map(function(booking) {
                return {
                    title: booking.nama_ruangan + ' (' + booking.id_booking_hall + ')',
                    start: booking.tgl+ 'T' + booking.jam_mulai,
                    end:  booking.tgl+ 'T' + booking.jam_selesai,
                    backgroundColor: booking.status === 'available' ? '#00a65a' : '#f56954',
                    borderColor: booking.status === 'available' ? '#00a65a' : '#f56954'
                };
            });

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                themeSystem: 'bootstrap',
                events: events.concat(eventsHall), // Merge events from both sources
                editable: true,
                droppable: false
            });

            calendar.render();
        });
    </script>
</body>
</html>
