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
                            <i class="icon-list-ol"></i>
                            <h3>Daftar Rekapitulasi</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <table border="0">
                                <tr>
                                    <td>Instansi Sekolah</td>
                                    <td>:</td>
                                    <td>
                                        <select class="input-medium" name="instansi" id="instansi">
                                            <option value="selected">--Sekolah--</option>
                                            <?php
                                            ini_set("display_errors", "Off");
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
                                    <td>Tahun Akademik</td>
                                    <td>:</td>
                                    <td>
                                        <select class="input-medium" name="tahun" id="tahun">
                                            <option value="selected">--Tahun--</option>
                                            <?php
//                                            ini_set("display_errors", "Off");
                                            $sql = "SELECT * FROM tbl_tahun_ajaran ORDER BY id_tahun_ajaran desc LIMIT 5";
                                            $result = $mysqli->query($sql);
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row['id_tahun_ajaran'] . "'>" . $row['detail'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Semester Akademik</td>
                                    <td>:</td>
                                    <td>
                                        <select class="input-medium" name="semester" id="semester">
                                            <option selected="selected">--Semester--</option>
                                            <option value="ganjil">ganjil</option>
                                            <option value="genap">genap</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <div id=view>
                                <?php include 'K_view_rekapitulasi.php'; ?>    
                            </div>
                        </div> <!-- /widget-content -->
                    </div> <!-- /widget -->
                </div> <!-- /span8 -->
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->
</div> <!-- /main -->
<?php include './footer.php'; ?>