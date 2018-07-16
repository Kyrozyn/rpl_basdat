
<?php
echo "Ini situs pegawai...";
include "setting/head.php";
include "setting/cekredirect.php";
echo "role = ".$_SESSION['role']."<br>";
?>
<a href="logout.php" class="btn btn-primary" role="button">Logout</a>
