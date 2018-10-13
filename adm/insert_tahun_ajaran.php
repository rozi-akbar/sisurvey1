<?php include './header.php'; ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">      		
                    <div class="widget ">
                        <div class="widget-header">
                            <i class="icon-save"></i>
                            <h3>Masukkan Tahun Ajaran</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <?php
                            include '../config/konekDb.php';

                            if (isset($_POST['submit'])) {
                                $query = "INSERT INTO tbl_tahun_ajaran VALUES (
                                '" . $_POST['id_tahun_ajaran'] . "',
                                '" . $_POST['detail'] . "')";
                                $berhasil = $mysqli->query($query);
                                if ($berhasil) {
                                    echo '<script> alert("Insert data berhasil");
                                    window.location = "list_tahun_ajaran";</script>';
                                } else {
                                    echo '<script> alert("Update data gagal");</script>';
                                }
                            } else {
                                tampilkanFormInsert("", "");
                            }

                            function tampilkanFormInsert($id_tahun_ajaran, $detail) {
                                ?>
                                <form method="post">
                                    <table border="0">
                                        <tr>
                                            <td>ID Tahun Ajaran</td>
                                            <td>:</td>
                                            <td><input type="text" name="id_tahun_ajaran"  > </td>
                                        </tr>
                                        <tr><td>Detail Tahun Ajaran</td>
                                            <td>:</td>
                                            <td><input type="text" name="detail"  ></td>
                                        </tr>
                                        <tr><td><a href="list_tahun_ajaran" class="btn">Kembali</a></td>
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