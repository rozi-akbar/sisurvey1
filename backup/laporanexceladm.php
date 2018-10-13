<?php
//Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
$namafile = "hasil_rekapitulasi";
header("Content-Disposition: attachment; filename=" . $namafile . ".xls");

include '../config/konekDb.php';
// main
$sqladm = "SELECT AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4, AVG(per.A5) as A5, AVG(per.A6) as A6, AVG(per.A7) as A7, AVG(per.A8) as A8, AVG(per.A9) as A9, AVG(per.A10) as A10
            FROM tbl_s_administrasi per
            JOIN tbl_jurusan jur ON jur.id_jurusan = per.id_jurusan
            JOIN tbl_pengajar peng ON per.nip = peng.nip
            WHERE jur.id_jurusan =  '" . $_POST['instansi'] . "'"
        . "AND peng.nip =  '" . $_POST['pengajar'] . "'"
        . "AND tahun_akademik =  '" . $_POST['tahun'] . "'"
        . "AND semester_akademik =  '" . $_POST['semester'] . "';";
$result = $mysqli->query($sqladm);
while ($baris = $result->fetch_assoc()) {
    $hasil31 = $baris ['namjur'];
    $hasil32 = $baris ['nampeng'];
    $hasil33 = $baris ['nip'];
    $rata = ($baris['A1'] + $baris['A2'] + $baris['A3'] + $baris['A4'] + $baris['A5'] + $baris['A6'] + $baris['A7'] + $baris['A8'] + $baris['A9'] + $baris['A10']) / 10;
    $rtA = number_format($rata, 2);
}

$sqladm2 = "SELECT AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4, AVG(per.A5) as A5, AVG(per.A6) as A6, AVG(per.A7) as A7, AVG(per.A8) as A8, AVG(per.A9) as A9, AVG(per.A10) as A10
            FROM tbl_pertanyaan per
            JOIN tbl_jurusan jur ON jur.id_jurusan = per.id_jurusan
            JOIN tbl_pengajar peng ON per.nip = peng.nip
            WHERE tahun_akademik =  '" . $_POST['tahun'] . "'"
        . "AND semester_akademik =  '" . $_POST['semester'] . "';";
$result = $mysqli->query($sqladm2);
while ($baris2 = $result->fetch_assoc()) {
    $rata2 = ($baris2['A1'] + $baris2['A2'] + $baris2['A3'] + $baris2['A4'] + $baris2['A5'] + $baris2['A6'] + $baris2['A7'] + $baris2['A8'] + $baris2['A9'] + $baris2['A10']) / 10;
    $rtA2 = number_format($rata2, 2);
}

$sqlper = "SELECT jur.nama_jurusan, peng.nama, per.tahun_akademik, per.semester_akademik, AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4, AVG(per.A5) as A5, AVG(per.A6) as A6,
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
        . "AND semester_akademik =  '" . $_POST['semester'] . "';";
$result = $mysqli->query($sqlper);
while ($baris4 = $result->fetch_assoc()) {
    $rata = ($baris4['A1'] + $baris4['A2'] + $baris4['A3'] + $baris4['A4'] + $baris4['A5'] + $baris4['A6'] +
            $baris4['B1'] + $baris4['B2'] + $baris4['B3'] + $baris4['B4'] +
            $baris4['C1'] + $baris4['C2'] + $baris4['C3'] + $baris4['C4'] + $baris4['C5'] + $baris4['C6'] + $baris4['C7'] +
            $baris4['D1'] + $baris4['D2'] + $baris4['D3'] + $baris4['D4'] +
            $baris4['E1'] + $baris4['E2'] + $baris4['E3'] + $baris4['E4'] + $baris4['E5'] + $baris4['E6'] + $baris4['E7'] + $baris4['E8'] + $baris4['E9'] + $baris4['E10'] + $baris4['E11'] + $baris4['E12'] + $baris4['E13'] +
            $baris4['F1'] + $baris4['F2'] + $baris4['F3'] + $baris4['F4'] + $baris4['F5'] + $baris4['F6']) / 40;
    $rtPer = number_format($rata, 2);
}

$sqlper2 = "SELECT AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4, AVG(per.A5) as A5, AVG(per.A6) as A6,
        AVG(per.B1) as B1, AVG(per.B2) as B2, AVG(per.B3) as B3, AVG(per.B4) as B4,
        AVG(per.C1) as C1, AVG(per.C2) as C2, AVG(per.C3) as C3, AVG(per.C4) as C4, AVG(per.C5) as C5, AVG(per.C6) as C6, AVG(per.C7) as C7,
        AVG(per.D1) as D1, AVG(per.D2) as D2, AVG(per.D3) as D3, AVG(per.D4) as D4,
        AVG(per.E1) as E1, AVG(per.E2) as E2, AVG(per.E3) as E3, AVG(per.E4) as E4, AVG(per.E5) as E5, AVG(per.E6) as E6, AVG(per.E7) as E7, AVG(per.E8) as E8, AVG(per.E9) as E9, AVG(per.E10) as E10, AVG(per.E11) as E11, AVG(per.E12) as E12, AVG(per.E13) as E13,
        AVG(per.F1) as F1, AVG(per.F2) as F2, AVG(per.F3) as F3, AVG(per.F4) as F4, AVG(per.F5) as F5, AVG(per.F6) as F6
        FROM tbl_rekap_survey per
        JOIN tbl_jurusan jur ON jur.id_jurusan = per.id_jurusan
        JOIN tbl_pengajar peng ON per.nip = peng.nip
        WHERE tahun_akademik =  '" . $_POST['tahun'] . "'"
        . "AND semester_akademik =  '" . $_POST['semester'] . "';";
