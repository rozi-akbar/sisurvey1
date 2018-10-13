<?php include './K_header.php'; ?>
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
                                                include './konekDb.php';
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
                                    <tr><td></td><td></td><td><button type="submit" class="btn btn-info">Cari</button></td></tr> 
                                </table>
                            </form>
                            <?php
                            if (isset($_POST['instansi'])) {
                                $sql = "SELECT jur.nama_jurusan, peng.nama, per.tahun_akademik, per.semester_akademik, 
                                            per.A1, per.A2, per.A3, per.A4, per.A5, per.A6, per.A7, per.A8, per.A9, per.A10
                                            FROM tbl_s_administrasi per
                                            JOIN tbl_jurusan jur ON jur.id_jurusan = per.id_jurusan
                                            JOIN tbl_pengajar peng ON per.nip = peng.nip 
                                            WHERE jur.id_jurusan =  '" . $_POST['instansi'] . "'"
                                        . "AND peng.nip =  '" . $_POST['pengajar'] . "'"
                                        . "AND tahun_akademik =  '" . $_POST['tahun'] . "'"
                                        . "AND semester_akademik =  '" . $_POST['semester'] . "';";
                                $result = $mysqli->query($sql);
                                $hasil = '';
                                $hasil .= '<h3>DATA DARI RESPONDEN</h3><div style="overflow-x:scroll;">'
                                        . '<table border="1" class="table table-bordered table-hover">'
                                        . '<tr>
                                                <th> NO </th>
                                                <th> Nama Jurusan </th>
                                                <th> Nama Pengajar </th>
                                                <th> Tahun Akademik</th>
                                                <th> Semester Akademik</th>
                                                <th> A1</th>
                                                <th> A2</th>
                                                <th> A3</th>
                                                <th> A4</th>
                                                <th> A5</th>
                                                <th> A6</th>
                                                <th> A7</th>
                                                <th> A8</th>
                                                <th> A9</th>
                                                <th> A10</th></tr>';
                                $no = 0;
                                while ($baris = $result->fetch_assoc()) {
                                    $hasil .= '<tr><td>' . $no = $no + 1 .
                                            '</td><td>' . $baris['nama_jurusan'] .
                                            '</td><td>' . $baris['nama'] .
                                            '</td><td>' . $baris['tahun_akademik'] .
                                            '</td><td>' . $baris['semester_akademik'] .
                                            '</td><td>' . $baris['A1'] .
                                            '</td><td>' . $baris['A2'] .
                                            '</td><td>' . $baris['A3'] .
                                            '</td><td>' . $baris['A4'] .
                                            '</td><td>' . $baris['A5'] .
                                            '</td><td>' . $baris['A6'] .
                                            '</td><td>' . $baris['A7'] .
                                            '</td><td>' . $baris['A8'] .
                                            '</td><td>' . $baris['A9'] .
                                            '</td><td>' . $baris['A10'];
                                    $hasil .= '</td></tr>';
                                } $hasil.='</table></div>';
                                echo $hasil;
                                $sql = "SELECT jur.nama_jurusan, peng.nama, per.tahun_akademik, per.semester_akademik, SUM(per.A1) as A1, SUM(per.A2) as A2, SUM(per.A3) as A3, SUM(per.A4) as A4, SUM(per.A5) as A5, SUM(per.A6) as A6, SUM(per.A7) as A7, SUM(per.A8) as A8, SUM(per.A9) as A9, SUM(per.A10) as A10
                                            FROM tbl_s_administrasi per
                                            JOIN tbl_jurusan jur ON jur.id_jurusan = per.id_jurusan
                                            JOIN tbl_pengajar peng ON per.nip = peng.nip
                                            WHERE jur.id_jurusan =  '" . $_POST['instansi'] . "'"
                                        . "AND peng.nip =  '" . $_POST['pengajar'] . "'"
                                        . "AND tahun_akademik =  '" . $_POST['tahun'] . "'"
                                        . "AND semester_akademik =  '" . $_POST['semester'] . "';";
                                $result = $mysqli->query($sql);
                                $hasil2 = '';
                                $hasil2 .= '<br/><br/><h3>REKAPITULASI DATA</h3><div style="overflow-x:scroll;">'
                                        . '<table class="table table-striped">'
                                        . '<tr>
                                                <th></th>    
                                                <th> A1</th>
                                                <th> A2</th>
                                                <th> A3</th>
                                                <th> A4</th>
                                                <th> A5</th>
                                                <th> A6</th>
                                                <th> A7</th>
                                                <th> A8</th>
                                                <th> A9</th>
                                                <th> A10</th></tr>';
                                while ($baris2 = $result->fetch_assoc()) {
                                    $hasil2 .= '<tr><td>Total'
                                            . '</td><td>' . $baris2['A1'] .
                                            '</td><td>' . $baris2['A2'] .
                                            '</td><td>' . $baris2['A3'] .
                                            '</td><td>' . $baris2['A4'] .
                                            '</td><td>' . $baris2['A5'] .
                                            '</td><td>' . $baris2['A6'] .
                                            '</td><td>' . $baris2['A7'] .
                                            '</td><td>' . $baris2['A8'] .
                                            '</td><td>' . $baris2['A9'] .
                                            '</td><td>' . $baris2['A10'];
                                    $hasil2 .= '</td></tr>';
                                }
                                echo $hasil2;
                                $sql = "SELECT jur.nama_jurusan, peng.nama, per.tahun_akademik, per.semester_akademik, COUNT(per.A1) as A1, COUNT(per.A2) as A2, COUNT(per.A3) as A3, COUNT(per.A4) as A4, COUNT(per.A5) as A5, COUNT(per.A6) as A6, COUNT(per.A7) as A7, COUNT(per.A8) as A8, COUNT(per.A9) as A9, COUNT(per.A10) as A10
                                            FROM tbl_s_administrasi per
                                            JOIN tbl_jurusan jur ON jur.id_jurusan = per.id_jurusan
                                            JOIN tbl_pengajar peng ON per.nip = peng.nip
                                            WHERE jur.id_jurusan =  '" . $_POST['instansi'] . "'"
                                        . "AND peng.nip =  '" . $_POST['pengajar'] . "'"
                                        . "AND tahun_akademik =  '" . $_POST['tahun'] . "'"
                                        . "AND semester_akademik =  '" . $_POST['semester'] . "';";
                                $result = $mysqli->query($sql);
                                while ($baris3 = $result->fetch_assoc()) {
                                    $hasil3 .= '<tr><td>Total Questioner'
                                            . '</td><td>' . $baris3['A1'] .
                                            '</td><td>' . $baris3['A2'] .
                                            '</td><td>' . $baris3['A3'] .
                                            '</td><td>' . $baris3['A4'] .
                                            '</td><td>' . $baris3['A5'] .
                                            '</td><td>' . $baris3['A6'] .
                                            '</td><td>' . $baris3['A7'] .
                                            '</td><td>' . $baris3['A8'] .
                                            '</td><td>' . $baris3['A9'] .
                                            '</td><td>' . $baris3['A10'];
                                    $hasil3 .= '</td></tr>';
                                }
                                echo $hasil3;
                                $sql = "SELECT jur.nama_jurusan, peng.nama, per.tahun_akademik, per.semester_akademik, AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4, AVG(per.A5) as A5, AVG(per.A6) as A6, AVG(per.A7) as A7, AVG(per.A8) as A8, AVG(per.A9) as A9, AVG(per.A10) as A10
                                            FROM tbl_s_administrasi per
                                            JOIN tbl_jurusan jur ON jur.id_jurusan = per.id_jurusan
                                            JOIN tbl_pengajar peng ON per.nip = peng.nip
                                            WHERE jur.id_jurusan =  '" . $_POST['instansi'] . "'"
                                        . "AND peng.nip =  '" . $_POST['pengajar'] . "'"
                                        . "AND tahun_akademik =  '" . $_POST['tahun'] . "'"
                                        . "AND semester_akademik =  '" . $_POST['semester'] . "';";
                                $result = $mysqli->query($sql);
                                while ($baris4 = $result->fetch_assoc()) {
                                    $hasil4 .= '<tr><td>Rata-Rata'
                                            . '</td><td>' . number_format($baris4 ['A1'], 2) .
                                            '</td><td>' . number_format($baris4['A2'], 2) .
                                            '</td><td>' . number_format($baris4['A3'], 2) .
                                            '</td><td>' . number_format($baris4['A4'], 2) .
                                            '</td><td>' . number_format($baris4['A5'], 2) .
                                            '</td><td>' . number_format($baris4['A6'], 2) .
                                            '</td><td>' . number_format($baris4['A7'], 2) .
                                            '</td><td>' . number_format($baris4['A8'], 2) .
                                            '</td><td>' . number_format($baris4['A9'], 2) .
                                            '</td><td>' . number_format($baris4['A10'], 2);
                                    $hasil4 .= '</td></tr></table></div>';
                                    $rata = ($baris4['A1'] + $baris4['A2'] + $baris4['A3'] + $baris4['A4'] + $baris4['A5'] + $baris4['A6'] + $baris4['A7'] + $baris4['A8'] + $baris4['A9'] + $baris4['A10']) / 10;
                                }
                                echo $hasil4;
                            }
                            $sql = "SELECT AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4, AVG(per.A5) as A5, AVG(per.A6) as A6, AVG(per.A7) as A7, AVG(per.A8) as A8, AVG(per.A9) as A9, AVG(per.A10) as A10
                                            FROM tbl_s_administrasi per
                                            JOIN tbl_jurusan jur ON jur.id_jurusan = per.id_jurusan
                                            JOIN tbl_pengajar peng ON per.nip = peng.nip
                                            WHERE tahun_akademik =  '" . $_POST['tahun'] . "'"
                                    . "AND semester_akademik =  '" . $_POST['semester'] . "';";
                            $result = $mysqli->query($sql);
                            while ($baris9 = $result->fetch_assoc()) {
                                number_format($baris9 ['A1'], 2);
                                number_format($baris9 ['A2'], 2);
                                number_format($baris9 ['A3'], 2);
                                number_format($baris9 ['A4'], 2);
                                number_format($baris9 ['A5'], 2);
                                number_format($baris9 ['A6'], 2);
                                number_format($baris9 ['A7'], 2);
                                number_format($baris9 ['A8'], 2);
                                number_format($baris9 ['A9'], 2);
                                number_format($baris9 ['A10'], 2);
                                $rata10 = ($baris9['A1'] + $baris9['A2'] + $baris9['A3'] + $baris9['A4'] + $baris9['A5'] + $baris9['A6'] + $baris9['A7'] + $baris9['A8'] + $baris9['A9'] + $baris9['A10']) / 10;
                            }
                            ?><br/><br/>
                            <h3>KESIMPULAN</h3>
                            <table class="table table-striped">
                                <tr>
                                    <td>Rata-Rata</td>
                                    <td><?php echo number_format($rata, 2) ?></td>
                                </tr>
                                <tr style="color: ">
                                    <td>Standard Nilai Rata-Rata Administrasi</td>
                                    <td><?php echo number_format($rata10, 2) ?></td>
                                </tr>
                                <tr>
                                    <td>Kinerja Guru</td>
                                    <td><?php
                                        if ($rata > 4.50) {
                                            echo "<h2>EXCELLENT PERFORMANCE</h2>";
                                        } else if ($rata >= 4.00) {
                                            echo "<h2>VERY GOOD PERFORMANCE</h2>";
                                        } else if ($rata >= 3.50) {
                                            echo "<h2>GOOD PERFORMANCE<h2>";
                                        } else if ($rata > 3.00) {
                                            echo "<h2 style='color: gold'>FAIR PERFORMANCE<h2>";
                                        } else if ($rata >= 2.50) {
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