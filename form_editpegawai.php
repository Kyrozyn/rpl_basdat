<?php
include "setting/head.php";
include "setting/cekredirect.php";
echo "role = " . $_SESSION['role'] . "<br>";
cekRole("pemilik");
if(ISSET($_GET['no_pegawai'])){
    $no_pegawai = $_GET['no_pegawai'];
    $nama = $db->get("pegawai","nama",["no_pegawai" => $no_pegawai]);
    $alamat = $db->get("pegawai","alamat",["no_pegawai" => $no_pegawai]);
    $tgl_lahir = $db->get("pegawai","tgl_lahir",["no_pegawai" => $no_pegawai]);
    $no_telp = $db->get("pegawai","no_telp",["no_pegawai" => $no_pegawai]);
}
if(ISSET($_POST['no_pegawai'])){
    $no_pegawai = $_POST['no_pegawai'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $no_telp = $_POST['no_telp'];
    $data =
        [   "nama"=>$nama,
            "alamat"=>$alamat,
            "tgl_lahir"=>$tgl_lahir,
            "no_telp"=>$no_telp
        ];
    $Masuk = $db->update("pegawai",$data,["no_pegawai" => $no_pegawai]);
    if($Masuk) {
        unset ($_POST);
        echo "<script> alert('Data berhasil diedit!'); window.location = 'pegawaidata.php';</script>";
    }
    else {
        unset ($_POST);
        echo "<script>alert('Data gagal diedit:(!'); window.location = window.location.href;</script>";
    }
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
        <h1 class="text-center">Edit Data Pegawai</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="no_pegawai">Nomor Pegawai</label>
                <input type="text" class="form-control" name="no_pegawai" value="<?php echo $no_pegawai;?>" readonly>
            </div>
            <div class="form-group">
                <label for="nama">Nama Pegawai</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $nama;?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Pegawai</label>
                <input type="text" class="form-control" name="alamat" value="<?php echo $alamat;?>">
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal_Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $tgl_lahir;?>">
            </div>
            <div class="form-group">
                <label for="no_telp">Nomor Telepon</label>
                <input type="text" class="form-control" name="no_telp" value="<?php echo $no_telp;?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
    <!--end tengah!-->
</div>
<!-- Footer -->

<!-- Footer -->
</body>
