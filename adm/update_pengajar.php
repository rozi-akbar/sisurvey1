<?php include './header.php'; ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">      		

                    <div class="widget ">

                        <div class="widget-header">
                            <i class="icon-edit"></i>
                            <h3>Edit Pengajar</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <?php
                            include '../config/konekDb.php';

                            if (isset($_POST['submit'])) {
                                $query = "UPDATE tbl_pengajar set "
                                        . "nama='$_POST[nama]',"
                                        . "id_jurusan='$_POST[jurusan]', "
                                        . "kelamin='$_POST[kelamin]', "
                                        . "alamat='$_POST[alamat]', "
                                        . "telpon='$_POST[telpon]'"
                                        . "where nip='$_POST[nip]'";
                                $berhasil = $mysqli->query($query);
                                if ($berhasil) {
                                    echo '<script> alert("Update data berhasil");'
                                    . 'window.location = "list_pengajar";</script>';
                                } else {
                                    echo '<script> alert("Update data gagal");'
                                    . 'window.location = "list_pengajar";</script></script>';
                                }
                            } else if (isset($_GET['id'])) {
                                isiData();
                            } else {
                                header("Location : list_pengajar");
                            }

                            function isiData() {
                                $nip = $_GET['id'];
                                include '../config/konekDb.php';
                                $query = "SELECT nama, kelamin, alamat, telpon from tbl_pengajar where nip='$nip'";
                                $koneksi = $mysqli->query($query);
                                $hasil = $koneksi->fetch_assoc();
                                tampilkanFormUpdate($nip, $hasil['nama'], $hasil['kelamin'], $hasil['alamat'], $hasil['telpon']);
                            }

                            function tampilkanFormUpdate($nip, $nama, $kelamin, $alamat, $telpon) {
                                ?>
                                <form method="post">
                                    <table border="0">
                                        <tr>
                                            <td>NIP</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" name="nip" value="<?php echo $nip; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Instansi Sekolah</td>
                                            <td>:</td>
                                            <td>
                                                <select class="input-medium" name="jurusan" id="jurusan">
                                                    <option value="selected">--Sekolah--</option>
                                                    <?php
                                                    include '../config/konekDb.php';
                                                    
                                                    $sql = "select * from tbl_jurusan";
                                                    $result = $mysqli->query($sql);
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<option value='" . $row['id_jurusan'] . "'>" . $row['nama_jurusan'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" name="nama" value="<?php echo $nama; ?>" >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td>
                                                <select name="kelamin">
                                                    <?php
                                                    if ($kelamin == "L") {
                                                        echo '<option value = "L" >Laki-laki</option>';
                                                    } else {
                                                        echo '<option value = "P" >Perempuan</option>';
                                                    }
                                                    ?>
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" name="alamat" value="<?php echo $alamat; ?>" >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Telephone</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" name="telpon" value="<?php echo $telpon; ?>" >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="list_pengajar" class="btn">Kembali</a>
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