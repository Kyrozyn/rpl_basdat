<?php
    $role = $_SESSION['role'];
?>
    <div class="row content">
        <nav class="col-md-2 d-none d-md-block sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <!--Item!-->
                    <?php if ($role == "pemilik"){ ?>
                    <h6 class="sidebar-heading text-muted d-flex px-3">
                        <span>Pengolahan Sewa</span>
                    </h6>
                    <div class="list-group text-left">
                        <a class="list-group-item" href="mobil.php"><i class="fa fa-car fa-fw" aria-hidden="true"></i>&nbsp; Data Kendaraan</a>
                        <a class="list-group-item" href="driver.php"><i class="fa fa-id-card-o fa-fw" aria-hidden="true"></i>&nbsp; Data Driver</a>
                        <a class="list-group-item" href="customer.php"><i class="fa fa-user-circle-o fa-fw" aria-hidden="true"></i>&nbsp; Data Customer</a>
                        <a class="list-group-item" href="#"><i class="fa fa-check fa-fw" aria-hidden="true"></i>&nbsp; Data Sewa</a>
                    </div>
                    <!--!-->

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Pengolahan Pegawai</span>
                    </h6>
                    <div class="list-group text-left">
                        <a class="list-group-item" href="pegawaidata.php"><i class="fa fa-child fa-fw" aria-hidden="true"></i>&nbsp; Data Pegawai</a>
                    </div>
                    <!--!-->
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Laporan</span>
                    </h6>
                    <div class="list-group text-left">
                        <a class="list-group-item" href="#"><i class="fa fa-book fa-fw" aria-hidden="true"></i>&nbsp; Laporan</a>
                    </div>
                    <?php }
                    else if ($role == "pegawai"){
                        ?>
                        <h6 class="sidebar-heading text-muted d-flex px-3">
                            <span>Pengolahan Sewa</span>
                        </h6>
                        <div class="list-group text-left">
                            <a class="list-group-item" href="peminjaman.php"><i class="fa fa-key fa-fw" aria-hidden="true"></i>&nbsp; Peminjaman</a>
                            <a class="list-group-item" href="mobil.php"><i class="fa fa-check fa-fw" aria-hidden="true"></i>&nbsp; Pengembalian</a>
                        </div>
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Pengolahan Customer</span>
                        </h6>
                        <div class="list-group text-left">
                            <a class="list-group-item" href="customer.php"><i class="fa fa-user-circle-o fa-fw" aria-hidden="true"></i>&nbsp; Data Customer</a>
                        </div>
                    <?php
                    }
                    ?>
                    <!--end item!-->
                </ul>
            </div>
        </nav>