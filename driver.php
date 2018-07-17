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
        <h1 class="text-center">Data Driver</h1>
        <table id="mobil" class="display table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>ID Driver</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tgl Lahir (yy/mm/dd)</th>
                <th>Nomor Telepon</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                <?php
                $driver = $db->select("driver","*",["hapus" => false]);
                foreach ($driver as $d){
                    ?>
                    <tr>
                        <td><?php echo $d['id_driver']; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['alamat']; ?></td>
                        <td><?php echo $d['tgl_lahir'];?></td>
                        <td><?php echo $d['no_telp']; ?></td>
                        <td>
                            <form method="post" accept-charset="utf-8" action="" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini??')";>
                                <input type="hidden" name="delete_driver" value="<?php echo $d['id_driver']; ?>">
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
    if(ISSET($_POST['delete_driver'])){
        $hapus = $db->update("driver",["hapus" => true],["id_driver" => $_POST['delete_driver']]);
        if($hapus) {
            unset ($_POST['delete_driver']);
            echo "<script> alert('Data berhasil dihapus'); window.location = window.location.href;</script>";

        }
        else{
            unset ($_POST['delete_driver']);
            echo "<script> alert('Data gagal dihapus'); window.location = window.location.href; </script>";
        }
    }
