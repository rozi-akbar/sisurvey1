<?php
session_start();

//cek apakah user sudah login
if (!isset($_SESSION['id_user'])) {
    echo '<script> alert("Anda belum login"); window.location = "../login";</script>';
}

//cek level user
if ($_SESSION['level'] != "admin") {
    echo '<script> alert("Anda bukan admin"); window.location = "../login";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>SISURVEY ZAHA</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">    

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
        <link href="../assets/css/font-awesome.css" rel="stylesheet">
        <link href="../assets/css/style.css" rel="stylesheet">
        <link rel="shortcut icon" href="../assets/img/favicon.ico">
    </head>

    <body>

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <a class="brand" href="#">
                        <img src="../assets/img/zaha.png" height="500" width="500">				
                    </a>
                    
                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">					
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-user"></i>
                                    <b class="caret"></b>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="../config/log.php?op=out">Logout</a></li>
                                </ul>						
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->	
                </div> <!-- /container -->
            </div> <!-- /navbar-inner -->
        </div> <!-- /navbar -->

        <div class="subnavbar">
            <div class="subnavbar-inner">
                <div class="container">
                    <ul class="mainnav">
                        <li>
                            <a href="dashboard">
                                <i class="icon-home"></i>
                                <span>Dashboard</span>
                            </a>  									
                        </li>
                        <li>
                            <a href="list_user">
                                <i class="icon-user"></i>
                                <span>User</span>
                            </a>  									
                        </li>
                        <li>
                            <a href="list_pengajar">
                                <i class="icon-group"></i>
                                <span>Pengajar</span>
                            </a>							
                        </li>
                        <li>
                            <a href="list_instansi">
                                <i class="icon-list-ul"></i>
                                <span>Instansi</span>
                            </a>
                        </li>
                        <li>
                            <a href="list_tahun_ajaran">
                                <i class="icon-calendar"></i>
                                <span>Tahun Ajaran</span>
                            </a>
                        </li>
                    </ul>
                </div> <!-- /container -->
            </div> <!-- /subnavbar-inner -->
        </div> <!-- /subnavbar -->
