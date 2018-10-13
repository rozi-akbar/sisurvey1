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
                            <h3>Daftar Pengajar</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <table border="0">
                                <tr>
                                    <td>Instansi Sekolah</td>
                                    <td>:</td>
                                    <td>
                                        <select name="instansi" id="instansi">
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
                            </table>
                            <div id=view>
                                <?php include 'view_pengajar.php'; ?>    
                            </div>
                        </div> <!-- /widget-content -->
                    </div> <!-- /widget -->
                </div> <!-- /span8 -->
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->
</div> <!-- /main -->
<?php include './footer.php'; ?>