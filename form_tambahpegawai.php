<?php
include "setting/head.php";
include "setting/cekredirect.php";
echo "role = " . $_SESSION['role'] . "<br>";
cekRole("pemilik");
?>

<body>
<!-- Atas !-->
<?php include "setting/atas.php" ?>
<!--!-->
<div class="text-center jumbotron">
    <!-- Kiri !-->
    <?php include "setting/kiri.php" ?>
    <!--!-->
    <!-- Tengah !-->
    <div class="col-sm-10 text-left">
        <h1 class="text-center">Tambah Data Pegawai</h1>
        <form action="/action_page.php">
            <div class="form-group">
                <label for="no_pegawai">Nomor Pegawai</label>
                <input type="text" class="form-control" name="no_pegawai">
            </div>
            <div class="form-group">
                <label for="nama">Nama Pegawai</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Pegawai</label>
                <input type="text" class="form-control" name="alamat">
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal_Lahir Pegawai</label>
                <input type="date" class="form-control" name="tgl_lahir">
            </div>
            <div class="form-group">
                <label for="no_telp">Nomor Telepon Pegawai</label>
                <input type="text" class="form-control" name="no_telp">
            </div>
           
            <button type="reset" class="btn btn-primary">Reset</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
    <!--end tengah!-->
</div>
<!-- Footer -->

<!-- Footer -->
</body>