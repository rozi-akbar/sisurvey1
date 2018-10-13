<?php include './header.php'; ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">      		
                    <div class="widget ">
                        <div class="widget-header">
                            <i class="icon-list-ul"></i>
                            <h3>Daftar Tahun Ajaran</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <div class="control-group">
                                <a href="insert_tahun_ajaran" class="btn btn-primary"><i class="icon-plus-sign"></i>Tambah Data</a>
                            </div>
                            <?php
                            include '../config/konekDb.php';
                                    // main 
                            $sql = "select * from tbl_tahun_ajaran";
                            $result = $mysqli->query($sql);
                            ?>
                            <table border="1" class="table table-striped table-bordered">
                            <tr>
                                <th>NO</th>
                                <th>ID TAHUN AJARAN</th>
                                <th>DETAIL TAHUN AJARAN</th>
                                <th>OPTION</th>
                            </tr>
                            <?php
                            $no = 0;
                            while ($baris = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $no = $no + 1; ?></td>
                                    <td><?php echo $baris['id_tahun_ajaran']; ?></td>
                                    <td><?php echo $baris['detail']; ?></td>
                                    <td style="text-align: center;">
                                        <a href="update_tahun_ajaran.php?id=<?php echo $baris['id_tahun_ajaran']?>" class="btn btn-info">
                                            <i class="icon-edit"></i> Edit
                                        </a>
                                        <a href="hapus_tahun_ajaran.php?id=<?php echo $baris['id_tahun_ajaran']?>" class="btn btn-danger">
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