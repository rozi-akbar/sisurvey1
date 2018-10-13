<?php
//Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
$namafile = "hasil_rekapitulasi";
header("Content-Disposition: attachment; filename=" . $namafile . ".xls");

include './koneksiDb.php';
// main 
$database = new koneksiDb("localhost", "root", "", "survey3");
$database->execute_query("SELECT peng.nip as nip, jur.nama_jurusan as namjur, peng.nama as nampeng, per.tahun_akademik, per.semester_akademik, AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4, AVG(per.A5) as A5, AVG(per.A6) as A6, AVG(per.A7) as A7, AVG(per.A8) as A8, AVG(per.A9) as A9, AVG(per.A10) as A10,
                                            AVG(per.B1) as B1, AVG(per.B2) as B2, AVG(per.B3) as B3, AVG(per.B4) as B4, AVG(per.B5) as B5, AVG(per.B6) as B6, AVG(per.B7) as B7, AVG(per.B8) as B8,
                                            AVG(per.C1) as C1, AVG(per.C2) as C2, AVG(per.C3) as C3, AVG(per.C4) as C4, AVG(per.C5) as C5, AVG(per.C6) as C6,
                                            AVG(per.D1) as D1, AVG(per.D2) as D2, AVG(per.D3) as D3, AVG(per.D4) as D4, AVG(per.D5) as D5, AVG(per.D6) as D6
                                            FROM tbl_pertanyaan per
                                            JOIN tbl_jurusan jur ON jur.id_jurusan = per.id_jurusan
                                            JOIN tbl_pengajar peng ON per.nip = peng.nip
                                            WHERE jur.id_jurusan =  '" . $_POST['instansi'] . "'"
        . "AND peng.nip =  '" . $_POST['pengajar'] . "'"
        . "AND tahun_akademik =  '" . $_POST['tahun'] . "'"
        . "AND semester_akademik =  '" . $_POST['semester'] . "';");
while ($baris = @mysqli_fetch_assoc($database->getHasil())) {
    $hasil1 = number_format($baris ['A1'], 2);
    $hasil2 = number_format($baris ['A2'], 2);
    $hasil3 = number_format($baris ['A3'], 2);
    $hasil4 = number_format($baris ['A4'], 2);
    $hasil5 = number_format($baris ['A5'], 2);
    $hasil6 = number_format($baris ['A6'], 2);
    $hasil7 = number_format($baris ['A7'], 2);
    $hasil8 = number_format($baris ['A8'], 2);
    $hasil9 = number_format($baris ['A9'], 2);
    $hasil10 = number_format($baris ['A10'], 2);
    $hasil11 = number_format($baris ['B1'], 2);
    $hasil12 = number_format($baris ['B2'], 2);
    $hasil13 = number_format($baris ['B3'], 2);
    $hasil14 = number_format($baris ['B4'], 2);
    $hasil15 = number_format($baris ['B5'], 2);
    $hasil16 = number_format($baris ['B6'], 2);
    $hasil17 = number_format($baris ['B7'], 2);
    $hasil18 = number_format($baris ['B8'], 2);
    $hasil19 = number_format($baris ['C1'], 2);
    $hasil20 = number_format($baris ['C2'], 2);
    $hasil21 = number_format($baris ['C3'], 2);
    $hasil22 = number_format($baris ['C4'], 2);
    $hasil23 = number_format($baris ['C5'], 2);
    $hasil24 = number_format($baris ['C6'], 2);
    $hasil25 = number_format($baris ['D1'], 2);
    $hasil26 = number_format($baris ['D2'], 2);
    $hasil27 = number_format($baris ['D3'], 2);
    $hasil28 = number_format($baris ['D4'], 2);
    $hasil29 = number_format($baris ['D5'], 2);
    $hasil30 = number_format($baris ['D6'], 2);
    $hasil31 = $baris ['namjur'];
    $hasil32 = $baris ['nampeng'];
    $hasil33 = $baris ['nip'];
    $rata = ($baris['A1'] + $baris['A2'] + $baris['A3'] + $baris['A4'] + $baris['A5'] + $baris['A6'] + $baris['A7'] + $baris['A8'] + $baris['A9'] + $baris['A10'] + $baris['B1'] + $baris['B2'] + $baris['B3'] + $baris['B4'] + $baris['B5'] + $baris['B6'] + $baris['B7'] + $baris['B8'] + $baris['C1'] + $baris['C2'] + $baris['C3'] + $baris['C4'] + $baris['C5'] + $baris['C6'] + $baris['D1'] + $baris['D2'] + $baris['D3'] + $baris['D4'] + $baris['D5'] + $baris['D6']) / 30;
    $rt = number_format($rata, 2);
}

