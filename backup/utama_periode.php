<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>SISURVEY ZAHA</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">    

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
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

                    <a class="brand" href="index.html">
                        <img src="img/zaha.png" height="500" width="500">				
                    </a>

                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">						
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-cog"></i>
                                    Account
                                    <b class="caret"></b>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="javascript:;">Settings</a></li>
                                    <li><a href="javascript:;">Help</a></li>
                                </ul>						
                            </li>

                            <li class="dropdown">					
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-user"></i> 
                                    EGrappler.com
                                    <b class="caret"></b>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="javascript:;">Profile</a></li>
                                    <li><a href="javascript:;">Logout</a></li>
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
                            <a href="utama_user.php">
                                <i class="icon-user"></i>
                                <span>User</span>
                            </a>  									
                        </li>
                        <li>
                            <a href="utama_matakuliah.php">
                                <i class="icon-th-list"></i>
                                <span>Matakuliah</span>
                            </a>  									
                        </li>
                        <li>
                            <a href="utama_pengajar.php">
                                <i class="icon-group"></i>
                                <span>Pengajar</span>
                            </a>							
                        </li>
                        <li>
                            <a href="utama_jurusan.php">
                                <i class="icon-list-ul"></i>
                                <span>Jurusan</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-list-alt"></i>
                                <span>Input Survey</span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="insert_pertanyaan.php">Input Survey Mahasiswa</a></li>
                                <li><a href="faq.html">Input Survey Alumni</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="utama_jurusan.php">
                                <i class="icon-book"></i>
                                <span>Rekapitulasi Survey</span>
                            </a>  									
                        </li>
                    </ul>

                </div> <!-- /container -->

            </div> <!-- /subnavbar-inner -->

        </div> <!-- /subnavbar -->



        <div class="main">
            <div class="main-inner">
                <div class="container">
                    <div class="row">
                        <div class="span12">      		

                            <div class="widget ">

                                <div class="widget-header">
                                    <i class="icon-user"></i>
                                    <h3>Daftar User</h3>
                                </div> <!-- /widget-header -->

                                <div class="widget-content">
                                    <a href="insert_periode.php">Tambah data</a>
                                    <?php
                                    include './koneksiDb.php';
                                    // main 
                                    $database = new koneksiDb("localhost", "root", "", "survey3");
                                    $database->execute_query("select * from survey3.tbl_periode");
                                    $hasil = '';
                                    $hasil .= '<table border="1" class="table table-striped table-bordered">'
                                            . '<tr>
                                            <th> No</th>
                                            <th> ID Periode </th>
                                            <th> Tahun </th>
                                            <th> Semester</th>
                                            <th> Option</th></tr>';
                                    $no = 0;
                                    while ($baris = @mysqli_fetch_assoc($database->getHasil())) {
                                        $hasil .= '<td>' . $no=$no+1 . '</td><td>' . $baris['id_periode'] .'</td><td>' . $baris['tahun'] . '</td><td>' . $baris['semester'] . '</td><td>
                                                        <a href="hapus_periode.php?id=' . $baris['id_periode'] . '">hapus</a>';
                                        $hasil .= '</td></tr>';
                                    }
                                    echo $hasil;
                                    ?>
                                </div> <!-- /widget-content -->
                            </div> <!-- /widget -->
                        </div> <!-- /span8 -->
                    </div> <!-- /row -->
                </div> <!-- /container -->
            </div> <!-- /main-inner -->
        </div> <!-- /main -->


        <!-- memanggil berkas javascript yang dibutuhkan -->
        <script src="jquery-1.8.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="aplikasi_user.js"></script>
        <script src="js/jquery-1.7.2.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/base.js"></script>


    </body>

</html>
