<?php
//Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

//connect to database
include '../config/konekDb.php';

// Mendefinisikan nama file ekspor "hasil-export.xls"
$namafile = "hasil_rekapitulasi";
header("Content-Disposition: attachment; filename=" . $namafile . ".xls");

// main
$sql = "SELECT jur.nama_jurusan, peng.nama, peng.nip, per.tahun_akademik, per.semester_akademik, AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4, AVG(per.A5) as A5, AVG(per.A6) as A6, AVG(per.A7) as A7, AVG(per.A8) as A8, AVG(per.A9) as A9, AVG(per.A10) as A10,
AVG(per.B1) as B1, AVG(per.B2) as B2, AVG(per.B3) as B3, AVG(per.B4) as B4, AVG(per.B5) as B5, AVG(per.B6) as B6, AVG(per.B7) as B7, AVG(per.B8) as B8,
AVG(per.C1) as C1, AVG(per.C2) as C2, AVG(per.C3) as C3, AVG(per.C4) as C4, AVG(per.C5) as C5, AVG(per.C6) as C6,
AVG(per.D1) as D1, AVG(per.D2) as D2, AVG(per.D3) as D3, AVG(per.D4) as D4, AVG(per.D5) as D5, AVG(per.D6) as D6
FROM tbl_rekap_survey per
JOIN tbl_jurusan jur ON jur.id_jurusan = per.id_jurusan
JOIN tbl_pengajar peng ON per.nip = peng.nip
WHERE per.id_jurusan = '" . $_POST['instansi'] . "'"
        . "AND peng.nip =  '" . $_POST['nip'] . "'"
        . "AND per.tahun_akademik =  '" . $_POST['tahun'] . "'"
        . "AND per.semester_akademik =  '" . $_POST['semester'] . "';";
$result = $mysqli->query($sql);
while ($baris4 = $result->fetch_assoc()) {
    $nama_jurusan = $baris4['nama_jurusan'];
    $nama_pengajar = $baris4['nama'];
    $nip_pengajar = $baris4['nip'];
    $tahun_akademik = $baris4['tahun_akademik'];
    $semester_akademik = $baris4['semester_akademik'];
    $rata = ($baris4['A1'] + $baris4['A2'] + $baris4['A3'] + $baris4['A4'] + $baris4['A5'] + $baris4['A6'] + $baris4['A7'] + $baris4['A8'] + $baris4['A9'] + $baris4['A10'] +
            $baris4['B1'] + $baris4['B2'] + $baris4['B3'] + $baris4['B4'] + $baris4['B5'] + $baris4['B6'] + $baris4['B7'] + $baris4['B8'] +
            $baris4['C1'] + $baris4['C2'] + $baris4['C3'] + $baris4['C4'] + $baris4['C5'] + $baris4['C6'] +
            $baris4['D1'] + $baris4['D2'] + $baris4['D3'] + $baris4['D4'] + $baris4['D5'] + $baris4['D6']) / 30;
    $rtA = number_format($rata, 2);

    $A1 = number_format($baris4 ['A1'], 2);
    $A2 = number_format($baris4 ['A2'], 2);
    $A3 = number_format($baris4 ['A3'], 2);
    $A4 = number_format($baris4 ['A4'], 2);
    $A5 = number_format($baris4 ['A5'], 2);
    $A6 = number_format($baris4 ['A6'], 2);
    $A7 = number_format($baris4 ['A7'], 2);
    $A8 = number_format($baris4 ['A8'], 2);
    $A9 = number_format($baris4 ['A9'], 2);
    $A10 = number_format($baris4 ['A10'], 2);
    $B1 = number_format($baris4 ['B1'], 2);
    $B2 = number_format($baris4 ['B2'], 2);
    $B3 = number_format($baris4 ['B3'], 2);
    $B4 = number_format($baris4 ['B4'], 2);
    $B5 = number_format($baris4 ['B5'], 2);
    $B6 = number_format($baris4 ['B6'], 2);
    $B7 = number_format($baris4 ['B7'], 2);
    $B8 = number_format($baris4 ['B8'], 2);
    $C1 = number_format($baris4 ['C1'], 2);
    $C2 = number_format($baris4 ['C2'], 2);
    $C3 = number_format($baris4 ['C3'], 2);
    $C4 = number_format($baris4 ['C4'], 2);
    $C5 = number_format($baris4 ['C5'], 2);
    $C6 = number_format($baris4 ['C6'], 2);
    $D1 = number_format($baris4 ['D1'], 2);
    $D2 = number_format($baris4 ['D2'], 2);
    $D3 = number_format($baris4 ['D3'], 2);
    $D4 = number_format($baris4 ['D4'], 2);
    $D5 = number_format($baris4 ['D5'], 2);
    $D6 = number_format($baris4 ['D6'], 2);
}
$RKPen = ($A1 + $A2 + $A3 + $A4 + $A5 + $A6 + $A7 + $A8 + $A9 + $A10) / 10;
$RKProf = ($B1 + $B2 + $B3 + $B4 + $B5 + $B6 + $B7 + $B8) / 8;
$RKKep = ($C1 + $C2 + $C3 + $C4 + $C5 + $C6) / 6;
$RKSos = ($D1 + $D2 + $D3 + $D4 + $D5 + $D6) / 6;

