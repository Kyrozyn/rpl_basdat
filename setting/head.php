<title>Peminjaman Mobil</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="assets/js/jquery-ui/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js "></script>
<?php
//error_reporting(0);
session_start();
require "vendor/autoload.php";
use Medoo\Medoo;
$db = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'penyewaan',
    'server' => 'localhost',
    'username' => 'root',
    'password' => '',
]);
?>