<!DOCTYPE html>
<html>
<head>
    <?php
    include "setting/head.php";
    include "setting/cekredirect.php";
    require "vendor/autoload.php";
    cekRedirect();
    ?>
    <style type="text/css">
        .kotak {
            margin-top: 150px;
        }

        .kotak .input-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="panel panel-default">
        <form action="" method="post">
            <div class="col-md-4 col-md-offset-4 kotak">
                <h3>Silahkan Login ..</h3>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><span class="fa fa-user"></span></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" name="uname">
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><span class="fa fa-lock"></span></span>
                    </div>
                    <input type="password" class="form-control" placeholder="Password" name="pass">
                </div>
                <div class="input-group">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>

<?php

if (isset($_POST['uname']) AND isset($_POST['pass'])) {
    $username = $_POST['uname'];
    $pw = $_POST['pass'];
    $cek = $db->has("login", ["AND" => ["username" => $username, "pw" => $pw]]);
    if ($cek) {
        $role = $db->get("login","role",["username" =>$username]);
        $s = print_r($db->info(),1);
        $a = print_r($_SESSION, TRUE);
        //echo "<div style='margin-bottom:-55px' class='alert alert-danger' role='alert'><span class='fa fa-warning-sign'></span>  $role + $s + $a</div>";
        $_SESSION['username'] = $username;
        $_SESSION['role'] = (string)$role;
        echo "<script>window.location = window.location.href</script>";
    }
    else{
        echo "<div style='margin-bottom:-55px' class='alert alert-danger' role='alert'><span class='fa fa-warning-sign'></span>  Login Gagal !! Username dan Password Salah !!</div>";
    }
}