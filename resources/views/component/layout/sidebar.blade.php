 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="pageResepsionis.php?page=board" class="brand-link">
        <img src="{{ asset('img/icon1.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Da Hotel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('lte/dist/img/user1-128x128.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block">wed</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="pageResepsionis.php?page=board" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pageResepsionis.php?page=cekdta" class="nav-link active">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Data Kamar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pageResepsionis.php?page=cekdta" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Data Ruangan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pageResepsionis.php?page=cekdta" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Data Konfirmasi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pageResepsionis.php?page=cekdta" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Data Verifikasi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pageResepsionis.php?page=cekdta" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Calender
                        </p>
                    </a>
                </li>
                <li class="nav-header">LOGOUT</li>
                <li class="nav-item">
                    <a id="forLogout" href="" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
                <!-- <script src="plugins/jquery-3.2.1.min.js"></script> -->
                <!-- <script>
                    $(document).ready(function(){
                        $('#forLogout').click(function(e){
                            e.preventDefault();
                            swal({
                                title: "Logout",
                                text: "Yakin Logout?",
                                type: "info",
                                showCancelButton: true,
                                confirmButtonText: "Yes",
                                cancelButtonText: "No",
                                closeOnConfirm: false,
                                closeOnCancel: true
                                }, function(isConfirm) {
                                if (isConfirm) {
                                window.location.href="pageResepsionis.php?logout";
                                }
                            });
                        });
                    })
                </script> -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>