$sql2 = "SELECT AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4, AVG(per.A5) as A5, AVG(per.A6) as A6, AVG(per.A7) as A7, AVG(per.A8) as A8, AVG(per.A9) as A9, AVG(per.A10) as A10,
AVG(per.B1) as B1, AVG(per.B2) as B2, AVG(per.B3) as B3, AVG(per.B4) as B4, AVG(per.B5) as B5, AVG(per.B6) as B6, AVG(per.B7) as B7, AVG(per.B8) as B8,
AVG(per.C1) as C1, AVG(per.C2) as C2, AVG(per.C3) as C3, AVG(per.C4) as C4, AVG(per.C5) as C5, AVG(per.C6) as C6,
AVG(per.D1) as D1, AVG(per.D2) as D2, AVG(per.D3) as D3, AVG(per.D4) as D4, AVG(per.D5) as D5, AVG(per.D6) as D6
FROM tbl_rekap_survey per
JOIN tbl_jurusan jur ON jur.id_jurusan = per.id_jurusan
WHERE tahun_akademik =  '" . $_POST['tahun'] . "'"
        . "AND semester_akademik =  '" . $_POST['semester'] . "';";
$result2 = $mysqli->query($sql2);
while ($baris9 = $result2->fetch_assoc()) {
    $rata10 = ($baris9['A1'] + $baris9['A2'] + $baris9['A3'] + $baris9['A4'] + $baris9['A5'] + $baris9['A6'] + $baris9['A7'] + $baris9['A8'] + $baris9['A9'] + $baris9['A10'] +
            $baris9['B1'] + $baris9['B2'] + $baris9['B3'] + $baris9['B4'] + $baris9['B5'] + $baris9['B6'] + $baris9['B7'] + $baris9['B8'] +
            $baris9['C1'] + $baris9['C2'] + $baris9['C3'] + $baris9['C4'] + $baris9['C5'] + $baris9['C6'] +
            $baris9['D1'] + $baris9['D2'] + $baris9['D3'] + $baris9['D4'] + $baris9['D5'] + $baris9['D6']) / 30;
    $rt2 = number_format($rata10, 2);

    $kA1 = number_format($baris9 ['A1'], 2);
    $kA2 = number_format($baris9 ['A2'], 2);
    $kA3 = number_format($baris9 ['A3'], 2);
    $kA4 = number_format($baris9 ['A4'], 2);
    $kA5 = number_format($baris9 ['A5'], 2);
    $kA6 = number_format($baris9 ['A6'], 2);
    $kA7 = number_format($baris9 ['A7'], 2);
    $kA8 = number_format($baris9 ['A8'], 2);
    $kA9 = number_format($baris9 ['A9'], 2);
    $kA10 = number_format($baris9 ['A10'], 2);
    $kB1 = number_format($baris9 ['B1'], 2);
    $kB2 = number_format($baris9 ['B2'], 2);
    $kB3 = number_format($baris9 ['B3'], 2);
    $kB4 = number_format($baris9 ['B4'], 2);
    $kB5 = number_format($baris9 ['B5'], 2);
    $kB6 = number_format($baris9 ['B6'], 2);
    $kB7 = number_format($baris9 ['B7'], 2);
    $kB8 = number_format($baris9 ['B8'], 2);
    $kC1 = number_format($baris9 ['C1'], 2);
    $kC2 = number_format($baris9 ['C2'], 2);
    $kC3 = number_format($baris9 ['C3'], 2);
    $kC4 = number_format($baris9 ['C4'], 2);
    $kC5 = number_format($baris9 ['C5'], 2);
    $kC6 = number_format($baris9 ['C6'], 2);
    $kD1 = number_format($baris9 ['D1'], 2);
    $kD2 = number_format($baris9 ['D2'], 2);
    $kD3 = number_format($baris9 ['D3'], 2);
    $kD4 = number_format($baris9 ['D4'], 2);
    $kD5 = number_format($baris9 ['D5'], 2);
    $kD6 = number_format($baris9 ['D6'], 2);
}
$kRKPen = ($kA1 + $kA2 + $kA3 + $kA4 + $kA5 + $kA6 + $kA7 + $kA8 + $kA9 + $kA10) / 10;
$kRKProf = ($kB1 + $kB2 + $kB3 + $kB4 + $kB5 + $kB6 + $kB7 + $kB8) / 8;
$kRKKep = ($kC1 + $kC2 + $kC3 + $kC4 + $kC5 + $kC6) / 6;
$kRKSos = ($kD1 + $kD2 + $kD3 + $kD4 + $kD5 + $kD6) / 6;
?>

