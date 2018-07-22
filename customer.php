<?php
include "setting/head.php";
include "setting/cekredirect.php";
echo "role = " . $_SESSION['role'] . "<br>";
cekRole("mix");
$count = $db->count("customer");
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
                            <form method="post" accept-charset="utf-8" action="" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini??');" style="padding-top: 13px">
                                <input type="hidden" name="delete_customer" value="<?php echo $c['id_pelanggan']; ?>">
                                <button type="submit" class="btn btn-danger fa fa-trash-o"></button>
                                <a href="form_editcustomer.php?id_pelanggan=<?php echo $c['id_pelanggan']; ?>" class="btn btn-secondary fa fa-edit"></a>
                            </form>
                        </td>
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
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Customer</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal Body -->
            <form method="post" action="">
            <div class="modal-body text-left">
                <div class="form-group">
                    <label for="id_pelanggan">ID Pelanggan</label>
                    <input type="text" class="form-control" name="id_pelanggan" value="<?php echo sprintf('%05d',$count+1) ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Pelanggan</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat">
                </div>
                <div class="form-group">
                    <label for="no_ktp">Nomor KTP</label>
                    <input type="text" class="form-control" name="no_ktp">
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir">
                </div>
                <div class="form-group">
                    <label for="no_telp">Nomor Telepon</label>
                    <input type="text" class="form-control" name="no_telp">
                </div>
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
    if(ISSET($_POST['id_pelanggan'])){
        $id_pelanggan = $_POST['id_pelanggan'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_ktp = $_POST['no_ktp'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $no_telp = $_POST['no_telp'];
        $data =
            [   "id_pelanggan"=>$id_pelanggan,
                "nama"=>$nama,
                "alamat"=>$alamat,
                "no_ktp"=>$no_ktp,
                "tanggal_lahir"=>$tanggal_lahir,
                "no_telp"=>$no_telp
            ];
        $Masuk = $db->insert("customer", $data);
        if($Masuk) {
            unset ($_POST);
            echo "<script> alert('Data berhasil ditambahkan!'); window.location = window.location.href;</script>";
        }
        else {
            unset ($_POST);
            echo "<script>alert('Data gagal ditambahkan:(!'); window.location = window.location.href;</script>";
        }
    }