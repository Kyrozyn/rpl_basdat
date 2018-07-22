<?php
include "setting/head.php";
include "setting/cekredirect.php";
echo "role = " . $_SESSION['role'] . "<br>";
cekRole("pemilik");
$count = $db->count("pegawai");
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
                <th>Password</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                <?php
                $pegawai = $db->select("pegawai","*",["hapus" => false]);
                foreach ($pegawai as $p){
                    $no_pegawai = $p['no_pegawai'];
                    $pw = $db->get("login","pw",["username" => $no_pegawai]);
                    ?>
                    <tr>
                        <td><?php echo $p['no_pegawai']; ?></td>
                        <td><?php echo $p['nama']; ?></td>
                        <td><?php echo $p['alamat']; ?></td>
                        <td><?php echo $p['tgl_lahir'];?></td>
                        <td><?php echo $p['no_telp']; ?></td>
                        <td><?php echo  $pw;?></td>
                        <td>
                            <form method="post" accept-charset="utf-8" action="" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini??');" style="padding-top: 13px">
                                <input type="hidden" name="delete_pegawai" value="<?php echo $p['no_pegawai']; ?>">
                                <button type="submit" class="btn btn-danger fa fa-trash-o"></button>
                                <a href="form_editpegawai.php?no_pegawai=<?php echo $p['no_pegawai']; ?>" class="btn btn-secondary fa fa-edit"></a>
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
                <h4 class="modal-title">Tambah Data Pegawai</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal Body -->
            <form method="post" action="">
            <div class="modal-body text-left">
                <div class="form-group">
                    <label for="no_pegawai">Nomor Pegawai</label>
                    <input type="text" class="form-control" name="no_pegawai" value="<?php echo sprintf('%05d',$count+1) ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Pegawai</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
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
    //untuk tambah
    if(ISSET($_POST['no_pegawai'])){
        $no_pegawai = $_POST['no_pegawai'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $no_telp = $_POST['no_telp'];
        $data =
            [   "no_pegawai"=>$no_pegawai,
                "nama"=>$nama,
                "alamat"=>$alamat,
                "tgl_lahir"=>$tgl_lahir,
                "no_telp"=>$no_telp
            ];
        $pw = explode(" ", strtolower($nama));
        $password = $pw[0].$no_pegawai;
        $data_untuk_akun = [
                "username" => $no_pegawai,
                "pw" => $password,
                "role" => "pegawai"
        ];
        $Masuk = $db->insert("pegawai", $data);
        $Masuk2 = $db->insert("login", $data_untuk_akun);
        if($Masuk) {
            unset ($_POST);
            echo "<script> alert('Data berhasil ditambahkan! Password untuk login : $pw[0]'); window.location = window.location.href;</script>";
        }
        else {
            unset ($_POST);
            echo "<script>alert('Data gagal ditambahkan:(!'); window.location = window.location.href;</script>";
        }
    }



    // if(ISSET($_POST['no_pegawai'])){
    //     $no_pegawai = $_POST['no_pegawai'];
    //     $nama = $_POST['nama'];
    //     $alamat = $_POST['alamat'];
    //     $tgl_lahir = $_POST['tgl_lahir'];
    //     $no_telp = $_POST['no_telp'];
    //     $data =
    //         [   "no_pegawai"=>$no_pegawai,
    //             "nama"=>$Merk,
    //             "alamat"=>$alamat,
    //             "tgl_lahir"=>$tgl_lahir,
    //             "no_telp"=>$no_telp
    //         ];
    //     $Masuk = $db->insert("pegawai", $data);
    //     if($Masuk) {
    //         unset ($_POST);
    //         echo "<script> alert('Data berhasil ditambahkan!'); window.location = window.location.href;</script>";
    //     }
    //     else {
    //         unset ($_POST);
    //         echo "<script>alert('Data gagal ditambahkan:(!'); window.location = window.location.href;</script>";
    //     }
    // }