<table>
    <tr>
        <th align="center" colspan="4">EVALUASI KINERJA GURU ASPEK PENDIDIKAN DAN PENGAJARAN</th>
    </tr>
    <tr>
        <th align="center" colspan="4">PONDOK PESANTREN ZAINUL HASAN GENGGONG</th>
    </tr>
</table>
<table>
    <tr></tr>
</table>
<table>
    <tr>
        <th align="left">Jurusan :</th>
        <th align="left"><?php echo $nama_jurusan; ?></th>
    </tr>
    <tr>
        <th align="left">Nama :</th>
        <th align="left"><?php echo $nama_pengajar; ?></th>
    </tr>
    <tr>
        <th align="left">NIP :</th>
        <th align="left"><?php echo $nip_pengajar; ?></th>
    </tr>
    <tr>
        <th align="left">Tahun Ajaran :</th>
        <th align="left"><?php
            $sql = "select detail FROM tbl_tahun_ajaran WHERE id_tahun_ajaran ='" . $tahun_akademik . "'";
            $result = $mysqli->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo $row['detail'];
            }
            ?>
        </th>
    </tr>
    <tr>
        <th align="left">Semester :</th>
        <th align="left"><?php echo $semester_akademik; ?></th>
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
        <td align="center" colspan="2" style="text-align: left; font-style: oblique"></td>
        <td align="center"></td>
        <td align="center"></td>
    </tr>
    <tr>
        <td align="center">1.</td>
        <td>Kesiapan memberikan kuliah dan/atau praktek/praktikum</td>
        <td><?php echo $A1; ?></td>
        <td><?php echo $kA1; ?></td>
    </tr>
    <tr>
        <td align="center">2.</td>
        <td>Keteraturan dan ketertiban penyelenggaraan perkuliahan</td>
        <td><?php echo $A2; ?></td>
        <td><?php echo $kA2; ?></td>
    </tr>
    <tr>
        <td align="center">3.</td>
        <td>Hadir tepat waktu</td>
        <td><?php echo $A3; ?></td>
        <td><?php echo $kA3; ?></td>
    </tr>
    <tr>
        <td align="center">4.</td>
        <td>Tatap muka sesuai SKS (1 sks : 50 menit)</td>
        <td><?php echo $A4; ?></td>
        <td><?php echo $kA4; ?></td>
    </tr>
    <tr>
        <td align="center">5.</td>
        <td>Kemampuan menghidupkan suasana kelas</td>
        <td><?php echo $A5; ?></td>
        <td><?php echo $kA5; ?></td>
    </tr>
    <tr>
        <td align="center">6.</td>
        <td>Kejelasan penyampaian materi dan jawaban terhadap pertanyaan di kelas</td>
        <td><?php echo $A6; ?></td>
        <td><?php echo $kA6; ?></td>
    </tr>
    <tr>
        <td align="center">7.</td>
        <td>Kejelasan penyampaian materi dan jawaban terhadap pertanyaan di kelas</td>
        <td><?php echo $A7; ?></td>
        <td><?php echo $kA7; ?></td>
    </tr>
    <tr>
        <td align="center">8.</td>
        <td>Kejelasan penyampaian materi dan jawaban terhadap pertanyaan di kelas</td>
        <td><?php echo $A8; ?></td>
        <td><?php echo $kA8; ?></td>
    </tr>
    <tr>
        <td align="center">9.</td>
        <td>Kejelasan penyampaian materi dan jawaban terhadap pertanyaan di kelas</td>
        <td><?php echo $A9; ?></td>
        <td><?php echo $kA9; ?></td>
    </tr>
    <tr>
        <td align="center">10.</td>
        <td>Kejelasan penyampaian materi dan jawaban terhadap pertanyaan di kelas</td>
        <td><?php echo $A10; ?></td>
        <td><?php echo $kA10; ?></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: left; font-style: oblique">RATA-RATA KOMPETENSI PENDAGOGIK</td>
        <td><?php echo number_format($RKPen, 2); ?></td>
        <td><?php echo number_format($kRKPen, 2); ?></td>
    </tr>
    <tr>
        <td align="center">11.</td>
        <td>Kemampuan menjelaskan pokok bahasan/topik secara tepat</td>
        <td><?php echo $B1; ?></td>
        <td><?php echo $kB1; ?></td>
    </tr>
    <tr>
        <td align="center">12.</td>
        <td>Kemampuan memberi contoh relevan dari konsep yang diajarkan</td>
        <td><?php echo $B2; ?></td>
        <td><?php echo $kB2; ?></td>
    </tr>
    <tr>
        <td align="center">13.</td>
        <td>Kemampuan menjelaskan keterkaitan bidang/topik yang diajarkan dengan bidang/topik lain</td>
        <td><?php echo $B3; ?></td>
        <td><?php echo $kB3; ?></td>
    </tr>
    <tr>
        <td align="center">14.</td>
        <td>Kemampuan menjelaskan keterkaitan bidang/topik yang diajarkan dengan konteks kehidupan</td>
        <td><?php echo $B4; ?></td>
        <td><?php echo $kB4; ?></td>
    </tr>
    <tr>
        <td align="center">15.</td>
        <td>Penguasaan akan isu-isu mutakhir dalam bidang yang diajarkan</td>
        <td><?php echo $B5; ?></td>
        <td><?php echo $kB5; ?></td>
    </tr>
    <tr>
        <td align="center">16.</td>
        <td>Penggunaan artikel – artikel ilmiah untuk meningkatkan kualitas perkuliahan</td>
        <td><?php echo $B6; ?></td>
        <td><?php echo $kB6; ?></td>
    </tr>
    <tr>
        <td align="center">17.</td>
        <td>Menggunakan buku referensi yang terbaru</td>
        <td><?php echo $B7; ?></td>
        <td><?php echo $kB7; ?></td>
    </tr>
    <tr>
        <td align="center">18.</td>
        <td>Kemampuan menggunakan beragam tekhnologi informasi yang menunjang proses pembelajaran</td>
        <td><?php echo $B8; ?></td>
        <td><?php echo $kB8; ?></td>
    </tr>
    <tr>
        <td align="center" colspan="2" style="text-align: left; font-style: oblique">RATA-RATA KOMPETENSI PROFESIONAL</td>
        <td><?php echo number_format($RKProf, 2) ?></td>
        <td><?php echo number_format($kRKProf, 2) ?></td>
    </tr>
    <tr>
        <td align="center">19.</td>
        <td>Kewibawaan sebagai pribadi dosen</td>
        <td><?php echo $C1; ?></td>
        <td><?php echo $kC1; ?></td>
    </tr>
    <tr>
        <td align="center">20.</td>
        <td>Menjadi contoh dalam bersikap dan berperilaku</td>
        <td><?php echo $C2; ?></td>
        <td><?php echo $kC2; ?></td>
    </tr>
    <tr>
        <td align="center">21.</td>
        <td>Konsistensi antara kata dan tindakan</td>
        <td><?php echo $C3; ?></td>
        <td><?php echo $kC3; ?></td>
    </tr>
    <tr>
        <td align="center">22.</td>
        <td>Kemampuan mengendalikan diri dalam berbagai situasi dan kondisi</td>
        <td><?php echo $C4; ?></td>
        <td><?php echo $kC4; ?></td>
    </tr>
    <tr>
        <td align="center">23.</td>
        <td>Adil dalam memperlakukan mahasiswa (obyektif)</td>
        <td><?php echo $C5; ?></td>
        <td><?php echo $kC5; ?></td>
    </tr>
    <tr>
        <td align="center">24.</td>
        <td>Percaya diri akan kemampuan mengajar</td>
        <td><?php echo $C6; ?></td>
        <td><?php echo $kC6; ?></td>
    </tr>
    <tr>
        <td align="center" colspan="2" style="text-align: left; font-style: oblique">RATA-RATA KOMPETENSI KEPRIBADIAN</td>
        <td><?php echo number_format($RKKep, 2) ?></td>
        <td><?php echo number_format($kRKKep, 2) ?></td>
    </tr>
    <tr>
        <td align="center">25.</td>
        <td>Kemampuan menyampaikan materi perkuliahan</td>
        <td><?php echo $D1; ?></td>
        <td><?php echo $kD1; ?></td>
    </tr>
    <tr>
        <td align="center">26.</td>
        <td>keterbukaan menerima kritik dan pendapat dari mahasiswa</td>
        <td><?php echo $D2; ?></td>
        <td><?php echo $kD2; ?></td>
    </tr>
    <tr>
        <td align="center">27.</td>
        <td>Mengenal dengan baik mahasiswa yang mengikuti kuliahnya</td>
        <td><?php echo $D3; ?></td>
        <td><?php echo $kD3; ?></td>
    </tr>
    <tr>
        <td align="center">28.</td>
        <td>Kesediaan berkomunikasi dengan mahasiswa secara informal</td>
        <td><?php echo $D4; ?></td>
        <td><?php echo $kD4; ?></td>
    </tr>
    <tr>
        <td align="center">29.</td>
        <td>Toleransi terhadap keberagaman mahasiswa</td>
        <td><?php echo $D5; ?></td>
        <td><?php echo $kD5; ?></td>
    </tr>
    <tr>
        <td align="center">30.</td>
        <td>Mudah bergaul dengan civitas (termasuk dengan mahasiswa)</td>
        <td><?php echo $D6; ?></td>
        <td><?php echo $kD6; ?></td>
    </tr>
    <tr>
        <td align="center" colspan="2" style="text-align: left; font-style: oblique">RATA-RATA KOMPETENSI SOSIAL</td>
        <td><?php echo number_format($RKSos, 2) ?></td>
        <td><?php echo number_format($kRKSos, 2) ?></td>
    </tr>
