<?php
include "setting/head.php";
include "setting/cekredirect.php";
echo "role = " . $_SESSION['role'] . "<br>";
cekRole("pemilik");
?>
<script>
    $(document).ready(function() {
        $('#mobil').DataTable();
    } );
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
    <div class="col-sm-10 text-left">
        <h1 class="text-center">Data Kendaraan</h1>
        <br>
        <table id="mobil" class="display table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>No. Polisi</th>
                <th>Merk</th>
                <th>Tahun Buat</th>
                <th>Bahan Bakar</th>
                <th>Warna</th>
                <th>Isi Silinder</th>
                <th>Harga Sewa</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                <?php
                $kendaraan = $db->select("kendaraan","*",["hapus" => false]);
                foreach ($kendaraan as $kd){
                    ?>
                    <tr>
                        <td><?php echo $kd['No_Pol']; ?></td>
                        <td><?php echo $kd['Merk']; ?></td>
                        <td><?php echo $kd['Tahun_Buat']; ?></td>
                        <td><?php echo $kd['Bahan_Bakar'];?></td>
                        <td><?php echo $kd['Warna']; ?></td>
                        <td><?php echo $kd['Isi_Silinder']; ?>cc</td>
                        <td>Rp. <?php echo number_format($kd['Harga_Sewa'])?>,-</td>
                        <td>
                            <form method="post" accept-charset="utf-8" action="" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini??')" style="padding-top: 13px">
                                <input type="hidden" name="delete_nopol" value="<?php echo $kd['No_Pol']; ?>">
                                <button type="submit" class="btn btn-danger fa fa-trash-o"></button><a href="form_editkendaraan.php?no_pol=<?php echo $kd['No_Pol']; ?>" class="btn btn-secondary fa fa-edit"></a>
                            </form></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <div class="col-sm-1"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                Tambah Data
            </button></div>
    </div>
    <!--end tengah!-->
</div>
<!-- The Modal -->
<div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div><div class="form-group">
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
                    <option value="Pertamax">Pertamax</option>
                    <option value="Pertalite">Pertalite</option>
                    <option value="Premium">Premium</option>
                    <option value="Solar">Solar</option>
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

            <!-- Modal body -->

            <div class="modal-body text-left">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" value="tambah">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>

        </div>
    </div>
</div>
<!-- Footer -->

<!-- Footer -->
</body>
<?php
//untuk hapus
    if(ISSET($_POST['delete_nopol'])){
        $hapus = $db->update("kendaraan",["hapus" => true],["No_Pol" => $_POST['delete_nopol']]);
        if($hapus) {
            unset ($_POST['delete_nopol']);
            echo "<script> alert('Data berhasil dihapus'); window.location = window.location.href;</script>";
        }
        else{
            unset ($_POST['delete_nopol']);
            echo "<script> alert('Data gagal dihapus'); window.location = window.location.href; </script>";
        }
    }
    //untuk tambah
    if(ISSET($_POST['No_Pol'])){
        $No_Pol = $_POST['No_Pol'];
        $Merk = $_POST['Merk'];
        $Tahun_Buat = $_POST['Tahun_Buat'];
        $Bahan_Bakar = $_POST['Bahan_Bakar'];
        $Warna = $_POST['Warna'];
        $Isi_Silinder = $_POST['Isi_Silinder'];
        $Harga_Sewa = $_POST['Harga_Sewa'];
        $data =
            [   "no_pol"=>$No_Pol,
                "Merk"=>$Merk,
                "Tahun_Buat"=>$Tahun_Buat,
                "Bahan_Bakar"=>$Bahan_Bakar,
                "Warna"=>$Warna,
                "Isi_Silinder"=>$Isi_Silinder,
                "Harga_Sewa"=>$Harga_Sewa
            ];
        $Masuk = $db->insert("kendaraan", $data);
        if($Masuk) {
            unset ($_POST);
            echo "<script> alert('Data berhasil ditambahkan!'); window.location = window.location.href;</script>";
        }
        else {
            unset ($_POST);
            echo "<script>alert('Data gagal ditambahkan:(!'); window.location = window.location.href;</script>";
        }
    }
