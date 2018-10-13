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
                            <i class="icon-trash"></i>
                            <h3>Hapus Jurusan</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">

                            <?php
                            if (isset($_POST['submit'])) {
                                $query = "DELETE FROM tbl_jurusan where id_jurusan='$_POST[id_jurusan]'";
                                $berhasil = $mysqli->query($query);
                                if ($berhasil) {
                                    echo '<script> alert("Hapus data berhasil");'
                                    . 'window.location = "list_instansi";</script>';
                                } else {
                                    echo '<script> alert("Hapus data gagal");'
                                    . 'window.location = "list_instansi";</script>';
                                }
                            } else if (isset($_GET['id'])) {
                                isiData();
                            } else {
                                header("Location: list_instansi");
                            }

                            function isiData() {
                                $id_jurusan = $_GET['id'];
                                
                                include '../config/konekDb.php';
                                $query = "SELECT nama_jurusan, telpon, status from tbl_jurusan where id_jurusan='" . $id_jurusan . "'";
                                $koneksi = $mysqli->query($query);
                                $hasil = $koneksi->fetch_assoc();
                                tampilkanFormUpdate($id_jurusan, $hasil['nama_jurusan'], $hasil['telpon'], $hasil['status']);
                            }

                            function tampilkanFormUpdate($id_jurusan, $nama_jurusan, $telpon, $status) {
                                ?>
                                <form method="post">
                                    <div style="color: red;"> Yakin akan menghapus data ini?</div>

                                    <table border="0">
                                        <tr>
                                            <td>ID Jurusan</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" name="id_jurusan" value="<?php echo $id_jurusan; ?>" readonly="true">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Jurusan</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" name="nama_jurusan" value="<?php echo $nama_jurusan; ?>" readonly="true">
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
                                            <td>Status</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" name="status" value="<?php echo $status; ?>" readonly="true">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="list_instansi" class="btn">Kembali</a>
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