$database2 = new koneksiDb("localhost", "root", "", "survey3");
$database2->execute_query("SELECT AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4, AVG(per.A5) as A5, AVG(per.A6) as A6, AVG(per.A7) as A7, AVG(per.A8) as A8, AVG(per.A9) as A9, AVG(per.A10) as A10,
                                            AVG(per.B1) as B1, AVG(per.B2) as B2, AVG(per.B3) as B3, AVG(per.B4) as B4, AVG(per.B5) as B5, AVG(per.B6) as B6, AVG(per.B7) as B7, AVG(per.B8) as B8,
                                            AVG(per.C1) as C1, AVG(per.C2) as C2, AVG(per.C3) as C3, AVG(per.C4) as C4, AVG(per.C5) as C5, AVG(per.C6) as C6,
                                            AVG(per.D1) as D1, AVG(per.D2) as D2, AVG(per.D3) as D3, AVG(per.D4) as D4, AVG(per.D5) as D5, AVG(per.D6) as D6
                                            FROM tbl_pertanyaan per
                                            JOIN tbl_jurusan jur ON jur.id_jurusan = per.id_jurusan
                                            JOIN tbl_pengajar peng ON per.nip = peng.nip
                                            WHERE tahun_akademik =  '" . $_POST['tahun'] . "'"
        . "AND semester_akademik =  '" . $_POST['semester'] . "';");