$result = $mysqli->query($sqlper2);
while ($baris9 = $result->fetch_assoc()) {
    $rata10 = ($baris9['A1'] + $baris9['A2'] + $baris9['A3'] + $baris9['A4'] + $baris9['A5'] + $baris9['A6'] +
            $baris9['B1'] + $baris9['B2'] + $baris9['B3'] + $baris9['B4'] +
            $baris9['C1'] + $baris9['C2'] + $baris9['C3'] + $baris9['C4'] + $baris9['C5'] + $baris9['C6'] + $baris9['C7'] +
            $baris9['D1'] + $baris9['D2'] + $baris9['D3'] + $baris9['D4'] +
            $baris9['E1'] + $baris9['E2'] + $baris9['E3'] + $baris9['E4'] + $baris9['E5'] + $baris9['E6'] + $baris9['E7'] + $baris9['E8'] + $baris9['E9'] + $baris9['E10'] + $baris9['E11'] + $baris9['E12'] + $baris9['E13'] +
            $baris9['F1'] + $baris9['F2'] + $baris9['F3'] + $baris9['F4'] + $baris9['F5'] + $baris9['F6']) / 40;
    $rtPer2 = number_format($rata10, 2);
}

$sqlPel = "SELECT jur.nama_jurusan, peng.nama, per.tahun_akademik, per.semester_akademik, AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4,
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
$result = $mysqli->query($sqlPel);
while ($baris4 = $result->fetch_assoc()) {
    $rata = ($baris4['A1'] + $baris4['A2'] + $baris4['A3'] + $baris4['A4'] + $baris4['A5'] + $baris4['A6'] + $baris4['A7'] + $baris4['A8'] + $baris4['A9'] + $baris4['A10'] +
            $baris4['B1'] + $baris4['B2'] + $baris4['B3'] + $baris4['B4'] + $baris4['B5'] + $baris4['B6'] + $baris4['B7'] + $baris4['B8'] +
            $baris4['C1'] + $baris4['C2'] + $baris4['C3'] + $baris4['C4'] + $baris4['C5'] + $baris4['C6'] +
            $baris4['D1'] + $baris4['D2'] + $baris4['D3'] + $baris4['D4'] + $baris4['D5'] + $baris4['D6']) / 42;
    $rtPel = number_format($rata, 2);
}

$sqlPel2 = "SELECT AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4,
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
$result = $mysqli->query($sqlPel2);
while ($baris9 = $result->fetch_assoc()) {
    $rata10 = ($baris9['A1'] + $baris9['A2'] + $baris9['A3'] + $baris9['A4'] + $baris9['A5'] + $baris9['A6'] + $baris9['A7'] + $baris9['A8'] + $baris9['A9'] + $baris9['A10']) / 10;
    $rtPel2 = number_format($rata10, 2);
}

$sqlev = "SELECT jur.nama_jurusan, peng.nama, per.tahun_akademik, per.semester_akademik, AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4, AVG(per.A5) as A5, AVG(per.A6) as A6, AVG(per.A7) as A7, AVG(per.A8) as A8, AVG(per.A9) as A9, AVG(per.A10) as A10
                                            FROM tbl_s_evaluasi per
                                            JOIN tbl_jurusan jur ON jur.id_jurusan = per.id_jurusan
                                            JOIN tbl_pengajar peng ON per.nip = peng.nip
                                            WHERE jur.id_jurusan =  '" . $_POST['instansi'] . "'"
        . "AND peng.nip =  '" . $_POST['pengajar'] . "'"
        . "AND tahun_akademik =  '" . $_POST['tahun'] . "'"
        . "AND semester_akademik =  '" . $_POST['semester'] . "';";
$result = $mysqli->query($sqlev);
while ($baris4 = $result->fetch_assoc()) {
    $rata3 = ($baris4['A1'] + $baris4['A2'] + $baris4['A3'] + $baris4['A4'] + $baris4['A5'] + $baris4['A6'] + $baris4['A7'] + $baris4['A8'] + $baris4['A9'] + $baris4['A10']) / 10;
    $rtE = number_format($rata3, 2);
}

$sqlev2 = "SELECT AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4, AVG(per.A5) as A5, AVG(per.A6) as A6, AVG(per.A7) as A7, AVG(per.A8) as A8, AVG(per.A9) as A9, AVG(per.A10) as A10
                                            FROM tbl_s_evaluasi per
                                            JOIN tbl_jurusan jur ON jur.id_jurusan = per.id_jurusan
                                            JOIN tbl_pengajar peng ON per.nip = peng.nip
                                            WHERE tahun_akademik =  '" . $_POST['tahun'] . "'"
        . "AND semester_akademik =  '" . $_POST['semester'] . "';";
