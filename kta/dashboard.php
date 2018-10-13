<?php 
    include './header.php';
    include '../config/konekDb.php';
?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">      		

                    <div class="widget ">

                        <div class="widget-header">
                            <i class="icon-home"></i>
                            <h3>Dashboard</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <?php 
                            $sql = "select nama from tbl_user where id_user = '".$_SESSION['id_user']."';";
                            $result = $mysqli->query($sql);
                            while ($baris = $result->fetch_assoc()) {
                                $nama = $baris['nama'];
                            }
                            ?>
                            <h1>Selamat datang <?php echo $nama; ?> di</h1>
                            <h1>Sistem Informasi Penjaminan Mutu</h1>
                            <h1>PONDOK PESANTREN ZAINUL HASAN GENGGONG</h1>
                        </div> <!-- /widget-content -->
                    </div> <!-- /widget -->
                </div> <!-- /span8 -->
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->
</div> <!-- /main -->
<?php include './footer.php';?>