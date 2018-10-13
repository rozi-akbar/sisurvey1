<?php include './header.php'; ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">      		
                    <div class="widget ">
                        <div class="widget-header">
                            <i class="icon-list-ul"></i>
                            <h3>Daftar Instansi</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <div class="control-group">
                                <a href="insert_instansi" class="btn btn-primary"><i class="icon-plus-sign"></i>Tambah Data</a>
                            </div>
                            <?php
                            include '../config/konekDb.php';

                            $sql = "select * from tbl_jurusan";
                            $result = $mysqli->query($sql);
                            ?>
                            <table border="1" class="table table-striped table-bordered">
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA INSTANSI</th>
                                    <th>TELEPON</th>
                                    <th>STATUS</th>
                                    <th>OPTION</th>
                                </tr>
                                <?php
                                $no = 0;
                                while ($baris = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $no = $no + 1; ?></td>
                                        <td><?php echo $baris['nama_jurusan']; ?></td>
                                        <td><?php echo $baris['telpon']; ?></td>
                                        <td><?php echo $baris['status']; ?></td>
                                        <td style="text-align: center;">
                                            <a href="update_instansi.php?id=<?php echo $baris['id_jurusan'] ?>" class="btn btn-info">
                                                <i class="icon-edit"></i> Edit
                                            </a>
                                            <a href="hapus_instansi.php?id=<?php echo $baris['id_jurusan'] ?>" class="btn btn-danger">
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