$result = $mysqli->query($sqlev2);
while ($baris9 = $result->fetch_assoc()) {
    $rata10 = ($baris9['A1'] + $baris9['A2'] + $baris9['A3'] + $baris9['A4'] + $baris9['A5'] + $baris9['A6'] + $baris9['A7'] + $baris9['A8'] + $baris9['A9'] + $baris9['A10']) / 10;
    $reE2 = number_format($rata10, 2);
}
?>

<table>
    <tr>
        <th ></th>
        <th>EVALUASI KINERJA GURU ASPEK PENDIDIKAN DAN PENGAJARAN</th>
        <th></th>
    </tr>
    <tr>
        <th></th>
        <th align = "center">PONDOK PESANTREN ZAINUL HASAN GENGGONG</th>
        <th></th>
    </tr>
</table>
<table>
    <tr>
        <th align="left">Nama :</th>
        <th align="left"><?php echo $hasil32; ?></th>
    </tr>
    <tr>
        <th align="left">NIP :</th>
        <th align="left"><?php echo $hasil33; ?></th>
    </tr>
    <tr>
        <th align="left">Jurusan :</th>
        <th align="left"><?php echo $hasil31; ?></th>
    </tr>
</table>
<table border="1">
    <tr>
        <th style="width: 40px">No</th>
        <th align = "center" style="width: 650px">Aspek yang dinilai</th>
        <th style="width: 60px">SKOR</th>
        <th style="width: 60px">Pembanding</th>
    </tr>
    <tr>
        <td align="center" colspan="2" style="text-align: left; font-style: oblique">A. Kompetensi Pedagogik</td>
        <td align="center"></td>
    </tr>
    <tr>
        <td align="center">1.</td>
        <td>Rata-Rata Nilai Administrasi</td>
        <td align="center"><?php echo $rtA ?></td>
        <td align="center"><?php echo $rtA2 ?></td>
    </tr>
    <tr>
        <td align="center">2.</td>
        <td>Rata-Rata Nilai Perencanaan</td>
        <td align="center"><?php echo $rtPer ?></td>
        <td align="center"><?php echo $rtPer2 ?></td>
    </tr>
    <tr>
        <td align="center">3.</td>
        <td>Rata-Rata Nilai Pelaksanaan</td>
        <td align="center"><?php echo $rtPel ?></td>
        <td align="center"><?php echo $rtPel2 ?></td>
    </tr>
    <tr>
        <td align="center">4.</td>
        <td>Rata-Rata Nilai Evaluasi</td>
        <td align="center"><?php echo $rtE ?></td>
        <td align="center"><?php echo $rtE2 ?></td>
    </tr>
    <tr>
        <td></td>
        <td style="">Rata-Rata Keseluruhan</td>
        <td align="center"><?php echo $rt ?></td>
        <td align="center"><?php echo $rt2 ?></td>
    </tr>
    <?php $rttotal = ($rtA+$rtPer+$rtPel+$rtE)/4 ;?>
</table>
<table>
    <tr>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
<table>
    <tr>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
<table class="table table-striped">
    <tr>
        <td></td>
        <td>Nilai Setelah di Rata-Rata Administrasi</td>
        <td><?php echo $rttotal ?></td>
    </tr>
    <tr>
        <td></td>
        <td>Kinerja Guru</td>
        <td><?php
            if ($rata > 4.50) {
                echo "EXCELLENT PERFORMANCE";
            } else if ($rata >= 4.00) {
                echo "VERY GOOD PERFORMANCE";
            } else if ($rata >= 3.50) {
                echo "GOOD PERFORMANCE";
            } else if ($rata > 3.00) {
                echo "<a style='color:darkorange'>FAIR PERFORMANCE</a>";
            } else if ($rata >= 2.50) {
                echo "<a style='color:tomato'>POOR PERFORMANCE</a>";
            } else {
                echo "<a style='color:tomato'>VERY POOR PERFORMANCE</a>";
            }
            ?></td>
    </tr>
</table>
<table>
    <tr>
        <td>Keterangan : *)</td>
        <td>EXCELLENT PERFORMANCE</td>
        <td></td>
    </tr>
    <tr>
        <td>></td>
        <td>VERY GOOD PEDFORMANCE</td>
        <td></td>
    </tr>
    <tr>
        <td>>=</td>
        <td>GOOD PERFORMANCE</td>
        <td></td>
    </tr>>
    <tr>
        <td>>=</td>
        <td>FAIR PERFORMANCE</td>
        <td></td>
    </tr>>
    <tr>
        <td>>=</td>
        <td>POOR PERFORMANCE</td>
        <td></td>
    </tr>>
    <tr>
        <td><</td>
        <td>VERY POOR PERFORMANCE</td>
        <td></td>
    </tr>>
</table>