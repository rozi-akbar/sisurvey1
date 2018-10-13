<?php include './header.php'; ?>

        <div class="main">
            <div class="main-inner">
                <div class="container">
                    <div class="row">
                        <div class="span12">      		

                            <div class="widget ">

                                <div class="widget-header">
                                    <i class="icon-edit"></i>
                                    <h3>Edit Tahun Ajaran</h3>
                                </div> <!-- /widget-header -->

                                <div class="widget-content">
                                    <?php
                                    include '../config/konekDb.php';
                                    
                                    if (isset($_POST['submit'])) {
                                        $query = "UPDATE tbl_tahun_ajaran set "
                                                . "detail='$_POST[detail_tahun_ajaran]'"
                                                . "where id_tahun_ajaran='$_POST[id_tahun_ajaran]'";
                                        $berhasil = $mysqli->query($query);
                                        if ($berhasil) {
                                            echo '<script> alert("Update data berhasil");'
                                            . 'window.location = "list_tahun_ajaran";</script>';
                                        } else {
                                            echo '<script> alert("Update data gagal");'
                                            . 'window.location = "list_tahun_ajaran";</script>';
                                        }
                                    } else if (isset($_GET['id'])) {
                                        isiData();
                                    } else {
                                        header("Location : list_tahun_ajaran");
                                    }

                                    function isiData() {
                                        $id_tahun_ajaran = $_GET['id'];
                                        include '../config/konekDb.php';
                                        $query = "SELECT * from tbl_tahun_ajaran WHERE id_tahun_ajaran='$id_tahun_ajaran'";
                                        $koneksi = $mysqli->query($query);
                                        $hasil = $koneksi->fetch_assoc();
                                        tampilkanFormUpdate($id_tahun_ajaran, $hasil['detail']);
                                    }

                                    function tampilkanFormUpdate($id_tahun_ajaran, $detail_tahun_ajaran) {
                                        ?>
                                        <form method="post">
                                            <table border="0">
                                                <tr>
                                                    <td>ID Tahun Ajaran</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" name="id_tahun_ajaran" value="<?php echo $id_tahun_ajaran; ?>" readonly="true">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Detail Tahun Ajaran</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" name="detail_tahun_ajaran" value="<?php echo $detail_tahun_ajaran; ?>" >
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="list_tahun_ajaran" class="btn">Kembali</a>
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        <button type="submit" name="submit" class="btn btn-warning">Update</button>
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