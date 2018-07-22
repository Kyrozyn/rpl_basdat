<?php
include "setting/head.php";
include "setting/cekredirect.php";
echo "role = " . $_SESSION['role'] . "<br>";
cekRole("pegawai");
?>

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
        <h1>Welcome to kontoru site</h1>
        <p><?php print_r($_SESSION);?></p>
        <hr>
        <h3>Test</h3>
    </div>
    <!--end tengah!-->
</div>
<!-- Footer -->

<!-- Footer -->
</body>