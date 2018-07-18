<?php
function cekRedirect()
{
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "pegawai") {
            echo "<script>window.location = 'pegawai.php'</script>";
        }
        if ($_SESSION['role'] == "pemilik") {
            echo "<script>window.location = 'admin.php'</script>";
        } else {
            echo "<script>window.location = 'index.php'</script>";
        }
    }
}
function cekRole($a)
{
    $sess = $_SESSION['role'];
    if ($a == "pemilik") {
        if ($sess == "pemilik") {

        }
        else{
            echo "<script>window.location = 'error.php'</script>";
        }
    }
    if ($a == "pegawai") {
        if ($sess == "pegawai") {

        }
        else{
            echo "<script>window.location = 'error.php'</script>";
        }
    }
    if ($a == "mix") {
        if ($sess == "pegawai" OR $sess == "pemilik") {

        }
        else{
            echo "<script>window.location = 'error.php'</script>";
        }
    }
}
