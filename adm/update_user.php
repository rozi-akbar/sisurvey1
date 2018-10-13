<?php include './header.php'; ?>
        <div class="main">
            <div class="main-inner">
                <div class="container">
                    <div class="row">
                        <div class="span12">      		

                            <div class="widget ">

                                <div class="widget-header">
                                    <i class="icon-edit"></i>
                                    <h3>Edit User</h3>
                                </div> <!-- /widget-header -->

                                <div class="widget-content">
                                    <?php
                                    include '../config/konekDb.php';
                                    if (isset($_POST['submit'])) {
                                        $query = "UPDATE tbl_user set "
                                                . "nama='$_POST[nama]', "
                                                . "username='$_POST[username]', "
                                                . "password='$_POST[password]', "
                                                . "no_hp='$_POST[no_hp]' , "
                                                . "level='$_POST[level]' , "
                                                . "status='$_POST[status]' "
                                                . "where id_user='$_POST[id_user]' ";
                                        $berhasil = $mysqli->query($query);
                                        if ($berhasil) {
                                            echo '<script> alert("Update data berhasil");'
                                            . 'window.location = "list_user";</script>';
                                        } else {
                                            echo '<script> alert("Update data gagal");'
                                            . 'window.location = "list_user";</script></script>';
                                        }
                                    } else if (isset($_GET['id'])) {
                                        isiData();
                                    } else {
                                        header("Location : list_user");
                                    }

                                    function isiData() {
                                        $id_user = $_GET['id'];
                                        
                                        include '../config/konekDb.php';
                                        $query = "SELECT * from tbl_user where id_user='$id_user'";
                                        $koneksi = $mysqli->query($query);
                                        $hasil = $koneksi->fetch_assoc();
                                        tampilkanFormUpdate($id_user, $hasil['nama'], $hasil['username'], $hasil['password'], $hasil['no_hp'], $hasil['level'], $hasil['status']);
                                    }

                                    function tampilkanFormUpdate($id_user, $nama, $username, $password, $no_hp, $level, $status) {
                                        ?>
                                        <form method="post">
                                            <table border="0">
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" readonly="true">
                                                        <input type="text" name="nama" value="<?php echo $nama; ?>" >
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Username</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" name="username" value="<?php echo $username; ?>" >
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Password</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" name="password" value="<?php echo $password; ?>" >
                                                    </td>
                                                </tr> 
                                                <tr>
                                                    <td>Nomor Handphone</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" name="no_hp" value="<?php echo $no_hp; ?>" >
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Level</td>
                                                    <td>:</td>
                                                    <td>
                                                        <select class="input-small" name="level">
                                                            <option value="<?php echo $level; ?>"><?php echo $level; ?></option>
                                                            <option value="su-admin">su-admin</option>
                                                            <option value="admin">admin</option>
                                                            <option value="surveyor">surveyor</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td>:</td>
                                                    <td>
                                                        <select class="input-small" name="status">
                                                            <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                                                            <option value="aktif">aktif</option>
                                                            <option value="non-aktif">non-aktif</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="list_user" class="btn">Kembali</a>
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
