<?php
echo "Ini situs pemilik...";
include "setting/head.php";
include "setting/cekredirect.php";
echo "role = ".$_SESSION['role']."<br>";
cekRole("pemilik");
?>
<body>
<nav class="navbar navbar-inverse navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <div class="container-fluid">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Bastian Rental Mobil</a>
    <ul class="navbar-nav px-4">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="logout.php">Sign out</a>
        </li>
    </ul>
    </div>
</nav>

<!-- MAIN !-->
<div class="container text-center jumbotron">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <p><a href="#">Link</a></p>
            <p><a href="#">Link</a></p>
            <p><a href="#">Link</a></p>
        </div>
        <div class="col-sm-10 text-left">
            <h1>Welcome</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <hr>
            <h3>Test</h3>
            <p>Lorem ipsum...</p>
        </div>

    </div>
</div>

</body>