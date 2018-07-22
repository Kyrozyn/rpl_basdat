<?php
include "setting/head.php";
include "setting/cekredirect.php";
echo "role = " . $_SESSION['role'] . "<br>";
cekRole("mix");
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
    <div class="col-sm-5 text-left">
        <h1 class="text-center">Pengembalian</h1>
        <?php
            if(!isset($_POST['kode_sewa'])){
            ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="kode_sewa">Kode Sewa</label>
                        <input type="text" class="form-control" name="kode_sewa">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        <?php
            }
        ?>
        <?php

        if (isset($_POST['kode_sewa'])) {
        if(!$db->has("sewa",["AND" => ["kode_sewa" => $_POST['kode_sewa'],"hapus" => false ]])){
            echo "Maaf kode sewa tidak ditemukan/sudah dikembalikan!";
            die();
        }
            $kode_sewa = $_POST['kode_sewa'];
            $waktu_awal = $db->get("sewa","waktu_awal",["kode_sewa" => $kode_sewa]);
            $waktu_akhir = date("Y-m-d");
            $waktu_kesepakatan = $db->get("sewa","waktu_kesepakatan",["kode_sewa" => $kode_sewa]);
            $no_pol = $db->get("sewa","no_pol",["kode_sewa" => $kode_sewa]);
            $id_pelanggan = $db->get("sewa","id_pelanggan",["kode_sewa" => $kode_sewa]);
            $nama_pelanggan = $db->get("customer","nama",["id_pelanggan" => (string)$id_pelanggan]);
            $id_driver = $db->get("sewa","id_driver",["kode_sewa" => $kode_sewa]);
            if(empty($id_driver)){
                $driver = "Tidak ada driver";
                $harga_driver = 0;
            }
            else{
                $driver = $db->get("driver","nama",["id_driver" => $id_driver]);
                $harga_driver = 100000;
            }
            if($waktu_kesepakatan>=$waktu_akhir) {
                $telat = "Tidak Telat";
                $hargasewa = $db->get("kendaraan", "harga_sewa", ["no_pol" => $no_pol]);
                $denda = 0;
            }
            else{
                $telat = "Telat, maka ada denda";
                $hargasewa = $db->get("kendaraan","harga_sewa",["no_pol"=>$no_pol]);
                $denda = (0.5*$hargasewa);
            }
                $waktu_awall = strtotime($waktu_awal);
                $datediff = time() - $waktu_awall;
                $hari = round($datediff/(60*60*24));
                $total_bayar = ($hargasewa*$hari)+$denda+($harga_driver*$hari);

            ?>
            <form action="" method="post">
                <div class="form-group">
                    <input type="hidden" value="<?php echo $denda?>" name="denda">
                    <label for="kode_sewa">Kode Sewa</label>
                    <input type="text" class="form-control" name="kode_sewa" value="<?php echo $kode_sewa?>" readonly>
                </div>
                <div class="form-group">
                    <label for="waktu_awal">Waktu Awal</label>
                    <input type="text" class="form-control" name="waktu_awal" value="<?php echo $waktu_awal?>"  readonly>
                </div>
                <div class="form-group">
                    <label for="waktu_akhir">Waktu akhir</label>
                    <input type="text" class="form-control" name="waktu_akhir" value="<?php echo $waktu_akhir?>"  readonly>
                </div>
                <div class="form-group">
                    <label for="waktu_kesepakatan">Waktu Kesepakatan</label>
                    <input type="text" class="form-control" name="waktu_kesepakatan" value="<?php echo $waktu_kesepakatan?>"  readonly>
                </div>
                <div class="form-group">
                    <label for="no_pol">No Polisi</label>
                    <input type="text" class="form-control" name="no_pol" value="<?php echo $no_pol?>"  readonly>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-5 text-left">
                    <div class="form-group">
                        <label for="nama_pelanggan">Nama_Pelanggan</label>
                        <input type="text" class="form-control" name="nama_pelanggan" value="<?php echo $nama_pelanggan?>"  readonly>
                    </div>
                    <div class="form-group">
                        <label for="driver">Nama Driver</label>
                        <input type="text" class="form-control" name="driver" value="<?php echo $driver?>"  readonly>
                    </div>
                    <div class="form-group">
                        <label for="ket">Keterangan</label>
                        <input type="text" class="form-control" name="ket" value="<?php echo $telat?>"  readonly>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_hari">Jumlah Hari</label>
                        <input type="text" class="form-control" name="jumlah_hari" value="<?php echo $hari?>"  readonly>
                    </div>
                    <div class="form-group">
                        <label for="ket">Total Bayar</label>
                        <input type="text" class="form-control" name="total_bayar2" value="Rp. <?php echo number_format($total_bayar)?>,-"  readonly>
                        <input type="hidden" name="total_bayar" value="<?php echo $total_bayar?>">
                    </div>
                </div>
    </form>
            <?php
        }
        if(isset($_POST['denda'])){
            $kode_sewa = $_POST['kode_sewa'];
            $waktu_akhir = $_POST['waktu_akhir'];
            $total_bayar = $_POST['total_bayar'];
            $denda = $_POST['denda'];
            $data =[
                    "waktu_akhir" => $waktu_akhir,
                    "total_bayar" => $total_bayar,
                    "denda" => $denda,
                    "hapus" => true
            ];
            $masuk = $db->update("sewa",$data,["kode_sewa" => $kode_sewa]);
            if($masuk) {
                unset ($_POST);
                echo "<script> alert('Berhasil Dikembalikan!!'); window.location =window.location.href;</script>";
            }
            else {
                unset ($_POST);
                echo "<script>alert('Gagal Dikembalikan!'); window.location = window.location.href;</script>";
            }
        }
        ?>

    <!--end tengah!-->
</div>
<!-- Footer -->

<!-- Footer -->
</body>