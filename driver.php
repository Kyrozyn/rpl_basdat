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
                            <form method="post" accept-charset="utf-8" action="" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini??')" style="padding-top: 13px">
                                <input type="hidden" name="delete_driver" value="<?php echo $d['id_driver']; ?>">
                                <button type="submit" class="btn btn-danger fa fa-trash-o"></button>
                                <a href="form_editdriver.php?id_driver=<?php echo $d['id_driver']; ?>" class="btn btn-secondary fa fa-edit"></a>
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
                <h4 class="modal-title">Tambah Data Driver</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal Body -->
            <form method="post" action="">
            <div class="modal-body text-left">
                <div class="form-group">
                    <label for="id_driver">ID Driver</label>
                    <input type="text" class="form-control" name="id_driver">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Driver</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Driver</label>
                    <input type="text" class="form-control" name="alamat">
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir">
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
    if(ISSET($_POST['id_driver'])){
        $id_driver = $_POST['id_driver'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $no_telp = $_POST['no_telp'];
        $data =
            [   "id_driver"=>$id_driver,
                "nama"=>$nama,
                "alamat"=>$alamat,
                "tgl_lahir"=>$tgl_lahir,
                "no_telp"=>$no_telp
            ];
        $Masuk = $db->insert("driver", $data);
        if($Masuk) {
            unset ($_POST);
            echo "<script> alert('Data berhasil ditambahkan!'); window.location = window.location.href;</script>";
        }
        else {
            unset ($_POST);
            echo "<script>alert('Data gagal ditambahkan:(!'); window.location = window.location.href;</script>";
        }
    }