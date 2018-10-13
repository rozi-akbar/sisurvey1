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
                            <h3>Masukkan Pengajar</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <?php
                            if (isset($_POST['submit'])) {
                                $query = "INSERT INTO tbl_pengajar VALUES (
                                                   '" . $_POST['nip'] . "',
                                                   '" . $_POST['jurusan'] . "',
                                                   '" . $_POST['nama'] . "',
                                                   '" . $_POST['kelamin'] . "',
                                                   '" . $_POST['alamat'] . "',
                                                   '" . $_POST['telpon'] . "')";
                                $berhasil = $mysqli->query($query);
                                if ($berhasil) {
                                    echo '<script> alert("Input data berhasil");'
                                    . 'window.location = "list_pengajar";</script>';
                                } else {
                                    echo '<script> alert("Input data gagal");'
                                    . 'window.location = "list_pengajar";</script>';
                                }
                            } else {
                                tampilkanFormInsert();
                            }

                            function tampilkanFormInsert() {
                                ?>
                                <form method="post">
                                    <table border="0">
                                        <tr>
                                            <td>NIP</td>
                                            <td>:</td>
                                            <td><input type="text" name="nip"  > </td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td><input type="text" name="nama"  > </td>
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
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td><select name="kelamin">
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td><input type="text" name="alamat"  ></td>
                                        </tr>
                                        <tr>
                                            <td>Telephone</td>
                                            <td>:</td>
                                            <td><input type="text" name="telpon"  ></td>
                                        <tr>
                                        <tr><td><a href="list_pengajar" class="btn">Kembali</a></td>
                                            <td></td>
                                            <td><button type="submit" name="submit" class="btn btn-info">Simpan</button></td>
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