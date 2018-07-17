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
        <h1 class="text-center">Tambah Data Kendaraan</h1>
        <form action="/action_page.php">
            <div class="form-group">
                <label for="No_Pol">Nomor Polisi</label>
                <input type="text" class="form-control" name="No_Pol">
            </div>
            <div class="form-group">
                <label for="Merk">Merk Mobil</label>
                <input type="text" class="form-control" name="Merk">
            </div>
            <div class="form-group">
                <label for="Tahun_Buat">Tahun Buat</label>
                <input type="text" class="form-control" name="Tahun_Buat">
            </div>
            <div class="form-group">
                <label for="Bahan_Bakar">Bahan Bakar</label>
                <select class="form-control" name="Bahan_Bakar">
                    <option value="Pertalite">Pertalite</option>
                    <option value="Premium">Premium</option>
                    <option value="Pertamax">Pertamax</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Warna">Warna</label>
                <input type="text" class="form-control" name="Warna">
            </div>
            <div class="form-group">
                <label for="Isi_Silinder">Isi Silinder</label>
                <input type="text" class="form-control" name="Isi_Silinder">
            </div>
            <div class="form-group">
                <label for="Harga_Sewa">Harga Sewa</label>
                <input type="text" class="form-control" name="Harga_Sewa">
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
