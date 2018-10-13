<?php include './header.php'; ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">      		
                    <div class="widget ">
                        <div class="widget-header">
                            <i class="icon-user"></i>
                            <h3>Daftar User</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <div class="control-group">
                                <a href="insert_user" class="btn btn-primary"><i class="icon-plus-sign"></i>Tambah Data</a>
                                <!--<a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>-->

                                <!-- Modal Insert-->
                                <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 id="myModalLabel">Insert User</h3>
                                    </div>
                                    <div class="modal-body">
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
                                                    <td></td>
                                                    <td></td>
                                                    <td><button type="submit" name="submit" class="btn btn-info">Simpan</button></td>
                                                </tr> 
                                            </table>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                        <button type="submit" name="submit" class="btn btn-info">Simpan</button>
                                        <button class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>

                            </div>
                            <?php
                            include '../config/konekDb.php';
                            // main
                            $sql = "SELECT u.*, j.nama_jurusan FROM tbl_user u JOIN tbl_jurusan j ON j.id_jurusan = u.id_jurusan ORDER BY u.level";
                            $result = $mysqli->query($sql);
                            ?>
                            <table border="1" class="table table-striped table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Instansi</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Nomor Handphone</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>Option</th></tr>        
                                </tr>
                                <?php
                                $no = 0;
                                while ($baris = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $no = $no + 1; ?></td>
                                        <td><?php echo $baris['nama']; ?></td>
                                        <td><?php echo $baris['nama_jurusan']; ?></td>
                                        <td><?php echo $baris['username']; ?></td>
                                        <td><?php echo $baris['password']; ?></td>
                                        <td><?php echo $baris['no_hp']; ?></td>
                                        <td><?php echo $baris['level']; ?></td>
                                        <td><?php echo $baris['status']; ?></td>
                                        <td style="text-align: center;">
                                            <a href="update_user.php?id=<?php echo $baris['id_user']; ?>" class="btn btn-info">
                                                <i class="icon-edit"></i> Edit
                                            </a>
                                            <a href="hapus_user.php?id=<?php echo $baris['id_user']; ?>" class="btn btn-danger">
                                                <i class="icon-remove"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div> <!-- /widget-content -->
                    </div> <!-- /widget -->
                </div> <!-- /span8 -->
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->
</div> <!-- /main -->

<?php include './footer.php'; ?>