</table>

<table>
    <tr>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
<table border="1">
    <tr>
        <td colspan="2">Rata-Rata</td>
        <td><?php echo number_format($rata, 2) ?></td>
    </tr>
    <tr style="color: ">
        <td colspan="2">Rata-Rata Keseluruhan</td>
        <td><?php echo number_format($rata10, 2) ?></td>
    </tr>
    <tr>
        <td colspan="2">Kinerja Guru</td>
        <td colspan="2"><?php
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
            ?>
        </td>
    </tr>
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
        <td>Keterangan : *)</td>
        <td>Nilai >= 4.5</td>
        <td>EXCELLENT PERFORMANCE</td>
    </tr>
    <tr>
        <td></td>
        <td>Nilai >= 4</td>
        <td>VERY GOOD PEDFORMANCE</td>
    </tr>
    <tr>
        <td></td>
        <td>Nilai >= 3.5</td>
        <td>GOOD PERFORMANCE</td>
    </tr>
    <tr><td></td>
        <td>Nilai >= 3</td>
        <td>FAIR PERFORMANCE</td>
    </tr>
    <tr>
        <td></td>
        <td>Nilai >= 2.50</td>
        <td>POOR PERFORMANCE</td>
    </tr>
    <tr>
        <td></td>
        <td>Nilai < 2.50</td>
        <td>VERY POOR PERFORMANCE</td>
    </tr>
</table>