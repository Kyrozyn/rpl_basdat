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
        <h1 class="text-center">Tambah Data Customer</h1>
        <form action="/action_page.php">
            <div class="form-group">
                <label for="id_pelanggan">ID Pelanggan</label>
                <input type="text" class="form-control" name="id_pelanggan">
            </div>
            <div class="form-group">
                <label for="nama">Nama Pelanggan</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Pelanggan</label>
                <input type="text" class="form-control" name="alamat">
            </div>
            <div class="form-group">
                <label for="no_ktp">Nomor KTP/KTM Pelanggan</label>
                <input type="text" class="form-control" name="no_ktp">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal_Lahir Driver</label>
                <input type="date" class="form-control" name="tanggal_lahir">
            </div>
            <div class="form-group">
                <label for="no_telp">Nomor Telepon Driver</label>
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
