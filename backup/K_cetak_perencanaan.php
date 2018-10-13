<?php include './K_header.php'; ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">      		

                    <div class="widget ">

                        <div class="widget-header">
                            <i class="icon-print"></i>
                            <h3>Cetak Laporan</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <form method="post" action="laporanexcelper.php">
                                <table border="0">
                                    <tr><td>Instansi Sekolah</td><td>:</td><td>
                                            <select class="input-small" name="instansi">
                                                <option value="selected">--Sekolah--</option>
                                                <?php
                                                ini_set("display_errors", "Off");
                                                include './koneksiDb.php';
                                                $database2 = new koneksiDb("localhost", "root", "", "survey3");
                                                $database2->execute_query("select * from tbl_jurusan");
                                                $result = mysql_query($database2);
                                                while ($row = @mysqli_fetch_assoc($database2->getHasil())) {
                                                    echo "<option value='" . $row['id_jurusan'] . "'>" . $row['nama_jurusan'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr><td>Nama Pengajar</td><td>:</td><td>
                                            <select class="input-small" name="pengajar">
                                                <option value="selected">--Guru--</option>
                                                <?php
                                                $database3 = new koneksiDb("localhost", "root", "", "survey3");
                                                $database3->execute_query("select * from survey3.tbl_pengajar");
                                                $result = mysql_query($database3);
                                                while ($row = @mysqli_fetch_assoc($database3->getHasil())) {
                                                    echo "<option value='" . $row['nip'] . "'>" . $row['nama'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr><td>Tahun Akademik</td><td>:</td><td>
                                            <select class="input-small" name="tahun">
                                                <option selected="selected">--Tahun--</option>
                                                <?php
                                                for ($i = date('Y'); $i >= date('Y') - 1; $i-=1) {
                                                    echo"<option value='$i'> $i </option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr><td>Semester Akademik</td><td>:</td><td>
                                            <select class="input-small" name="semester">
                                                <option selected="selected">--Semester--</option>
                                                <option value="ganjil">ganjil</option>
                                                <option value="genap">genap</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr><td></td><td></td><td>
                                            <button type="submit" class="btn btn-success">Cetak Laporan</button></td></tr> 
                                </table>
                            </form>
                        </div> <!-- /widget-content -->
                    </div> <!-- /widget -->
                </div> <!-- /span8 -->
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->
</div> <!-- /main -->
<?php include './K_footer.php'; ?>