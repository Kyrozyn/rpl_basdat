<?php
include "setting/head.php";
include "setting/cekredirect.php";
echo "role = " . $_SESSION['role'] . "<br>";
cekRole("mix");
if(ISSET($_GET['id_pelanggan'])){
    $id_pelanggan = $_GET['id_pelanggan'];
    $nama = $db->get("customer","nama",["id_pelanggan" => $id_pelanggan]);
    $alamat = $db->get("customer","alamat",["id_pelanggan" => $id_pelanggan]);
    $no_ktp = $db->get("customer","no_ktp",["id_pelanggan" => $id_pelanggan]);
    $tanggal_lahir = $db->get("customer","tanggal_lahir",["id_pelanggan" => $id_pelanggan]);
    $no_telp = $db->get("customer","no_telp",["id_pelanggan" => $id_pelanggan]);
}
if(ISSET($_POST['id_pelanggan'])){
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_ktp = $_POST['no_ktp'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $no_telp = $_POST['no_telp'];
    $data =
        [   "nama"=>$nama,
            "alamat"=>$alamat,
            "no_ktp"=>$no_ktp,
            "tanggal_lahir"=>$tanggal_lahir,
            "no_telp"=>$no_telp
        ];
    $Masuk = $db->update("customer",$data,["id_pelanggan" => $id_pelanggan]);
    if($Masuk) {
        unset ($_POST);
        echo "<script> alert('Data berhasil diedit!'); window.location = 'customer.php';</script>";
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
        <h1 class="text-center">Edit Data Customer</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="id_pelanggan">ID Pelanggan</label>
                <input type="text" class="form-control" name="id_pelanggan" value="<?php echo $id_pelanggan;?>" readonly >
            </div>
            <div class="form-group">
                <label for="nama">Nama Pelanggan</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $nama;?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Pelanggan</label>
                <input type="text" class="form-control" name="alamat" value="<?php echo $alamat;?>">
            </div>
            <div class="form-group">
                <label for="no_ktp">Nomor KTP Pelanggan</label>
                <input type="text" class="form-control" name="no_ktp" value="<?php echo $no_ktp;?>">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal_Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $tanggal_lahir;?>">
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
