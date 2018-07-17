<?php
include "setting/head.php";
include "setting/cekredirect.php";
echo "role = " . $_SESSION['role'] . "<br>";
cekRole("pemilik");
if(ISSET($_GET['no_pol'])){
    $no_pol = $_GET['no_pol'];
    $Merk = $db->get("kendaraan","merk",["No_Pol" => $no_pol]);
    $Tahun_Buat = $db->get("kendaraan","tahun_buat",["No_Pol" => $no_pol]);
    $Bahan_Bakar = $db->get("kendaraan","bahan_bakar",["No_Pol" => $no_pol]);
    $Warna = $db->get("kendaraan","warna",["No_Pol" => $no_pol]);
    $Isi_Silinder = $db->get("kendaraan","isi_silinder",["No_Pol" => $no_pol]);
    $Harga_Sewa = $db->get("kendaraan","harga_sewa",["No_Pol" => $no_pol]);
}
if(ISSET($_POST['No_Pol'])){
    $No_Pol = $_POST['No_Pol'];
    $Merk = $_POST['Merk'];
    $Tahun_Buat = $_POST['Tahun_Buat'];
    $Bahan_Bakar = $_POST['Bahan_Bakar'];
    $Warna = $_POST['Warna'];
    $Isi_Silinder = $_POST['Isi_Silinder'];
    $Harga_Sewa = $_POST['Harga_Sewa'];
    $data =
        [   "Merk"=>$Merk,
            "Tahun_Buat"=>$Tahun_Buat,
            "Bahan_Bakar"=>$Bahan_Bakar,
            "Warna"=>$Warna,
            "Isi_Silinder"=>$Isi_Silinder,
            "Harga_Sewa"=>$Harga_Sewa
        ];
    $Masuk = $db->update("kendaraan",$data,["No_Pol" => $no_pol]);
    if($Masuk) {
        unset ($_POST);
        echo "<script> alert('Data berhasil diedit!'); window.location = 'mobil.php';</script>";
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
        <h1 class="text-center">Edit Data</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="No_Pol">Nomor Polisi:</label>
                <input type="text" class="form-control" name="No_Pol" value="<?php echo $no_pol;?>" readonly >
            </div>
            <div class="form-group">
                <label for="Merk">Merk Mobil</label>
                <input type="text" class="form-control" name="Merk" value="<?php echo $Merk;?>">
            </div>
            <div class="form-group">
                <label for="Tahun_Buat">Tahun Buat</label>
                <input type="text" class="form-control" name="Tahun_Buat" value="<?php echo $Tahun_Buat;?>">
            </div>
            <div class="form-group">
                <label for="Bahan_Bakar">Bahan Bakar</label>
                <select class="form-control" name="Bahan_Bakar">
                    <option value="Pertamax" <?php echo $Bahan_Bakar=="Pertamax" ? "selected" : ""?> >Pertamax</option>
                    <option value="Pertalite" <?php echo $Bahan_Bakar=="Pertalite" ? "selected" : ""?> > Pertalite</option>
                    <option value="Premium" <?php echo $Bahan_Bakar=="Premium" ? "selected" : ""?> >Premium</option>
                    <option value="Solar" <?php echo $Bahan_Bakar=="Solar" ? "selected" : "" ?> >Solar</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Warna">Warna</label>
                <input type="text" class="form-control" name="Warna" value="<?php echo $Warna;?>">
            </div>
            <div class="form-group">
                <label for="Isi_Silinder">Isi Silinder</label>
                <input type="text" class="form-control" name="Isi_Silinder" value="<?php echo $Isi_Silinder;?>">
            </div>
            <div class="form-group">
                <label for="Harga_Sewa">Harga Sewa</label>
                <input type="text" class="form-control" name="Harga_Sewa" value="<?php echo $Harga_Sewa;?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
    <!--end tengah!-->
</div>
<!-- Footer -->

<!-- Footer -->
</body>
