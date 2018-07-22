<?php
include "setting/head.php";
include "setting/cekredirect.php";
echo "role = " . $_SESSION['role'] . "<br>";
cekRole("mix");

if(ISSET($_GET['kode_sewa'])){
    $kode_sewa = $_GET['kode_sewa'];
    $waktu_awal = $db->get("sewa","waktu_awal",["kode_sewa" => $kode_sewa]);
    $waktu_akhir = $db->get("sewa","waktu_akhir",["kode_sewa" => $kode_sewa]);
    $waktu_kesepakatan = $db->get("sewa","waktu_kesepakatan",["kode_sewa" => $kode_sewa]);
    $no_pol = $db->get("sewa","no_pol",["kode_sewa" => $kode_sewa]);
    $merk = $db->get("sewa",["[><]kendaraan"=>"no_pol"],"kendaraan.merk",["sewa.kode_sewa"=>$kode_sewa]);
    $id_pelanggan = $db->get("sewa","id_pelanggan",["kode_sewa" => $kode_sewa]);
    $nama_pelanggan = $db->get("sewa",["[><]customer"=>"id_pelanggan"],"customer.nama",["sewa.kode_sewa"=>$kode_sewa]);
    $id_driver = $db->get("sewa","id_driver",["kode_sewa" => $kode_sewa]);
    $nama_driver = $db->get("sewa",["[><]driver"=>"id_driver"],"driver.nama",["sewa.kode_sewa"=>$kode_sewa]);
    $no_pegawai = $db->get("sewa","no_pegawai",["kode_sewa" => $kode_sewa]);
    $nama_pegawai = $db->get("sewa",["[><]pegawai"=>"no_pegawai"],"pegawai.nama",["sewa.kode_sewa"=>$kode_sewa]);
    $harga_perhari = $db->get("sewa",["[><]kendaraan"=>"no_pol"],"kendaraan.harga_sewa",["sewa.kode_sewa"=>$kode_sewa]);
    $denda = $db->get("sewa","denda",["kode_sewa" => $kode_sewa]);
    $total_bayar = $db->get("sewa","total_bayar",["kode_sewa" => $kode_sewa]);
}

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
        <h1 class="text-center">Detail Laporan Pengembalian</h1>
        <table class="table">
            <tr>
                <th>Kode Sewa</th>
                <td><?php echo $kode_sewa; ?></td>
            </tr>
            <tr>
                <th>ID - Merk Kendaraan</th>
                <td><?php echo $no_pol." <b>__</b> ".$merk; ?></td>
            </tr>
            <tr>
                <th>ID - Nama Pelanggan</th>
                <td><?php echo $id_pelanggan." <b>__</b> ".$nama_pelanggan; ?></td>
            </tr>
            <tr>
            	<th>ID - Nama Driver</th>
            	<td><?php echo $id_driver." <b>__</b> ".$nama_driver; ?></td>
            </tr>
            <tr>
                <th>NO - Nama Pegawai</th>
                <td><?php echo $no_pegawai." <b>__</b> ".$nama_pegawai; ?></td>
            </tr>
            <tr>
                <th>Waktu Awal - Kesepakatan</th>
                <td><?php echo $waktu_awal." <b> sampai </b> ".$waktu_kesepakatan; ?></td>
            </tr>
            <tr>
                <th>Waktu Pengembalian</th>
                <td><?php echo $waktu_akhir; ?></td>
            </tr>
            <tr>
                <th>Harga Perhari</th>
                <td><?php echo "Rp. ".number_format($harga_perhari).",-"; ?></td>
            </tr>
            <tr>
                <th>Denda</th>
                <td><?php echo "Rp. ".number_format($denda).",-"; ?></td>
            </tr>
            <tr>
                <th>Total Bayar</th>
                <th><?php echo "Rp. ".number_format($total_bayar).",-"; ?></th>
            </tr>
        </table>

    </div>
    <!--end tengah!-->
</div>
<!-- Footer -->

<!-- Footer -->
</body>
