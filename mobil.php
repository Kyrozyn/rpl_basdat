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
        <table id="mobil" class="display" style="width:100%">
            <thead>
            <tr>
                <th>No. Polisi</th>
                <th>Merk</th>
                <th>Tahun Buat</th>
                <th>Bahan Bakar</th>
                <th>Warna</th>
                <th>Isi Silinder</th>
                <th>Harga Sewa</th>
            </tr>
            </thead>
            <tbody>
                <?php
                $kendaraan = $db->select("kendaraan","*");
                foreach ($kendaraan as $kd){
                    ?>
                    <tr>
                        <td><?php echo $kd['No_Pol']; ?></td>
                        <td><?php echo $kd['Merk']; ?></td>
                        <td><?php echo $kd['Tahun_Buat']; ?></td>
                        <td><?php echo $kd['Bahan_Bakar'];?></td>
                        <td><?php echo $kd['Warna']; ?></td>
                        <td><?php echo $kd['Isi_Silinder']; ?></td>
                        <td><?php echo $kd['Harga_Sewa'];?></td>
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