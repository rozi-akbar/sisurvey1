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
                            <i class="icon-save"></i>
                            <h3>Masukkan Jurusan</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <?php
                            if (isset($_POST['submit'])) {
                                $query = "INSERT INTO tbl_jurusan VALUES (
                                '" . $_POST['id_jurusan'] . "',
                                '" . $_POST['nama_jurusan'] . "',
                                '" . $_POST['telpon'] . "',
                                '" . $_POST['status'] . "')";
                                $berhasil = $mysqli->query($query);
                                if ($berhasil) {
                                    echo '<script> alert("Insert data berhasil");'
                                    . 'window.location = "list_instansi.php";</script>';
                                } else {
                                    echo '<script> alert("Insert data gagal");'
                                    . 'window.location = "list_instansi.php";</script>';
                                }
                            } else {
                                tampilkanFormInsert("", "", "", "");
                            }

                            function tampilkanFormInsert($id_jurusan, $nama_jurusan, $telpon, $status) {
                                ?>
                                <form method="post">
                                    <table border="0">
                                        <tr>
                                            <td>ID Jurusan</td>
                                            <td>:</td>
                                            <td><input type="text" name="id_jurusan"  > </td>
                                        </tr>
                                        <tr><td>Nama Jurusan</td>
                                            <td>:</td>
                                            <td><input type="text" name="nama_jurusan"  ></td>
                                        </tr>
                                        <tr><td>Telephone</td>
                                            <td>:</td>
                                            <td><input type="text" name="telpon"  ></td>
                                        </tr>
                                        <tr><td>Status</td>
                                            <td>:</td>
                                            <td><input type="text" name="status"  ></td>
                                        </tr>
                                        <tr><td><a href="list_instansi" class="btn">Kembali</a></td>
                                            <td></td>
                                            <td><button type="submit" name="submit" class="btn btn-info">Simpan</button></td>
                                        </tr> 
                                    </table>
                                </form>
                            <?php } ?>
                        </div> <!-- /widget-content -->
                    </div> <!-- /widget -->
                </div> <!-- /span12 -->
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->
</div> <!-- /main -->
<?php include './footer.php'; ?>