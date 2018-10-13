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
                                                for ($i = date('Y'); $i >= date('Y') - 1; $i-=1) {
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
                                $sql = "SELECT jur.nama_jurusan, peng.nama, per.tahun_akademik, per.semester_akademik, per.A1, per.A2, per.A3, per.A4, 
                                            per.B1, per.B2, 
                                            per.C1, per.C2, per.C3, per.C4, per.C5, per.C6, per.C7, per.C8, per.C9, per.C10, per.C11, per.C12, per.C13, per.C14, per.C15, per.C16, per.C17, per.C18, per.C19, per.C20, per.C21, per.C22, per.C23, 
                                            per.D1, per.D2, per.D3, per.D4, per.D5,
                                            per.E1, per.E2, per.E3,
                                            per.F1, per.F2, per.F3, per.F4, per.F5
                                            FROM tbl_s_pelaksanaan per
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
                                                <th> B1</th>
                                                <th> B2</th>
                                                <th> C1</th>
                                                <th> C2</th>
                                                <th> C3</th>
                                                <th> C4</th>
                                                <th> C5</th>
                                                <th> C6</th>
                                                <th> C7</th>
                                                <th> C8</th>
                                                <th> C9</th>
                                                <th> C10</th>
                                                <th> C11</th>
                                                <th> C12</th>
                                                <th> C13</th>
                                                <th> C14</th>
                                                <th> C15</th>
                                                <th> C16</th>
                                                <th> C17</th>
                                                <th> C18</th>
                                                <th> C19</th>
                                                <th> C20</th>
                                                <th> C21</th>
                                                <th> C22</th>
                                                <th> C23</th>
                                                <th> D1</th>
                                                <th> D2</th>
                                                <th> D3</th>
                                                <th> D4</th>
                                                <th> D5</th>
                                                <th> E1</th>
                                                <th> E2</th>
                                                <th> E3</th>
                                                <th> F1</th>
                                                <th> F2</th>
                                                <th> F3</th>
                                                <th> F4</th>
                                                <th> F5</th></tr>';
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
                                            '</td><td>' . $baris['B1'] .
                                            '</td><td>' . $baris['B2'] .
                                            '</td><td>' . $baris['C1'] .
                                            '</td><td>' . $baris['C2'] .
                                            '</td><td>' . $baris['C3'] .
                                            '</td><td>' . $baris['C4'] .
                                            '</td><td>' . $baris['C5'] .
                                            '</td><td>' . $baris['C6'] .
                                            '</td><td>' . $baris['C7'] .
                                            '</td><td>' . $baris['C8'] .
                                            '</td><td>' . $baris['C9'] .
                                            '</td><td>' . $baris['C10'] .
                                            '</td><td>' . $baris['C11'] .
                                            '</td><td>' . $baris['C12'] .
                                            '</td><td>' . $baris['C13'] .
                                            '</td><td>' . $baris['C14'] .
                                            '</td><td>' . $baris['C15'] .
                                            '</td><td>' . $baris['C16'] .
                                            '</td><td>' . $baris['C17'] .
                                            '</td><td>' . $baris['C18'] .
                                            '</td><td>' . $baris['C19'] .
                                            '</td><td>' . $baris['C20'] .
                                            '</td><td>' . $baris['C21'] .
                                            '</td><td>' . $baris['C22'] .
                                            '</td><td>' . $baris['C23'] .
                                            '</td><td>' . $baris['D1'] .
                                            '</td><td>' . $baris['D2'] .
                                            '</td><td>' . $baris['D3'] .
                                            '</td><td>' . $baris['D4'] .
                                            '</td><td>' . $baris['D5'] .
                                            '</td><td>' . $baris['E1'] .
                                            '</td><td>' . $baris['E2'] .
                                            '</td><td>' . $baris['E3'] .
                                            '</td><td>' . $baris['F1'] .
                                            '</td><td>' . $baris['F2'] .
                                            '</td><td>' . $baris['F3'] .
                                            '</td><td>' . $baris['F4'] .
                                            '</td><td>' . $baris['F5'];
                                    $hasil .= '</td></tr>';
                                } $hasil.='</table></div>';
                                echo $hasil;
                                $sql = "SELECT jur.nama_jurusan, peng.nama, per.tahun_akademik, per.semester_akademik, SUM(per.A1) as A1, SUM(per.A2) as A2, SUM(per.A3) as A3, SUM(per.A4) as A4,
                                            SUM(per.B1) as B1, SUM(per.B2) as B2,
                                            SUM(per.C1) as C1, SUM(per.C2) as C2, SUM(per.C3) as C3, SUM(per.C4) as C4, SUM(per.C5) as C5, SUM(per.C6) as C6, SUM(per.C7) as C7, SUM(per.C8) as C8, SUM(per.C9) as C9, SUM(per.C10) as C10, SUM(per.C11) as C11, SUM(per.C12) as C12, SUM(per.C13) as C13, SUM(per.C14) as C14, SUM(per.C15) as C15, SUM(per.C16) as C16, SUM(per.C17) as C17, SUM(per.C18) as C18, SUM(per.C19) as C19, SUM(per.C20) as C20, SUM(per.C21) as C21, SUM(per.C22) as C22, SUM(per.C23) as C23,
                                            SUM(per.D1) as D1, SUM(per.D2) as D2, SUM(per.D3) as D3, SUM(per.D4) as D4, SUM(per.D5) as D5,
                                            SUM(per.E1) as E1, SUM(per.E2) as E2, SUM(per.E3) as E3,
                                            SUM(per.F1) as F1, SUM(per.F2) as F2, SUM(per.F3) as F3, SUM(per.F4) as F4, SUM(per.F5) as F5
                                            FROM tbl_s_pelaksanaan per
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
                                                <th> B1</th>
                                                <th> B2</th>
                                                <th> C1</th>
                                                <th> C2</th>
                                                <th> C3</th>
                                                <th> C4</th>
                                                <th> C5</th>
                                                <th> C6</th>
                                                <th> C7</th>
                                                <th> C8</th>
                                                <th> C9</th>
                                                <th> C10</th>
                                                <th> C11</th>
                                                <th> C12</th>
                                                <th> C13</th>
                                                <th> C14</th>
                                                <th> C15</th>
                                                <th> C16</th>
                                                <th> C17</th>
                                                <th> C18</th>
                                                <th> C19</th>
                                                <th> C20</th>
                                                <th> C21</th>
                                                <th> C22</th>
                                                <th> C23</th>
                                                <th> D1</th>
                                                <th> D2</th>
                                                <th> D3</th>
                                                <th> D4</th>
                                                <th> D5</th>
                                                <th> E1</th>
                                                <th> E2</th>
                                                <th> E3</th>
                                                <th> F1</th>
                                                <th> F2</th>
                                                <th> F3</th>
                                                <th> F4</th>
                                                <th> F5</th></tr>';
                                while ($baris2 = $result->fetch_assoc()) {
                                    $hasil2 .= '<tr><td>Total'
                                            . '</td><td>' . $baris2['A1'] .
                                            '</td><td>' . $baris2['A2'] .
                                            '</td><td>' . $baris2['A3'] .
                                            '</td><td>' . $baris2['A4'] .
                                            '</td><td>' . $baris2['B1'] .
                                            '</td><td>' . $baris2['B2'] .
                                            '</td><td>' . $baris2['C1'] .
                                            '</td><td>' . $baris2['C2'] .
                                            '</td><td>' . $baris2['C3'] .
                                            '</td><td>' . $baris2['C4'] .
                                            '</td><td>' . $baris2['C5'] .
                                            '</td><td>' . $baris2['C6'] .
                                            '</td><td>' . $baris2['C7'] .
                                            '</td><td>' . $baris2['C8'] .
                                            '</td><td>' . $baris2['C9'] .
                                            '</td><td>' . $baris2['C10'] .
                                            '</td><td>' . $baris2['C11'] .
                                            '</td><td>' . $baris2['C12'] .
                                            '</td><td>' . $baris2['C13'] .
                                            '</td><td>' . $baris2['C14'] .
                                            '</td><td>' . $baris2['C15'] .
                                            '</td><td>' . $baris2['C16'] .
                                            '</td><td>' . $baris2['C17'] .
                                            '</td><td>' . $baris2['C18'] .
                                            '</td><td>' . $baris2['C19'] .
                                            '</td><td>' . $baris2['C20'] .
                                            '</td><td>' . $baris2['C21'] .
                                            '</td><td>' . $baris2['C22'] .
                                            '</td><td>' . $baris2['C23'] .
                                            '</td><td>' . $baris2['D1'] .
                                            '</td><td>' . $baris2['D2'] .
                                            '</td><td>' . $baris2['D3'] .
                                            '</td><td>' . $baris2['D4'] .
                                            '</td><td>' . $baris2['D5'] .
                                            '</td><td>' . $baris2['E1'] .
                                            '</td><td>' . $baris2['E2'] .
                                            '</td><td>' . $baris2['E3'] .
                                            '</td><td>' . $baris2['F1'] .
                                            '</td><td>' . $baris2['F2'] .
                                            '</td><td>' . $baris2['F3'] .
                                            '</td><td>' . $baris2['F4'] .
                                            '</td><td>' . $baris2['F5'];
                                    $hasil2 .= '</td></tr>';
                                }
                                echo $hasil2;
                                $sql = "SELECT jur.nama_jurusan, peng.nama, per.tahun_akademik, per.semester_akademik, COUNT(per.A1) as A1, COUNT(per.A2) as A2, COUNT(per.A3) as A3, COUNT(per.A4) as A4,
                                            COUNT(per.B1) as B1, COUNT(per.B2) as B2,
                                            COUNT(per.C1) as C1, COUNT(per.C2) as C2, COUNT(per.C3) as C3, COUNT(per.C4) as C4, COUNT(per.C5) as C5, COUNT(per.C6) as C6, COUNT(per.C7) as C7, COUNT(per.C8) as C8, COUNT(per.C9) as C9, COUNT(per.C10) as C10, COUNT(per.C11) as C11, COUNT(per.C12) as C12, COUNT(per.C13) as C13, COUNT(per.C14) as C14, COUNT(per.C15) as C15, COUNT(per.C16) as C16, COUNT(per.C17) as C17, COUNT(per.C18) as C18, COUNT(per.C19) as C19, COUNT(per.C20) as C20, COUNT(per.C21) as C21, COUNT(per.C22) as C22, COUNT(per.C23) as C23,
                                            COUNT(per.D1) as D1, COUNT(per.D2) as D2, COUNT(per.D3) as D3, COUNT(per.D4) as D4, COUNT(per.D5) as D5,
                                            COUNT(per.E1) as E1, COUNT(per.E2) as E2, COUNT(per.E3) as E3,
                                            COUNT(per.F1) as F1, COUNT(per.F2) as F2, COUNT(per.F3) as F3, COUNT(per.F4) as F4, COUNT(per.F5) as F5
                                            FROM tbl_s_pelaksanaan per
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
                                            '</td><td>' . $baris3['B1'] .
                                            '</td><td>' . $baris3['B2'] .
                                            '</td><td>' . $baris3['C1'] .
                                            '</td><td>' . $baris3['C2'] .
                                            '</td><td>' . $baris3['C3'] .
                                            '</td><td>' . $baris3['C4'] .
                                            '</td><td>' . $baris3['C5'] .
                                            '</td><td>' . $baris3['C6'] .
                                            '</td><td>' . $baris3['C7'] .
                                            '</td><td>' . $baris3['C8'] .
                                            '</td><td>' . $baris3['C9'] .
                                            '</td><td>' . $baris3['C10'] .
                                            '</td><td>' . $baris3['C11'] .
                                            '</td><td>' . $baris3['C12'] .
                                            '</td><td>' . $baris3['C13'] .
                                            '</td><td>' . $baris3['C14'] .
                                            '</td><td>' . $baris3['C15'] .
                                            '</td><td>' . $baris3['C16'] .
                                            '</td><td>' . $baris3['C17'] .
                                            '</td><td>' . $baris3['C18'] .
                                            '</td><td>' . $baris3['C19'] .
                                            '</td><td>' . $baris3['C20'] .
                                            '</td><td>' . $baris3['C21'] .
                                            '</td><td>' . $baris3['C22'] .
                                            '</td><td>' . $baris3['C23'] .
                                            '</td><td>' . $baris3['D1'] .
                                            '</td><td>' . $baris3['D2'] .
                                            '</td><td>' . $baris3['D3'] .
                                            '</td><td>' . $baris3['D4'] .
                                            '</td><td>' . $baris3['D5'] .
                                            '</td><td>' . $baris3['E1'] .
                                            '</td><td>' . $baris3['E2'] .
                                            '</td><td>' . $baris3['E3'] .
                                            '</td><td>' . $baris3['F1'] .
                                            '</td><td>' . $baris3['F2'] .
                                            '</td><td>' . $baris3['F3'] .
                                            '</td><td>' . $baris3['F4'] .
                                            '</td><td>' . $baris3['F5'];
                                    $hasil3 .= '</td></tr>';
                                }
                                echo $hasil3;
                                $sql = "SELECT jur.nama_jurusan, peng.nama, per.tahun_akademik, per.semester_akademik, AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4,
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
                                        . "AND semester_akademik =  '" . $_POST['semester'] . "';";
                                $result = $mysqli->query($sql);
                                while ($baris4 = $result->fetch_assoc()) {
                                    $hasil4 .= '<tr><td>Rata-Rata'
                                            . '</td><td>' . number_format($baris4 ['A1'], 2) .
                                            '</td><td>' . number_format($baris4['A2'], 2) .
                                            '</td><td>' . number_format($baris4['A3'], 2) .
                                            '</td><td>' . number_format($baris4['A4'], 2) .
                                            '</td><td>' . number_format($baris4['B1'], 2) .
                                            '</td><td>' . number_format($baris4['B2'], 2) .
                                            '</td><td>' . number_format($baris4['C1'], 2) .
                                            '</td><td>' . number_format($baris4['C2'], 2) .
                                            '</td><td>' . number_format($baris4['C3'], 2) .
                                            '</td><td>' . number_format($baris4['C4'], 2) .
                                            '</td><td>' . number_format($baris4['C5'], 2) .
                                            '</td><td>' . number_format($baris4['C6'], 2) .
                                            '</td><td>' . number_format($baris4['C7'], 2) .
                                            '</td><td>' . number_format($baris4['C8'], 2) .
                                            '</td><td>' . number_format($baris4['C9'], 2) .
                                            '</td><td>' . number_format($baris4['C10'], 2) .
                                            '</td><td>' . number_format($baris4['C11'], 2) .
                                            '</td><td>' . number_format($baris4['C12'], 2) .
                                            '</td><td>' . number_format($baris4['C13'], 2) .
                                            '</td><td>' . number_format($baris4['C14'], 2) .
                                            '</td><td>' . number_format($baris4['C15'], 2) .
                                            '</td><td>' . number_format($baris4['C16'], 2) .
                                            '</td><td>' . number_format($baris4['C17'], 2) .
                                            '</td><td>' . number_format($baris4['C18'], 2) .
                                            '</td><td>' . number_format($baris4['C19'], 2) .
                                            '</td><td>' . number_format($baris4['C20'], 2) .
                                            '</td><td>' . number_format($baris4['C21'], 2) .
                                            '</td><td>' . number_format($baris4['C22'], 2) .
                                            '</td><td>' . number_format($baris4['C23'], 2) .
                                            '</td><td>' . number_format($baris4['D1'], 2) .
                                            '</td><td>' . number_format($baris4['D2'], 2) .
                                            '</td><td>' . number_format($baris4['D3'], 2) .
                                            '</td><td>' . number_format($baris4['D4'], 2) .
                                            '</td><td>' . number_format($baris4['D5'], 2) .
                                            '</td><td>' . number_format($baris4['E1'], 2) .
                                            '</td><td>' . number_format($baris4['E2'], 2) .
                                            '</td><td>' . number_format($baris4['E3'], 2) .
                                            '</td><td>' . number_format($baris4['F1'], 2) .
                                            '</td><td>' . number_format($baris4['F2'], 2) .
                                            '</td><td>' . number_format($baris4['F3'], 2) .
                                            '</td><td>' . number_format($baris4['F4'], 2) .
                                            '</td><td>' . number_format($baris4['F5'], 2);
                                    $hasil4 .= '</td></tr></table></div>';
                                    $rata = ($baris4['A1'] + $baris4['A2'] + $baris4['A3'] + $baris4['A4'] + $baris4['A5'] + $baris4['A6'] + $baris4['A7'] + $baris4['A8'] + $baris4['A9'] + $baris4['A10'] +
                                            $baris4['B1'] + $baris4['B2'] + $baris4['B3'] + $baris4['B4'] + $baris4['B5'] + $baris4['B6'] + $baris4['B7'] + $baris4['B8'] +
                                            $baris4['C1'] + $baris4['C2'] + $baris4['C3'] + $baris4['C4'] + $baris4['C5'] + $baris4['C6'] +
                                            $baris4['D1'] + $baris4['D2'] + $baris4['D3'] + $baris4['D4'] + $baris4['D5'] + $baris4['D6']) / 42;
                                }
                                echo $hasil4;
                            }
                            $sql = "SELECT AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4,
                                            AVG(per.B1) as B1, AVG(per.B2) as B2,
                                            AVG(per.C1) as C1, AVG(per.C2) as C2, AVG(per.C3) as C3, AVG(per.C4) as C4, AVG(per.C5) as C5, AVG(per.C6) as C6, AVG(per.C7) as C7, AVG(per.C8) as C8, AVG(per.C9) as C9, AVG(per.C10) as C10, AVG(per.C11) as C11, AVG(per.C12) as C12, AVG(per.C13) as C13, AVG(per.C14) as C14, AVG(per.C15) as C15, AVG(per.C16) as C16, AVG(per.C17) as C17, AVG(per.C18) as C18, AVG(per.C19) as C19, AVG(per.C20) as C20, AVG(per.C21) as C21, AVG(per.C22) as C22, AVG(per.C23) as C23,
                                            AVG(per.D1) as D1, AVG(per.D2) as D2, AVG(per.D3) as D3, AVG(per.D4) as D4, AVG(per.D5) as D5,
                                            AVG(per.E1) as E1, AVG(per.E2) as E2, AVG(per.E3) as E3,
                                            AVG(per.F1) as F1, AVG(per.F2) as F2, AVG(per.F3) as F3, AVG(per.F4) as F4, AVG(per.F5) as F5
                                            FROM tbl_s_pelaksanaan per
                                            JOIN tbl_jurusan jur ON jur.id_jurusan = per.id_jurusan
                                            JOIN tbl_pengajar peng ON per.nip = peng.nip
                                            WHERE tahun_akademik =  '" . $_POST['tahun'] . "'"
                                    . "AND semester_akademik =  '" . $_POST['semester'] . "';";
                            $result = $mysqli->query($sql);
                            while ($baris9 = $result->fetch_assoc()) {
                                
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
                                    <td>Standard Nilai Rata-Rata Pelaksanaan</td>
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