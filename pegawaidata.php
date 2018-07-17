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
        <h1 class="text-center">Data Pegawai</h1>
        <table id="mobil" class="display table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>No Pegawai</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tgl Lahir (yy/mm/dd)</th>
                <th>Nomor Telepon</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                <?php
                $pegawai = $db->select("pegawai","*",["hapus" => false]);
                foreach ($pegawai as $p){
                    ?>
                    <tr>
                        <td><?php echo $p['no_pegawai']; ?></td>
                        <td><?php echo $p['nama']; ?></td>
                        <td><?php echo $p['alamat']; ?></td>
                        <td><?php echo $p['tgl_lahir'];?></td>
                        <td><?php echo $p['no_telp']; ?></td>
                        <td>
                            <form method="post" accept-charset="utf-8" action="" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini??')";>
                                <input type="hidden" name="delete_pegawai" value="<?php echo $p['no_pegawai']; ?>">
                                <button type="submit" class="btn btn-danger fa fa-trash-o"></button></a>
                            </form></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
    </div>
    <!--end tengah!-->
</div>
<!-- Footer -->

<!-- Footer -->
</body>
<?php
//untuk hapus
    if(ISSET($_POST['delete_pegawai'])){
        $hapus = $db->update("pegawai",["hapus" => true],["no_pegawai" => $_POST['delete_pegawai']]);
        if($hapus) {
            unset ($_POST['delete_pegawai']);
            echo "<script> alert('Data berhasil dihapus'); window.location = window.location.href;</script>";

        }
        else{
            unset ($_POST['delete_pegawai']);
            echo "<script> alert('Data gagal dihapus'); window.location = window.location.href; </script>";
        }
    }
