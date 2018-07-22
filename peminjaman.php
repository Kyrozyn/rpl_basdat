<?php
include "setting/head.php";
include "setting/cekredirect.php";
error_reporting(0);
echo "role = " . $_SESSION['role'] . "<br>";
cekRole("mix");
$count = $count = $db->count("sewa");
$pelanggan = $db->select("pelanggan", "*");
$driver_sedang_sewa = $db->select("sewa","id_driver",["total_bayar" => null]);
$driv = [];
    foreach ($driver_sedang_sewa as $f){
        if(!empty($f)){
            array_push($driv,$f);
        }
    }
print_r($driv);
?>
<script>
    $(document).ready(function () {
        $('#mobil').DataTable();
    });
</script>
<body>
<!-- Atas !-->
<?php include "setting/atas.php" ?>
<!--!-->
<div class="text-center jumbotron">
    <!-- Kiri !-->
    <?php include "setting/kiri.php" ?>
    <!--!-->
    <!-- Tengah !-->
    <div class="col-sm-6 text-left">
        <h1 class="text-center">**PEMINJAMAN**</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="id_peminjaman">ID Peminjaman</label>
                <input type="text" class="form-control" name="id_peminjaman"
                       value="<?php echo sprintf('%05d', $count + 1) ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nama">ID Pelanggan</label>
                <input type="text" class="form-control" name="id_pelanggan" value=""
                       placeholder="lihat di tabel pelanggan">
            </div>
            <div class="form-group">
                <label for="alamat">Dengan Driver?</label>
                <input type="checkbox" class="form-control" name="id_driver" value="ya">
            </div>
            <div class="form-group">
                <label for="alamat">No. Polisi</label>
                <input type="text" class="form-control" name="no_polisi">
            </div>
            <div class="form-group">
                <label for="waktu_awal">Tanggal Awal</label>
                <input type="date" class="form-control" name="waktu_awal" value="<?php echo date("Y-m-d")?>">
            </div>
            <div class="form-group">
                <label for="alamat">Tanggal Kembali</label>
                <input type="date" class="form-control" name="waktu_kesepakatan">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
    <div class="col-sm-4 text-left">
        <h1 class="text-center">Mobil yg Tersedia</h1>
        <table id="mobil" class="display table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>No. Polisi</th>
                <th>Merk</th>
                <th>Harga Sewa</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $mobil_sedang_disewa = $db->select("sewa","no_pol",["total_bayar" => null]);
            if(!empty($mobil_sedang_disewa)){
                $kendaraan = $db->select("kendaraan",["No_Pol","Merk","Harga_Sewa"],["no_pol[!]" => $mobil_sedang_disewa]);
            }
            else{
                $kendaraan = $db->select("kendaraan",["No_Pol","Merk","Harga_Sewa"]);
            }
            //$kendaraan = $db->select("kendaraan",["No_Pol","Merk","Harga_Sewa"],["no_pol[!]" => $mobil_sedang_disewa]);
            foreach ($kendaraan as $kd) {
                ?>
                <tr>
                <td><?php echo $kd['No_Pol']; ?></td>
                <td><?php echo $kd['Merk']; ?></td>
                <td>Rp. <?php echo number_format($kd['Harga_Sewa'])?>,-</td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>


    <!--end tengah!-->
    <!--Footer -->

    <!--Footer -->
</body>

<?php
    if(isset($_POST['id_peminjaman'])){
        $id_peminjaman = $_POST['id_peminjaman'];
        $id_pelanggan = $_POST['id_pelanggan'];
        $id_driver = $_POST['id_driver'];
        $driver_sedang_sewa = $db->select("sewa","id_driver",["total_bayar" => null]);
        $foo = print_r($driver_sedang_sewa,1);
        if($id_driver == "ya"){
            if(empty($driv)){
                $rand = $db->select("driver","id_driver");
            }
            else{
                $rand = $db->select("driver","id_driver", ["id_driver[!]" => $driv]);
            }
            if(empty($rand)){
                unset ($_POST);
                echo "<script>alert('Maaf, Driver sedang tidak tersedia!'); window.location = window.location.href;</script>";
            }
            $driver = $rand[0];
        }
        else{
            $driver = null;
        }
        $waktu_awal = $_POST['waktu_awal'];
        $waktu_kesepakatan = $_POST['waktu_kesepakatan'];
        $no_polisi = $_POST['no_polisi'];
        $no_pegawai = $_SESSION['username'];
        if(!$db->has("customer", ["id_pelanggan" => $id_pelanggan])){
            unset ($_POST);
            echo "<script>alert('Maaf, customer tidak ada!'); window.location = window.location.href;</script>";
            die();
        }
        else if(!$db->has("kendaraan", ["no_pol" => $no_polisi])){
            unset ($_POST);
            echo "<script>alert('Maaf, kendaraan tidak ada!'); window.location = window.location.href;</script>";
            die();
        }
        $data =
            [
                "kode_sewa" => $id_peminjaman,
                "waktu_awal" => $waktu_awal,
                "waktu_akhir" => null,
                "waktu_kesepakatan" => $waktu_kesepakatan,
                "total_bayar" => null,
                "denda" => null,
                "no_pol" => $no_polisi,
                "id_pelanggan" => $id_pelanggan,
                "id_driver" => $driver,
                "no_pegawai" => $no_pegawai
            ];
        $Masuk = $db->insert("sewa",$data);
        if($Masuk) {
            unset ($_POST);
            echo "<script> alert('Data berhasil ditambahkan!'); window.location = window.location.href;</script>";
        }
        else {
            unset ($_POST);
            echo "<script>alert('Data gagal ditambahkan:(!'); window.location = window.location.href;</script>";
        }
    }