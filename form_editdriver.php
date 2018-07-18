<?php
include "setting/head.php";
include "setting/cekredirect.php";
echo "role = " . $_SESSION['role'] . "<br>";
cekRole("pemilik");
if(ISSET($_GET['id_driver'])){
    $id_driver = $_GET['id_driver'];
    $nama = $db->get("driver","nama",["id_driver" => $id_driver]);
    $alamat = $db->get("driver","alamat",["id_driver" => $id_driver]);
    $tgl_lahir = $db->get("driver","tgl_lahir",["id_driver" => $id_driver]);
    $no_telp = $db->get("driver","no_telp",["id_driver" => $id_driver]);
}
if(ISSET($_POST['id_driver'])){
    $id_driver = $_POST['id_driver'];
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
    $Masuk = $db->update("driver",$data,["id_driver" => $id_driver]);
    if($Masuk) {
        unset ($_POST);
        echo "<script> alert('Data berhasil diedit!'); window.location = 'driver.php';</script>";
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
        <h1 class="text-center">Edit Data Driver</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="id_driver">ID Driver:</label>
                <input type="text" class="form-control" name="id_driver" value="<?php echo $id_driver;?>" readonly >
            </div>
            <div class="form-group">
                <label for="nama">Nama Driver</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $nama;?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Driver</label>
                <input type="text" class="form-control" name="alamat" value="<?php echo $alamat;?>">
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
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
