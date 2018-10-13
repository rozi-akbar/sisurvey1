<?php 
include './K_header.php'; 
include './konekDb.php';
?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">      		

                    <div class="widget ">

                        <div class="widget-header">
                            <i class="icon-copy"></i>
                            <h3>Rekapitulasi Data</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <form method="post">
                                <table border="0">
                                    <tr><td>Instansi Sekolah</td><td>:</td><td>
                                            <select class="input-medium" name="instansi">
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
                                    <tr><td>Nama Pengajar</td><td>:</td><td>
                                            <select class="input-medium" name="pengajar">
                                                <option value="selected">--Guru--</option>
                                                <?php
                                                $sql = "select * from tbl_pengajar";
                                                $result = $mysqli->query($sql);
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . $row['nip'] . "'>" . $row['nama'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr><td>Tahun Akademik</td><td>:</td><td>
                                            <select class="input-medium" name="tahun">
                                                <option selected="selected">--Tahun--</option>
                                                <?php
                                                for ($i = date('Y'); $i >= date('Y') - 5; $i-=1) {
                                                    echo"<option value='$i'> $i </option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr><td>Semester Akademik</td><td>:</td><td>
                                            <select class="input-medium" name="semester">
                                                <option selected="selected">--Semester--</option>
                                                <option value="ganjil">ganjil</option>
                                                <option value="genap">genap</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr><td></td>
                                        <td></td>
                                        <td><button type="submit" class="btn btn-info">Cari</button></td>
                                    </tr> 
                                </table>
                            </form>
                            <?php
                            if (isset($_POST['instansi'])) {
                                $database6 = new koneksiDb("localhost", "root", "", "survey3");
								$database6->execute_query("SELECT jur.nama_jurusan, peng.nama, per.tahun_akademik, per.semester_akademik, AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4, AVG(per.A5) as A5, AVG(per.A6) as A6, AVG(per.A7) as A7, AVG(per.A8) as A8, AVG(per.A9) as A9, AVG(per.A10) as A10
                                            FROM tbl_s_administrasi per
                                            JOIN tbl_jurusan jur ON jur.id_jurusan = per.id_jurusan
                                            JOIN tbl_pengajar peng ON per.nip = peng.nip
                                            WHERE jur.id_jurusan =  '" . $_POST['instansi'] . "'"
                                        . "AND peng.nip =  '" . $_POST['pengajar'] . "'"
                                        . "AND tahun_akademik =  '" . $_POST['tahun'] . "'"
                                        . "AND semester_akademik =  '" . $_POST['semester'] . "';");
                                while ($baris4 = @mysqli_fetch_assoc($database6->getHasil())) {
                                    $baris4['A1'];
									$baris4['A2'];
									$baris4['A3'];
									$baris4['A4'];
									$baris4['A5'];
									$baris4['A6'];
									$baris4['A7'];
									$baris4['A8'];
									$baris4['A9'];
									$baris4['A10'];
                                    $rataadmin = ($baris4['A1'] + $baris4['A2'] + $baris4['A3'] + $baris4['A4'] + $baris4['A5'] + $baris4['A6'] + $baris4['A7'] + $baris4['A8'] + $baris4['A9'] + $baris4['A10']) / 10;
                                }
								$database6->execute_query("SELECT jur.nama_jurusan, peng.nama, per.tahun_akademik, per.semester_akademik, AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4,
                                            AVG(per.B1) as B1, AVG(per.B2) as B2, AVG(per.B3) as B3, AVG(per.B4) as B4,
                                            AVG(per.C1) as C1, AVG(per.C2) as C2, AVG(per.C3) as C3, AVG(per.C4) as C4, AVG(per.C5) as C5, AVG(per.C6) as C6, AVG(per.C7) as C7,
                                            AVG(per.D1) as D1, AVG(per.D2) as D2, AVG(per.D3) as D3, AVG(per.D4) as D4,
											AVG(per.E1) as E1, AVG(per.E2) as E2, AVG(per.E3) as E3, AVG(per.E4) as E4, AVG(per.E5) as E5, AVG(per.E6) as E6, AVG(per.E7) as E7, AVG(per.E8) as E8, AVG(per.E9) as E9, AVG(per.E10) as E10, AVG(per.E11) as E11, AVG(per.E12) as E12, AVG(per.E13) as E13,
											AVG(per.F1) as F1, AVG(per.F2) as F2, AVG(per.F3) as F3, AVG(per.F4) as F4, AVG(per.F5) as F5, AVG(per.F6) as F6
                                            FROM tbl_rekap_survey per
                                            JOIN tbl_jurusan jur ON jur.id_jurusan = per.id_jurusan
                                            JOIN tbl_pengajar peng ON per.nip = peng.nip
                                            WHERE jur.id_jurusan =  '" . $_POST['instansi'] . "'"
                                        . "AND peng.nip =  '" . $_POST['pengajar'] . "'"
                                        . "AND tahun_akademik =  '" . $_POST['tahun'] . "'"
                                        . "AND semester_akademik =  '" . $_POST['semester'] . "';");
                                while ($baris5 = @mysqli_fetch_assoc($database6->getHasil())) {
                                            $baris5['A1'];
                                            $baris5['A2'];
                                            $baris5['A3'];
                                            $baris5['A4'];
                                            $baris5['A5'];
                                            $baris5['A6'];
                                            $baris5['B1'];
                                            $baris5['B2'];
                                            $baris5['B3'];
                                            $baris5['B4'];
                                            $baris5['C1'];
                                            $baris5['C2'];
                                            $baris5['C3'];
                                            $baris5['C4'];
                                            $baris5['C5'];
                                            $baris5['C6'];
											$baris5['C7'];
                                            $baris5['D1'];
                                            $baris5['D2'];
                                            $baris5['D3'];
                                            $baris5['D4'];
											$baris5['E1'];
											$baris5['E2'];
											$baris5['E3'];
											$baris5['E4'];
											$baris5['E5'];
											$baris5['E6'];
											$baris5['E7'];
											$baris5['E8'];
											$baris5['E9'];
											$baris5['E10'];
											$baris5['E11'];
											$baris5['E12'];
											$baris5['E13'];
											$baris5['F1'];
											$baris5['F2'];
											$baris5['F3'];
											$baris5['F4'];
											$baris5['F5'];
                                            $baris5['F6'];
                                    $rataper = ($baris5['A1'] + $baris5['A2'] + $baris5['A3'] + $baris5['A4'] + $baris5['A5'] + $baris5['A6'] + 
											$baris5['B1'] + $baris5['B2'] + $baris5['B3'] + $baris5['B4'] +
											$baris5['C1'] + $baris5['C2'] + $baris5['C3'] + $baris5['C4'] + $baris5['C5'] + $baris5['C6'] + $baris5['C7'] +
											$baris5['D1'] + $baris5['D2'] + $baris5['D3'] + $baris5['D4'] + 
											$baris5['E1'] + $baris5['E2'] + $baris5['E3'] + $baris5['E4'] + $baris5['E5'] + $baris5['E6'] + $baris5['E7'] + $baris5['E8'] + $baris5['E9'] + $baris5['E10'] + $baris5['E11'] + $baris5['E12'] + $baris5['E13'] +
											$baris5['F1'] + $baris5['F2'] + $baris5['F3'] + $baris5['F4'] + $baris5['F5'] + $baris5['F6']) / 40;
                                }
                                $database6->execute_query("SELECT jur.nama_jurusan, peng.nama, per.tahun_akademik, per.semester_akademik, AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4,
                                            AVG(per.B1) as B1, AVG(per.B2) as B2,
                                            AVG(per.C1) as C1, AVG(per.C2) as C2, AVG(per.C3) as C3, AVG(per.C4) as C4, AVG(per.C5) as C5, AVG(per.C6) as C6, AVG(per.C7) as C7, AVG(per.C8) as C8, AVG(per.C9) as C9, AVG(per.C10) as C10, AVG(per.C11) as C11, AVG(per.C12) as C12, AVG(per.C13) as C13, AVG(per.C14) as C14, AVG(per.C15) as C15, AVG(per.C16) as C16, AVG(per.C17) as C17, AVG(per.C18) as C18, AVG(per.C19) as C19, AVG(per.C20) as C20, AVG(per.C21) as C21, AVG(per.C22) as C22, AVG(per.C23) as C23,
                                            AVG(per.D1) as D1, AVG(per.D2) as D2, AVG(per.D3) as D3, AVG(per.D4) as D4, AVG(per.D5) as D5,
											AVG(per.E1) as E1, AVG(per.E2) as E2, AVG(per.E3) as E3,
											AVG(per.F1) as F1, AVG(per.F2) as F2, AVG(per.F3) as F3, AVG(per.F4) as F4, AVG(per.F5) as F5
                                            FROM tbl_s_pelaksanaan per
                                            JOIN tbl_jurusan jur ON jur.id_jurusan = per.id_jurusan
                                            JOIN tbl_pengajar peng ON per.nip = peng.nip
                                            WHERE jur.id_jurusan =  '" . $_POST['instansi'] . "'"
                                        . "AND peng.nip =  '" . $_POST['pengajar'] . "'"
                                        . "AND tahun_akademik =  '" . $_POST['tahun'] . "'"
                                        . "AND semester_akademik =  '" . $_POST['semester'] . "';");
                                while ($baris6 = @mysqli_fetch_assoc($database6->getHasil())) {
                                            $baris6 ['A1'];
                                            $baris6['A2'];
                                            $baris6['A3'];
                                            $baris6['A4'];
                                            $baris6['B1'];
                                            $baris6['B2'];
                                            $baris6['C1'];
                                            $baris6['C2'];
                                            $baris6['C3'];
                                            $baris6['C4'];
                                            $baris6['C5'];
                                            $baris6['C6'];
											$baris6['C7'];
											$baris6['C8'];
											$baris6['C9'];
											$baris6['C10'];
											$baris6['C11'];
											$baris6['C12'];
											$baris6['C13'];
											$baris6['C14'];
											$baris6['C15'];
											$baris6['C16'];
											$baris6['C17'];
											$baris6['C18'];
											$baris6['C19'];
											$baris6['C20'];
											$baris6['C21'];
											$baris6['C22'];
											$baris6['C23'];
                                            $baris6['D1'];
                                            $baris6['D2'];
                                            $baris6['D3'];
                                            $baris6['D4'];
                                            $baris6['D5'];
											$baris6['E1'];
                                            $baris6['E2'];
                                            $baris6['E3'];
											$baris6['F1'];
                                            $baris6['F2'];
                                            $baris6['F3'];
                                            $baris6['F4'];
                                            $baris6['F5'];
                                    $ratapel = ($baris6['A1'] + $baris6['A2'] + $baris6['A3'] + $baris6['A4'] +
                                        $baris6['B1'] + $baris6['B2'] +
                                        $baris6['C1'] + $baris6['C2'] + $baris6['C3'] + $baris6['C4'] + $baris6['C5'] + $baris6['C6'] + $baris6['C7'] + $baris6['C8'] + $baris6['C9'] + $baris6['C10'] + $baris6['C11'] + $baris6['C12'] + $baris6['C13'] + $baris6['C14'] + $baris6['C15'] + $baris6['C16'] + $baris6['C17'] + $baris6['C18'] + $baris6['C19'] + $baris6['C20'] + $baris6['C21'] + $baris6['C22'] + $baris6['C23'] +
                                        $baris6['D1'] + $baris6['D2'] + $baris6['D3'] + $baris6['D4'] + $baris6['D5'] +
										$baris6['E1'] + $baris6['E2'] + $baris6['E3'] +
										$baris6['F1'] + $baris6['F2'] + $baris6['F3'] + $baris6['F4'] + $baris6['F5']) / 42;
                                }
								$database6->execute_query("SELECT jur.nama_jurusan, peng.nama, per.tahun_akademik, per.semester_akademik, AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4, AVG(per.A5) as A5, AVG(per.A6) as A6, AVG(per.A7) as A7, AVG(per.A8) as A8, AVG(per.A9) as A9, AVG(per.A10) as A10
                                            FROM tbl_s_evaluasi per
                                            JOIN tbl_jurusan jur ON jur.id_jurusan = per.id_jurusan
                                            JOIN tbl_pengajar peng ON per.nip = peng.nip
                                            WHERE jur.id_jurusan =  '" . $_POST['instansi'] . "'"
                                        . "AND peng.nip =  '" . $_POST['pengajar'] . "'"
                                        . "AND tahun_akademik =  '" . $_POST['tahun'] . "'"
                                        . "AND semester_akademik =  '" . $_POST['semester'] . "';");
                                while ($baris7 = @mysqli_fetch_assoc($database6->getHasil())) {
                                            $baris7['A1'];
                                            $baris7['A2'];
                                            $baris7['A3'];
                                            $baris7['A4'];
                                            $baris7['A5'];
                                            $baris7['A6'];
                                            $baris7['A7'];
                                            $baris7['A8'];
                                            $baris7['A9'];
                                            $baris7['A10'];
                                    $rataev = ($baris7['A1'] + $baris7['A2'] + $baris7['A3'] + $baris7['A4'] + $baris7['A5'] + $baris7['A6'] + $baris7['A7'] + $baris7['A8'] + $baris7['A9'] + $baris7['A10']) / 10;
                                }
                            }
                            ?><br/><br/>
                            <h3>KESIMPULAN</h3>
                            <table class="table table-striped">
                                <tr>
                                    <td>Rata-Rata Administrasi</td>
                                    <td><?php echo number_format($rataadmin, 2) ?></td>
                                </tr>
								<tr>
                                    <td>Rata-Rata Perencanaan</td>
                                    <td><?php echo number_format($rataper, 2) ?></td>
                                </tr>
								<tr>
                                    <td>Rata-Rata Pelaksanaan</td>
                                    <td><?php echo number_format($ratapel, 2) ?></td>
                                </tr>
								<tr>
                                    <td>Rata-Rata Evaluasi</td>
                                    <td><?php echo number_format($rataev, 2) ?></td>
                                </tr>
								<tr>
                                    <td><h2><B>Rata-Rata Keseluruhan</B></h2></td>
									<?php $ratatotal = ($rataadmin + $rataper + $ratapel + $rataev) / 4;  ?>
                                    <td><h2><B><?php echo number_format($ratatotal, 2) ?></B></h2></td>
                                </tr>
                                <tr>
                                    <td>Evaluasi Kinerja Guru</td>
                                    <td><?php
                                        if ($ratatotal > 4.50) {
                                            echo "<h2>EXCELLENT PERFORMANCE</h2>";
                                        } else if ($ratatotal >= 4.00) {
                                            echo "<h2>VERY GOOD PERFORMANCE</h2>";
                                        } else if ($ratatotal >= 3.50) {
                                            echo "<h2>GOOD PERFORMANCE<h2>";
                                        } else if ($ratatotal > 3.00) {
                                            echo "<h2 style='color: gold'>FAIR PERFORMANCE<h2>";
                                        } else if ($ratatotal >= 2.50) {
                                            echo "<h2 style='color: tomato'>POOR PERFORMANCE<h2>";
                                        } else {
                                            echo "<h2 style='color: tomato'>VERY POOR PERFORMANCE<h2>";
                                        }
                                        ?></td>
                                </tr>
                            </table>
                        </div> <!-- /widget-content -->
                    </div> <!-- /widget -->
                </div> <!-- /span8 -->
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->
</div> <!-- /main -->
<?php include './K_footer.php'; ?>