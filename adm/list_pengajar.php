<?php include './header.php'; ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">      		
                    <div class="widget ">
                        <div class="widget-header">
                            <i class="icon-group"></i>
                            <h3>Daftar Pengajar</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <div class="control-group">
                                <a href="insert_pengajar" class="btn btn-primary"><i class="icon-plus-sign"></i>Tambah Data</a>
                            </div>
                            <?php
                            include '../config/konekDb.php';
                                    // main
                            $sql = "SELECT p.nip, j.nama_jurusan,p.nama,p.kelamin,p.alamat,p.telpon FROM `tbl_pengajar` p JOIN `tbl_jurusan` j ON p.id_jurusan = j.id_jurusan ORDER BY p.nama";
                            $result = $mysqli->query($sql);
                            ?>
                            <table border="1" class="table table-striped table-bordered">
                                <tr>
                                    <th>NO </th>
                                    <th>NIP </th>
                                    <th>JURUSAN </th>
                                    <th>NAMA </th>
                                    <th>JENIS KELAMIN </th>
                                    <th>ALAMAT</th>
                                    <th>TELEPON</th>
                                    <th>Option</th></tr>
                                </tr>
                                <?php
                                $no = 0;
                                while ($baris = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $no=$no+1; ?></td>
                                    <td><?php echo $baris['nip'] ;?></td>
                                    <td><?php echo $baris['nama_jurusan'] ;?></td>
                                    <td><?php echo $baris['nama'] ;?></td>
                                    <td><?php echo $baris['kelamin'] ;?></td>
                                    <td><?php echo $baris['alamat'] ;?></td>
                                    <td><?php echo $baris['telpon'] ;?></td>
                                    <td style="text-align: center;">
                                        <a href="update_pengajar.php?id=<?php echo $baris['nip']; ?>" class="btn btn-info">
                                            <i class="icon-edit"></i> Edit
                                        </a>
                                        <a href="hapus_pengajar.php?id=<?php echo $baris['nip']; ?>" class="btn btn-danger">
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