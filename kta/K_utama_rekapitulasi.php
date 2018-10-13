<?php 
include './K_header.php';
include '../config/konekDb.php';
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
                                    <tr>
                                        <td>Instansi Sekolah</td><td>:</td><td>
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
                                    <tr>
                                        <td>Nama Pengajar</td>
                                        <td>:</td>
                                        <td>
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
                                    <tr>
                                        <td>Tahun Akademik</td><td>:</td><td>
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
                                    <tr>
                                        <td>Semester Akademik</td><td>:</td><td>
                                            <select class="input-medium" name="semester">
                                                <option selected="selected">--Semester--</option>
                                                <option value="ganjil">ganjil</option>
                                                <option value="genap">genap</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button type="submit" class="btn btn-info">Cari</button>
                                        </td>
                                    </tr> 
                                </table>
                            </form>
                            <?php
                            if (isset($_POST['instansi'])) {
                                $sql = "SELECT jur.nama_jurusan, peng.nama, per.tahun_akademik, per.semester_akademik, AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4, AVG(per.A5) as A5, AVG(per.A6) as A6,
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
                                        . "AND per.tahun_akademik =  '" . $_POST['tahun'] . "'"
                                        . "AND per.semester_akademik =  '" . $_POST['semester'] . "';";
                                $result = $mysqli->query($sql);
                                while ($baris4 = $result->fetch_assoc()) {
                                    $rata = ($baris4['A1'] + $baris4['A2'] + $baris4['A3'] + $baris4['A4'] + $baris4['A5'] + $baris4['A6'] +
                                            $baris4['B1'] + $baris4['B2'] + $baris4['B3'] + $baris4['B4'] +
                                            $baris4['C1'] + $baris4['C2'] + $baris4['C3'] + $baris4['C4'] + $baris4['C5'] + $baris4['C6'] + $baris4['C7'] +
                                            $baris4['D1'] + $baris4['D2'] + $baris4['D3'] + $baris4['D4'] +
                                            $baris4['E1'] + $baris4['E2'] + $baris4['E3'] + $baris4['E4'] + $baris4['E5'] + $baris4['E6'] + $baris4['E7'] + $baris4['E8'] + $baris4['E9'] + $baris4['E10'] + $baris4['E11'] + $baris4['E12'] + $baris4['E13'] +
                                            $baris4['F1'] + $baris4['F2'] + $baris4['F3'] + $baris4['F4'] + $baris4['F5'] + $baris4['F6']) / 40;
                                    $A1 = number_format($baris4 ['A1'], 2);
                                    $A2 = number_format($baris4 ['A2'], 2);
                                    $A3 = number_format($baris4 ['A3'], 2);
                                    $A4 = number_format($baris4 ['A4'], 2);
                                    $A5 = number_format($baris4 ['A5'], 2);
                                    $A6 = number_format($baris4 ['A6'], 2);
                                    $B1 = number_format($baris4 ['B1'], 2);
                                    $B2 = number_format($baris4 ['B2'], 2);
                                    $B3 = number_format($baris4 ['B3'], 2);
                                    $B4 = number_format($baris4 ['B4'], 2);
                                    $C1 = number_format($baris4 ['C1'], 2);
                                    $C2 = number_format($baris4 ['C2'], 2);
                                    $C3 = number_format($baris4 ['C3'], 2);
                                    $C4 = number_format($baris4 ['C4'], 2);
                                    $C5 = number_format($baris4 ['C5'], 2);
                                    $C6 = number_format($baris4 ['C6'], 2);
                                    $C7 = number_format($baris4 ['C7'], 2);
                                    $D1 = number_format($baris4 ['D1'], 2);
                                    $D2 = number_format($baris4 ['D2'], 2);
                                    $D3 = number_format($baris4 ['D3'], 2);
                                    $D4 = number_format($baris4 ['D4'], 2);
                                    $E1 = number_format($baris4 ['E1'], 2);
                                    $E2 = number_format($baris4 ['E2'], 2);
                                    $E3 = number_format($baris4 ['E3'], 2);
                                    $E4 = number_format($baris4 ['E4'], 2);
                                    $E5 = number_format($baris4 ['E5'], 2);
                                    $E6 = number_format($baris4 ['E6'], 2);
                                    $E7 = number_format($baris4 ['E7'], 2);
                                    $E8 = number_format($baris4 ['E8'], 2);
                                    $E9 = number_format($baris4 ['E9'], 2);
                                    $E10 = number_format($baris4 ['E10'], 2);
                                    $E11 = number_format($baris4 ['E11'], 2);
                                    $E12 = number_format($baris4 ['E12'], 2);
                                    $E13 = number_format($baris4 ['E13'], 2);
                                    $F1 = number_format($baris4 ['F1'], 2);
                                    $F2 = number_format($baris4 ['F2'], 2);
                                    $F3 = number_format($baris4 ['F3'], 2);
                                    $F4 = number_format($baris4 ['F4'], 2);
                                    $F5 = number_format($baris4 ['F5'], 2);
                                    $F6 = number_format($baris4 ['F6'], 2);
                                }
                                $sql = "SELECT AVG(per.A1) as A1, AVG(per.A2) as A2, AVG(per.A3) as A3, AVG(per.A4) as A4, AVG(per.A5) as A5, AVG(per.A6) as A6,
                                            AVG(per.B1) as B1, AVG(per.B2) as B2, AVG(per.B3) as B3, AVG(per.B4) as B4,
                                            AVG(per.C1) as C1, AVG(per.C2) as C2, AVG(per.C3) as C3, AVG(per.C4) as C4, AVG(per.C5) as C5, AVG(per.C6) as C6, AVG(per.C7) as C7,
                                            AVG(per.D1) as D1, AVG(per.D2) as D2, AVG(per.D3) as D3, AVG(per.D4) as D4,
                                            AVG(per.E1) as E1, AVG(per.E2) as E2, AVG(per.E3) as E3, AVG(per.E4) as E4, AVG(per.E5) as E5, AVG(per.E6) as E6, AVG(per.E7) as E7, AVG(per.E8) as E8, AVG(per.E9) as E9, AVG(per.E10) as E10, AVG(per.E11) as E11, AVG(per.E12) as E12, AVG(per.E13) as E13,
                                            AVG(per.F1) as F1, AVG(per.F2) as F2, AVG(per.F3) as F3, AVG(per.F4) as F4, AVG(per.F5) as F5, AVG(per.F6) as F6
                                            FROM tbl_rekap_survey per
                                            JOIN tbl_jurusan jur ON jur.id_jurusan = per.id_jurusan
                                            WHERE tahun_akademik =  '" . $_POST['tahun'] . "'"
                                    . "AND semester_akademik =  '" . $_POST['semester'] . "';";
                                $result = $mysqli->query($sql);
                                while ($baris9 = $result->fetch_assoc()) {
                                    $rata10 = ($baris9['A1'] + $baris9['A2'] + $baris9['A3'] + $baris9['A4'] + $baris9['A5'] + $baris9['A6'] +
                                        $baris9['B1'] + $baris9['B2'] + $baris9['B3'] + $baris9['B4'] +
                                        $baris9['C1'] + $baris9['C2'] + $baris9['C3'] + $baris9['C4'] + $baris9['C5'] + $baris9['C6'] + $baris9['C7'] +
                                        $baris9['D1'] + $baris9['D2'] + $baris9['D3'] + $baris9['D4'] +
                                        $baris9['E1'] + $baris9['E2'] + $baris9['E3'] + $baris9['E4'] + $baris9['E5'] + $baris9['E6'] + $baris9['E7'] + $baris9['E8'] + $baris9['E9'] + $baris9['E10'] + $baris9['E11'] + $baris9['E12'] + $baris9['E13'] +
                                        $baris9['F1'] + $baris9['F2'] + $baris9['F3'] + $baris9['F4'] + $baris9['F5'] + $baris9['F6']) / 40;
                                }
                                ?>
                                <br/><br/><h3>REKAPITULASI DATA</h3><div style="overflow-x:scroll;">
                                <table border="2" class="table table-striped table-bordered">
                                    <th align="center">No</th>
                                    <th align="center">Aspek yang Diamati</th>
                                    <th align="center" colspan="5">S K O R</th>
                                    <tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">A. Perumusan Indikator</td>
                                        <td</td>
                                    </tr>
                                    <tr>
                                        <td align="center">1.</td>
                                        <td>Indikator sesuai dengan SKL-KI, dan KD</td>
                                        <td><?php echo $A1; ?></td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">2.</td>
                                        <td>Meliputi dimensi sikap, keterampilan dan pengetahuan</td>
                                        <td><?php echo $A2; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">3.</td>
                                        <td>Menggunakan kata kerja operasional yang mengandung satu prilaku</td>
                                        <td><?php echo $A3; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">4.</td>
                                        <td>Mengadung satu prilaku yang dapat diobservasi</td>
                                        <td><?php echo $A4; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">5.</td>
                                        <td>Mencakup  level berpikir tinggi (analisis, evaluasi, atau mencipta).</td>
                                        <td><?php echo $A5; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">6.</td>
                                        <td>Meliputi pengetahuan faktual, konseptual, prosedural, dan/atau metakognitif (learning how to learn)</td>
                                        <td><?php echo $A6; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">B. Perumusan Tujuan Pembelajaran</td>
                                        <td align="center"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">7.</td>
                                        <td>Tujuan realistik, dapat dicapai melalui proses pembelajaran</td>
                                        <td><?php echo $B1; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">8.</td>
                                        <td>Relevan dengan kompetensi dasar dan indikator </td>
                                        <td><?php echo $B2; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">9.</td>
                                        <td>Mencakup pengembangan sikap, keterampilan dan pengetahuan</td>
                                        <td><?php echo $B3; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">10.</td>
                                        <td>Mengandung unsur menciptakan karya</td>
                                        <td><?php echo $B4; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">C. Materi Pembelajaran</td>
                                        <td align="center"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">11.</td>
                                        <td>Relevan dengan tujuan</td>
                                        <td><?php echo $C1; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">12.</td>
                                        <td>Sesuai dengan potensi peserta didik</td>
                                        <td><?php echo $C2; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">13.</td>
                                        <td>Kontekstual</td>
                                        <td><?php echo $C3; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">14.</td>
                                        <td>Sesuai dengan perkembangan fisik, intelektual, emosional, sosial, dan spiritual siswa</td>
                                        <td><?php echo $C4; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">15.</td>
                                        <td>Bermanfaat untuk peserta didik</td>
                                        <td><?php echo $C5; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">16.</td>
                                        <td>Materi yang disajikan aktual</td>
                                        <td><?php echo $C6; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">17.</td>
                                        <td>Relevan dengan kebutuhan siswa</td>
                                        <td><?php echo $C7; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">D. Media Pembelajaran</td>
                                        <td align="center"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">18.</td>
                                        <td>Sesuai dengan tujuan pembelajaran</td>
                                        <td><?php echo $D1; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">19.</td>
                                        <td>Memudahkan siswa menguasai materi pelajaran</td>
                                        <td><?php echo $D2; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">20.</td>
                                        <td>Memfasilitasi siswa menerapkan pendekatan saintifik</td>
                                        <td><?php echo $D3; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">21.</td>
                                        <td>Memberdayakan teknologi informasi dan komunikasi</td>
                                        <td><?php echo $D4; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">E. Metode Pembelajaran</td>
                                        <td align="center"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">22.</td>
                                        <td>Sesuai dengan tujuan pembelajaran</td>
                                        <td><?php echo $E1; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">23.</td>
                                        <td>Sesuai dengan pendekatan saintifik</td>
                                        <td><?php echo $E2; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">24.</td>
                                        <td>Sesuai dengan model model inkuiri, pembelajaran berbasis masalah, atau proyek</td>
                                        <td><?php echo $E3; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">25.</td>
                                        <td>Mengembangkan kapasitas individu dan kerja sama peserta didik</td>
                                        <td><?php echo $E4; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">E. Rencana Kegiatan Pembelajaran</td>
                                        <td align="center"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">26.</td>
                                        <td>Menampilkan kegiatan pendahuluan, inti, dan penutup</td>
                                        <td><?php echo $E5; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">27.</td>
                                        <td>Menjelaskan tujuan pembelajaran</td>
                                        <td><?php echo $E6; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">28.</td>
                                        <td>Merencanakan kegiatan siswa menanya</td>
                                        <td><?php echo $E7; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">29.</td>
                                        <td>Merencanakan kegiatan siswa mengamati</td>
                                        <td><?php echo $E8; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">30.</td>
                                        <td>Merancang kegiatan siswa mencoba</td>
                                        <td><?php echo $E9; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">31.</td>
                                        <td>Merancang  kegiatan siswa menalar atau mengasosiasi (eksplorasi, elaborasi, dan konfirmasi)</td>
                                        <td><?php echo $E10; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">32.</td>
                                        <td>Merancang kegiatan siswa membentuk jejaring atau mengomunikasikan produk penalarannya</td>
                                        <td><?php echo $E11; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">33.</td>
                                        <td>Merangkan kegiatan siswa berkarya atau mencipta</td>
                                       <td><?php echo $E12; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">34.</td>
                                        <td>Mengandung rencana kegiatan tindak lanjut (penugasan, remedial, dan pengayaan)</td>
                                        <td><?php echo $E13; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">F. Penilaian</td>
                                        <td align="center"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">35.</td>
                                        <td>Menilai ketercapain indikator hasil belajar</td>
                                        <td><?php echo $F1; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">36.</td>
                                        <td>Mengukur sikap, pengetahuan, dan keterampilan</td>
                                        <td><?php echo $F2; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">37.</td>
                                        <td>Merancang penilaian otentik</td>
                                        <td><?php echo $F3; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">38.</td>
                                        <td>Meliputi rancangan instrumen tes</td>
                                        <td><?php echo $F4; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">39.</td>
                                        <td>Merancang penilai tugas</td>
                                        <td><?php echo $F5; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">40.</td>
                                        <td>Menetapkan pedoman penskoran</td>
                                        <td><?php echo $F6; ?></td>
                                    </tr>
                                </table>
                                </div>
                                <br/><br/><h3>KESIMPULAN</h3><div style="overflow-x:scroll;">
                                <table class="table table-striped">
                                <tr>
                                    <td>Rata-Rata</td>
                                    <td><?php echo number_format($rata, 2) ?></td>
                                </tr>
                                <tr style="color: ">
                                    <td>Standard Nilai Rata-Rata</td>
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
                                </div>
                                <?php
                            }
                            ?>
                        </div> <!-- /widget-content -->
                    </div> <!-- /widget -->
                </div> <!-- /span8 -->
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->
</div> <!-- /main -->
<?php include './K_footer.php'; ?>