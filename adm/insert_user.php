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
                            <h3>Masukkan User</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <?php
                            $now = date('m-d-Y H:i') . (date('s') + fmod(microtime(true), 1));
                            
                            if (isset($_POST['submit'])) {
                                $query = "INSERT INTO tbl_user VALUES (
                                '" . $_POST['id_user'] . "',
                                '" . $_POST['nama'] . "',
                                '" . $_POST['username'] . "',
                                '" . $_POST['password'] . "',
                                '" . $_POST['no_hp'] . "',
                                '" . $_POST['level'] . "',
                                '" . $_POST['status'] . "')";
                                $berhasil = $mysqli->query($query);
                                if ($berhasil) {
                                    echo '<script> alert("Insert data berhasil");
                                    window.location = "list_user";</script>';
                                } else {
                                    echo '<script> alert("Insert data gagal");'
                                    . 'window.location = "list_user";</script>';
                                }
                            } else {
                                
                            }
                            ?>
                            <form method="post">
                                <table border="0">
                                    <input type="hidden" name="id_user" value="<?php echo md5($now); ?>">
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><input type="text" name="nama"> </td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>:</td>
                                        <td><input type="text" name="username"></td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td>:</td>
                                        <td><input type="text" name="password"> </td>
                                    </tr>
                                    <tr>
                                        <td>HP</td>
                                        <td>:</td>
                                        <td><input type="text" name="no_hp"></td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>:</td>
                                        <td>
                                            <select class="input-small" name="level">
                                                <option value="admin">admin</option>
                                                <option value="ketua">ketua</option>
                                                <option value="surveyor">surveyor</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td>
                                            <select class="input-small" name="status">
                                                <option value="aktif">aktif</option>
                                                <option value="non-aktif">non-aktif</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="list_user" class="btn">Kembali</a></td>
                                        <td></td>
                                        <td><button type="submit" name="submit" class="btn btn-info">Simpan</button></td>
                                    </tr> 
                                </table>
                            </form>
                        </div> <!-- /widget-content -->
                    </div> <!-- /widget -->
                </div> <!-- /span8 -->
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->
</div> <!-- /main -->
<?php include './footer.php'; ?>