<?php include './header.php'; ?>

<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">      		

                    <div class="widget ">

                        <div class="widget-header">
                            <i class="icon-trash"></i>
                            <h3>Hapus Pengajar</h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                            <?php
                            include '../config/konekDb.php';
                            if (isset($_POST['submit'])) {
                                $query = "DELETE FROM tbl_pengajar where nip='$_POST[nip]'";
                                $berhasil = $mysqli->query($query);
                                if ($berhasil) {
                                    echo '<script> alert("Hapus data berhasil");'
                                    . 'window.location = "list_pengajar";</script>';
                                } else {
                                    echo '<script> alert("Hapus data gagal");'
                                    . 'window.location = "list_pengajar";</script>';
                                }
                            } else if (isset($_GET['id'])) {
                                isiData();
                            } else {
                                header("Location: list_pengajar");
                            }

                            function isiData() {
                                $nip = $_GET['id'];
                                
                                include '../config/konekDb.php';
                                $query = "SELECT nama, kelamin, alamat, telpon from tbl_pengajar where nip='" . $nip . "'";
                                $koneksi = $mysqli->query($query);
                                $hasil = $koneksi->fetch_assoc();
                                tampilkanFormUpdate($nip, $hasil['nama'], $hasil['kelamin'], $hasil['alamat'], $hasil['telpon']);
                            }

                            function tampilkanFormUpdate($nip, $nama, $kelamin, $alamat, $telpon) {
                                ?>
                                <form method="post">
                                    <div style="color: red;"> Yakin akan menghapus data ini?</div>

                                    <table border="0">
                                        <tr>
                                            <td>NIP</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" name="nip" value="<?php echo $nip; ?>" readonly="true">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" name="nama" value="<?php echo $nama; ?>" readonly="true">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" name="kelamin" value="<?php echo $kelamin; ?>" readonly="true">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" name="alamat" value="<?php echo $alamat; ?>" readonly="true">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Telephone</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" name="telpon" value="<?php echo $telpon; ?>" readonly="true"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="list_pengajar" class="btn">Kembali</a>
                                            </td>
                                            <td></td>
                                            <td>
                                                <button type="submit" name="submit" class="btn btn-danger">Hapus</button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            <?php } ?>
                        </div> <!-- /widget-content -->
                    </div> <!-- /widget -->
                </div> <!-- /span8 -->
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->
</div> <!-- /main -->

<?php include './footer.php'; ?>