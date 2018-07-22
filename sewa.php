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
        <h1 class="text-center">Data Sewa</h1>
        <br>
        <div class="col-sm-1">
            <a href="pengembalian.php"><button type="button" class="btn btn-primary" data-toggle="modal">
                Form Pengembalian
            </button></a>
        </div>
        <br>
        <table id="mobil" class="display table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Kode Sewa</th>
                <th>Waktu Awal</th>
                <th>Waktu Kesepakatan</th>
                <th>No Polisi</th>
                <th>ID Pelanggan</th>
                <th>ID Driver</th>
                <th>No Pegawai</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                <?php
                $sewa = $db->select("sewa","*",["hapus" => false]);
                foreach ($sewa as $s){
                    ?>
                    <tr>
                        <td><?php echo $s['kode_sewa']; ?></td>
                        <td><?php echo $s['waktu_awal']; ?></td>
                        <td><?php echo $s['waktu_kesepakatan']; ?></td>
                        <td><?php echo $s['no_pol'];?></td>
                        <td><?php echo $s['id_pelanggan']; ?></td>
                        <td><?php echo $s['id_driver']; ?></td>
                        <td><?php echo $s['no_pegawai']; ?></td>
                        <td>
                            <form method="post" accept-charset="utf-8" action="" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini??')" style="padding-top: 13px">
                                <input type="hidden" name="delete_kode" value="<?php echo $s['kode_sewa']; ?>">
                                <button type="submit" class="btn btn-danger fa fa-trash-o"></button>
                                <a href="detailsewa.php?kode_sewa=<?php echo $s['kode_sewa']; ?>" class="btn btn-primary fa fa-id-card-o"></a>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <div class="col-sm-1">
            <a href="peminjaman.php"><button type="button" class="btn btn-primary" data-toggle="modal">
                Tambah Data (Sebagai Admin)
            </button></a>
        </div>
    </div>
    <!--end tengah!-->
</div>
<!-- Footer -->

<!-- Footer -->
</body>
<?php
//untuk hapus
    if(ISSET($_POST['delete_kode'])){
        $hapus = $db->update("sewa",["hapus" => true],["kode_sewa" => $_POST['delete_kode']]);
        if($hapus) {
            unset ($_POST['delete_kode']);
            echo "<script> alert('Data berhasil dihapus'); window.location = window.location.href;</script>";

        }
        else{
            unset ($_POST['delete_kode']);
            echo "<script> alert('Data gagal dihapus'); window.location = window.location.href; </script>";
        }
    }