while ($baris2 = @mysqli_fetch_assoc($database2->getHasil())) {
    $hhasil1 = number_format($baris2 ['A1'], 2);
    $hhasil2 = number_format($baris2 ['A2'], 2);
    $hhasil3 = number_format($baris2 ['A3'], 2);
    $hhasil4 = number_format($baris2 ['A4'], 2);
    $hhasil5 = number_format($baris2 ['A5'], 2);
    $hhasil6 = number_format($baris2 ['A6'], 2);
    $hhasil7 = number_format($baris2 ['A7'], 2);
    $hhasil8 = number_format($baris2 ['A8'], 2);
    $hhasil9 = number_format($baris2 ['A9'], 2);
    $hhasil10 = number_format($baris2 ['A10'], 2);
    $hhasil11 = number_format($baris2 ['B1'], 2);
    $hhasil12 = number_format($baris2 ['B2'], 2);
    $hhasil13 = number_format($baris2 ['B3'], 2);
    $hhasil14 = number_format($baris2 ['B4'], 2);
    $hhasil15 = number_format($baris2 ['B5'], 2);
    $hhasil16 = number_format($baris2 ['B6'], 2);
    $hhasil17 = number_format($baris2 ['B7'], 2);
    $hhasil18 = number_format($baris2 ['B8'], 2);
    $hhasil19 = number_format($baris2 ['C1'], 2);
    $hhasil20 = number_format($baris2 ['C2'], 2);
    $hhasil21 = number_format($baris2 ['C3'], 2);
    $hhasil22 = number_format($baris2 ['C4'], 2);
    $hhasil23 = number_format($baris2 ['C5'], 2);
    $hhasil24 = number_format($baris2 ['C6'], 2);
    $hhasil25 = number_format($baris2 ['D1'], 2);
    $hhasil26 = number_format($baris2 ['D2'], 2);
    $hhasil27 = number_format($baris2 ['D3'], 2);
    $hhasil28 = number_format($baris2 ['D4'], 2);
    $hhasil29 = number_format($baris2 ['D5'], 2);
    $hhasil30 = number_format($baris2 ['D6'], 2);
    $rata2 = ($baris2['A1'] + $baris2['A2'] + $baris2['A3'] + $baris2['A4'] + $baris2['A5'] + $baris2['A6'] + $baris2['A7'] + $baris2['A8'] + $baris2['A9'] + $baris2['A10'] + $baris2['B1'] + $baris2['B2'] + $baris2['B3'] + $baris2['B4'] + $baris2['B5'] + $baris2['B6'] + $baris2['B7'] + $baris2['B8'] + $baris2['C1'] + $baris2['C2'] + $baris2['C3'] + $baris2['C4'] + $baris2['C5'] + $baris2['C6'] + $baris2['D1'] + $baris2['D2'] + $baris2['D3'] + $baris2['D4'] + $baris2['D5'] + $baris2['D6']) / 30;
    $rt2 = number_format($rata2, 2);
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
        <td>Kesiapan memberikan kuliah dan/atau praktek/praktikum</td>
        <td align="center"><?php echo $hasil1 ?></td>
        <td align="center"><?php echo $hhasil1 ?></td>
    </tr>
    <tr>
        <td align="center">2.</td>
        <td>Keteraturan dan ketertiban penyelenggaraan perkuliahan</td>
        <td align="center"><?php echo $hasil2 ?></td>
        <td align="center"><?php echo $hhasil2 ?></td>
    </tr>
    <tr>
        <td align="center">3.</td>
        <td>Hadir tepat waktu</td>
        <td align="center"><?php echo $hasil3 ?></td>
        <td align="center"><?php echo $hhasil3 ?></td>
    </tr>
    <tr>
        <td align="center">4.</td>
        <td>Tatap muka sesuai SKS (1 sks : 50 menit)</td>
        <td align="center"><?php echo $hasil4 ?></td>
        <td align="center"><?php echo $hhasil4 ?></td>
    </tr>
    <tr>
        <td align="center">5.</td>
        <td>Kemampuan menghidupkan suasana kelas</td>
        <td align="center"><?php echo $hasil5 ?></td>
        <td align="center"><?php echo $hhasil5 ?></td>
    </tr>
    <tr>
        <td align="center">6.</td>
        <td>Kejelasan penyampaian materi dan jawaban terhadap pertanyaan di kelas</td>
        <td align="center"><?php echo $hasil6 ?></td>
        <td align="center"><?php echo $hhasil6 ?></td>
    </tr>
    <tr>
        <td align="center">7.</td>
        <td>Pemanfaatan media dan teknologi pembelajaran</td>
        <td align="center"><?php echo $hasil7 ?></td>
        <td align="center"><?php echo $hhasil7 ?></td>
    </tr>
    <tr>
        <td align="center">8.</td>
        <td>Keanekaragaman cara pengukuran hasil belajar</td>
        <td align="center"><?php echo $hasil8 ?></td>
        <td align="center"><?php echo $hhasil8 ?></td>
    </tr>
    <tr>
        <td align="center">9.</td>
        <td>Pemberian umpan balik terhadap tugas</td>
        <td align="center"><?php echo $hasil9 ?></td>
        <td align="center"><?php echo $hhasil9 ?></td>
    </tr>
    <tr>
        <td align="center">10.</td>
        <td>Nilai diberikan secara obyektif</td>
        <td align="center"><?php echo $hasil10 ?></td>
        <td align="center"><?php echo $hhasil10 ?></td>
    </tr>
    <tr>
        <td align="center" colspan="2" style="text-align: left; font-style: oblique">B. Kompetensi Profesional</td>
        <td align="center"></td>
    </tr>
    <tr>
        <td align="center">11.</td>
        <td>Kemampuan menjelaskan pokok bahasan/topik secara tepat</td>
        <td align="center"><?php echo $hasil11 ?></td>
        <td align="center"><?php echo $hhasil11 ?></td>
    </tr>
    <tr>
        <td align="center">12.</td>
        <td>Kemampuan memberi contoh relevan dari konsep yang diajarkan</td>
        <td align="center"><?php echo $hasil12 ?></td>
        <td align="center"><?php echo $hhasil12 ?></td>
    </tr>
    <tr>
        <td align="center">13.</td>
        <td>Kemampuan menjelaskan keterkaitan bidang/topik yang diajarkan dengan bidang/topik lain</td>
        <td align="center"><?php echo $hasil13 ?></td>
        <td align="center"><?php echo $hhasil13 ?></td>
    </tr>
    <tr>
        <td align="center">14.</td>
        <td>Kemampuan menjelaskan keterkaitan bidang/topik yang diajarkan dengan konteks kehidupan</td>
        <td align="center"><?php echo $hasil14 ?></td>
        <td align="center"><?php echo $hhasil14 ?></td>
    </tr>
    <tr>
        <td align="center">15.</td>
        <td>Penguasaan akan isu-isu mutakhir dalam bidang yang diajarkan</td>
        <td align="center"><?php echo $hasil15 ?></td>
        <td align="center"><?php echo $hhasil15 ?></td>
    </tr>
    <tr>
        <td align="center">16.</td>
        <td>Penggunaan artikel - artikel ilmiah untuk meningkatkan kualitas perkuliahan</td>
        <td align="center"><?php echo $hasil16 ?></td>
        <td align="center"><?php echo $hhasil16 ?></td>
    </tr>
    <tr>
        <td align="center">17.</td>
        <td>Menggunakan buku referensi yang terbaru</td>
        <td align="center"><?php echo $hasil17 ?></td>
        <td align="center"><?php echo $hhasil17 ?></td>
    </tr>
    <tr>
        <td align="center">18.</td>
        <td>Kemampuan menggunakan beragam tekhnologi informasi yang menunjang proses pembelajaran</td>
        <td align="center"><?php echo $hasil18 ?></td>
        <td align="center"><?php echo $hhasil18 ?></td>
    </tr>
    <tr>
        <td align="center" colspan="2" style="text-align: left; font-style: oblique">C. Kompetensi Kepribadian</td>
        <td align="center"></td>
    </tr>
    <tr>
        <td align="center">19.</td>
        <td>Kewibawaan sebagai pribadi dosen</td>
        <td align="center"><?php echo $hasil19 ?></td>
        <td align="center"><?php echo $hhasil19 ?></td>
    </tr>
    <tr>
        <td align="center">20.</td>
        <td>Menjadi contoh dalam bersikap dan berperilaku</td>
        <td align="center"><?php echo $hasil20 ?></td>
        <td align="center"><?php echo $hhasil20 ?></td>
    </tr>
    <tr>
        <td align="center">21.</td>
        <td>Konsistensi antara kata dan tindakan</td>
        <td align="center"><?php echo $hasil21 ?></td>
        <td align="center"><?php echo $hhasil21 ?></td>
    </tr>
    <tr>
        <td align="center">22.</td>
        <td>Kemampuan mengendalikan diri dalam berbagai situasi dan kondisi</td>
        <td align="center"><?php echo $hasil22 ?></td>
        <td align="center"><?php echo $hhasil22 ?></td>
    </tr>
    <tr>
        <td align="center">23.</td>
        <td>Adil dalam memperlakukan mahasiswa (obyektif)</td>
        <td align="center"><?php echo $hasil23 ?></td>
        <td align="center"><?php echo $hhasil23 ?></td>
    </tr>
    <tr>
        <td align="center">24.</td>
        <td>Percaya diri akan kemampuan mengajar </td>
        <td align="center"><?php echo $hasil24 ?></td>
        <td align="center"><?php echo $hhasil24 ?></td>
    </tr>
    <tr>
        <td align="center" colspan="2" style="text-align: left; font-style: oblique">C. Kompetensi Kepribadian</td>
        <td align="center"></td>
    </tr>
    <tr>
        <td align="center">25.</td>
        <td>Kemampuan menyampaikan materi perkuliahan</td>
        <td align="center"><?php echo $hasil25 ?></td>
        <td align="center"><?php echo $hhasil25 ?></td>
    </tr>
    <tr>
        <td align="center">26.</td>
        <td>keterbukaan menerima kritik dan pendapat dari mahasiswa</td>
        <td align="center"><?php echo $hasil26 ?></td>
        <td align="center"><?php echo $hhasil26 ?></td>
    </tr>
    <tr>
        <td align="center">27.</td>
        <td>Mengenal dengan baik mahasiswa yang mengikuti kuliahnya</td>
        <td align="center"><?php echo $hasil27 ?></td>
        <td align="center"><?php echo $hhasil27 ?></td>
    </tr>
    <tr>
        <td align="center">28.</td>
        <td>Kesediaan berkomunikasi dengan mahasiswa secara informal</td>
        <td align="center"><?php echo $hasil28 ?></td>
        <td align="center"><?php echo $hhasil28 ?></td>
    </tr>
    <tr>
        <td align="center">29.</td>
        <td>Toleransi terhadap keberagaman mahasiswa</td>
        <td align="center"><?php echo $hasil29 ?></td>
        <td align="center"><?php echo $hhasil29 ?></td>
    </tr>
    <tr>
        <td align="center">30.</td>
        <td>Mudah bergaul dengan civitas (termasuk dengan mahasiswa)</td>
        <td align="center"><?php echo $hasil30 ?></td>
        <td align="center"><?php echo $hhasil30 ?></td>
    </tr>
    <tr>
        <td></td>
        <td style="">Rata-rata</td>
        <td align="center"><?php echo $rt ?></td>
        <td align="center"><?php echo $rt2 ?></td>
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
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
<table class="table table-striped">
    <tr>
        <td></td>
        <td>Nilai Setelah di Rata-Rata Keseluruhan</td>
        <td><?php echo $rt ?></td>
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