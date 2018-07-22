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
        <h1 class="text-center">Laporan Pengembalian</h1>
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
                <th>Total Bayar</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                <?php
                $sewa = $db->select("sewa","*",["hapus" => true]);
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
                        <td>Rp. <?php echo number_format($s['total_bayar'])?>,-</td>
                        <td>
                            <a href="detaillaporan.php?kode_sewa=<?php echo $s['kode_sewa']; ?>" class="btn btn-primary fa fa-id-card-o"></a>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        
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
