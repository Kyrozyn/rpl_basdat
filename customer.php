<?php
include "setting/head.php";
include "setting/cekredirect.php";
echo "role = " . $_SESSION['role'] . "<br>";
cekRole("mix");
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
        <h1 class="text-center">Data Customer</h1>
        <table id="mobil" class="display table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>ID Pelanggan</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No KTP</th>
                <th>Tgl Lahir (yy/mm/dd)</th>
                <th>Nomor Telepon</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                <?php
                $customer = $db->select("customer","*",["hapus" => false]);
                foreach ($customer as $c){
                    ?>
                    <tr>
                        <td><?php echo $c['id_pelanggan']; ?></td>
                        <td><?php echo $c['nama']; ?></td>
                        <td><?php echo $c['alamat']; ?></td>
                        <td><?php echo $c['no_ktp'];?></td>
                        <td><?php echo $c['tanggal_lahir'];?></td>
                        <td><?php echo $c['no_telp']; ?></td>
                        <td>
                            <form method="post" accept-charset="utf-8" action="" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini??')";>
                                <input type="hidden" name="delete_customer" value="<?php echo $c['id_pelanggan']; ?>">
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
    if(ISSET($_POST['delete_customer'])){
        $hapus = $db->update("customer",["hapus" => true],["id_pelanggan" => $_POST['delete_customer']]);
        if($hapus) {
            unset ($_POST['delete_customer']);
            echo "<script> alert('Data berhasil dihapus'); window.location = window.location.href;</script>";

        }
        else{
            unset ($_POST['delete_customer']);
            echo "<script> alert('Data gagal dihapus'); window.location = window.location.href; </script>";
        }
    }
