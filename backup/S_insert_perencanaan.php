<?php include './S_header.php'; ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">      		

                    <div class="widget ">

                        <div class="widget-header">
                            <i class="icon-reorder"></i>
                            <h3>Masukkan Data Survey Perencanaan</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <?php
                            include './konekDb.php';
                            
                            if (isset($_POST['submit'])) {
                                $query = "INSERT INTO survey3.tbl_rekap_survey VALUES ("
                                        . "'" . $_POST['id_jurusan'] . "',"
                                        . "'" . $_POST['pengajar'] . "',"
                                        . "'" . $_POST['tahun_akademik'] . "',"
                                        . "'" . $_POST['semester_akademik'] . "',"
                                        . "'" . $_POST['A1'] . "',"
                                        . "'" . $_POST['A2'] . "',"
                                        . "'" . $_POST['A3'] . "',"
                                        . "'" . $_POST['A4'] . "',"
                                        . "'" . $_POST['A5'] . "',"
                                        . "'" . $_POST['A6'] . "',"
                                        . "'" . $_POST['B1'] . "',"
                                        . "'" . $_POST['B2'] . "',"
                                        . "'" . $_POST['B3'] . "',"
                                        . "'" . $_POST['B4'] . "',"
                                        . "'" . $_POST['C1'] . "',"
                                        . "'" . $_POST['C2'] . "',"
                                        . "'" . $_POST['C3'] . "',"
                                        . "'" . $_POST['C4'] . "',"
                                        . "'" . $_POST['C5'] . "',"
                                        . "'" . $_POST['C6'] . "',"
										. "'" . $_POST['C7'] . "',"
                                        . "'" . $_POST['D1'] . "',"
                                        . "'" . $_POST['D2'] . "',"
                                        . "'" . $_POST['D3'] . "',"
                                        . "'" . $_POST['D4'] . "',"
										. "'" . $_POST['E1'] . "',"
                                        . "'" . $_POST['E2'] . "',"
                                        . "'" . $_POST['E3'] . "',"
                                        . "'" . $_POST['E4'] . "',"
										. "'" . $_POST['E5'] . "',"
                                        . "'" . $_POST['E6'] . "',"
                                        . "'" . $_POST['E7'] . "',"
                                        . "'" . $_POST['E8'] . "',"
										. "'" . $_POST['E9'] . "',"
                                        . "'" . $_POST['E10'] . "',"
                                        . "'" . $_POST['E11'] . "',"
                                        . "'" . $_POST['E12'] . "',"
										. "'" . $_POST['E13'] . "',"
										. "'" . $_POST['F1'] . "',"
                                        . "'" . $_POST['F2'] . "',"
                                        . "'" . $_POST['F3'] . "',"
                                        . "'" . $_POST['F4'] . "',"
										. "'" . $_POST['F5'] . "',"
                                        . "'" . $_POST['F6'] . "')";
                                $berhasil = $mysqli->query($query);
                                if ($berhasil) {
                                    echo '<script> alert("Insert data berhasil");
                                                        window.location = "S_insert_perencanaan.php";</script>';
                                } else {
                                    echo '<script> alert("Insert data gagal");</script>';
                                }
                            } else {
                                
                            }
                            ?>
                            <form method="post">
                                <div style="color: blue;"> Tambah data baru</div>
                                <table border="0">
                                    <tr><td>Nama Jurusan</td><td>:</td><td>
                                            <select class="input-medium" name="id_jurusan">
                                                <option value="selected">--Jurusan--</option>
                                                <?php
                                                $database2 = new koneksiDb("localhost", "root", "", "survey3");
                                                $database2->execute_query("select * from survey3.tbl_jurusan");
                                                $result = mysql_query($database2);
                                                while ($row = @mysqli_fetch_assoc($database2->getHasil())) {
                                                    echo "<option value='" . $row['id_jurusan'] . "'>" . $row['nama_jurusan'] . "</option>";
                                                }
                                                ?>
                                            </select></td></tr>
                                    <tr><td>Nama Dosen</td><td>:</td><td>
                                            <select class="input-medium" name="pengajar">
                                                <option value="selected">--Pengajar--</option>
                                                <?php
                                                $database3 = new koneksiDb("localhost", "root", "", "survey3");
                                                $database3->execute_query("select * from survey3.tbl_pengajar");
                                                $result = mysql_query($database3);
                                                while ($row = @mysqli_fetch_assoc($database3->getHasil())) {
                                                    echo "<option value='" . $row['nip'] . "'>" . $row['nama'] . "</option>";
                                                }
                                                ?>
                                            </select></td></tr>
                                    <tr><td>Tahun Akademik</td><td>:</td><td>
                                            <select class="input-medium" name="tahun_akademik">
                                                <option selected="selected">--tahun--</option>
                                                <?php
                                                for ($i = date('Y'); $i >= date('Y') - 1; $i-=1) {
                                                    echo"<option value='$i'> $i </option>";
                                                }
                                                ?>
                                            </select> </td></tr>
                                    <tr><td>Semester Akademik</td><td>:</td><td>
                                            <select class="input-medium" name="semester_akademik">
                                                <option selected="selected">--semester--</option>
                                                <option value="ganjil">ganjil</option>
                                                <option value="genap">genap</option>
                                            </select></td></tr>
                                </table>
                                <table border="2" class="table table-striped table-bordered">
                                    <th align="center">No</th>
                                    <th align="center">Aspek yang Diamati</th>
                                    <th align="center" colspan="5">S K O R</th>
                                    <tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">A. Perumusan Indikator</td>
                                        <td align="center">1</td>
                                        <td align="center">2</td>
                                        <td align="center">3</td>
                                    </tr>
                                    <tr>
                                        <td align="center">1.</td>
                                        <td>Indikator sesuai dengan SKL-KI, dan KD</td>
                                        <td align="center">
                                            <input type="radio"  name="A1" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A1" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A1" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">2.</td>
                                        <td>Meliputi dimensi sikap, keterampilan dan pengetahuan</td>
                                        <td align="center">
                                            <input type="radio"  name="A2" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A2" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A2" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">3.</td>.
                                        <td>Menggunakan kata kerja operasional yang mengandung satu prilaku</td>
                                        <td align="center">
                                            <input type="radio"  name="A3" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A3" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A3" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">4.</td>
                                        <td>Mengadung satu prilaku yang dapat diobservasi</td>
                                        <td align="center">
                                            <input type="radio"  name="A4" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A4" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A4" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">5.</td>
                                        <td>Mencakup  level berpikir tinggi (analisis, evaluasi, atau mencipta).</td>
                                        <td align="center">
                                            <input type="radio"  name="A5" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A5" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A5" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">6.</td>
                                        <td>Meliputi pengetahuan faktual, konseptual, prosedural, dan/atau metakognitif (learning how to learn)</td>
                                        <td align="center">
                                            <input type="radio"  name="A6" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A6" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A6" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">B. Perumusan Tujuan Pembelajaran</td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">7.</td>
                                        <td>Tujuan realistik, dapat dicapai melalui proses pembelajaran</td>
                                        <td align="center">
                                            <input type="radio"  name="B1" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B1" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B1" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">8.</td>
                                        <td>Relevan dengan kompetensi dasar dan indikator </td>
                                        <td align="center">
                                            <input type="radio"  name="B2" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B2" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B2" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">9.</td>
                                        <td>Mencakup pengembangan sikap, keterampilan dan pengetahuan</td>
                                        <td align="center">
                                            <input type="radio"  name="B3" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B3" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B3" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">10.</td>
                                        <td>Mengandung unsur menciptakan karya</td>
                                        <td align="center">
                                            <input type="radio"  name="B4" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B4" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B4" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">C. Materi Pembelajaran</td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">11.</td>
                                        <td>Relevan dengan tujuan</td>
                                        <td align="center">
                                            <input type="radio"  name="C1" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C1" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C1" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">12.</td>
                                        <td>Sesuai dengan potensi peserta didik</td>
                                        <td align="center">
                                            <input type="radio"  name="C2" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C2" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C2" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">13.</td>
                                        <td>Kontekstual</td>
                                        <td align="center">
                                            <input type="radio"  name="C3" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C3" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C3" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">14.</td>
                                        <td>Sesuai dengan perkembangan fisik, intelektual, emosional, sosial, dan spiritual siswa</td>
                                        <td align="center">
                                            <input type="radio"  name="C4" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C4" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C4" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">15.</td>
                                        <td>Bermanfaat untuk peserta didik</td>
                                        <td align="center">
                                            <input type="radio"  name="C5" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C5" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C5" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">16.</td>
                                        <td>Materi yang disajikan aktual</td>
                                        <td align="center">
                                            <input type="radio"  name="C6" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C6" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C6" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">17.</td>
                                        <td>Relevan dengan kebutuhan siswa</td>
                                        <td align="center">
                                            <input type="radio"  name="C7" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C7" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C7" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">D. Media Pembelajaran</td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">18.</td>
                                        <td>Sesuai dengan tujuan pembelajaran</td>
                                        <td align="center">
                                            <input type="radio"  name="D1" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D1" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D1" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">19.</td>
                                        <td>Memudahkan siswa menguasai materi pelajaran</td>
                                        <td align="center">
                                            <input type="radio"  name="D2" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D2" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D2" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">20.</td>
                                        <td>Memfasilitasi siswa menerapkan pendekatan saintifik</td>
                                        <td align="center">
                                            <input type="radio"  name="D3" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D3" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D3" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">21.</td>
                                        <td>Memberdayakan teknologi informasi dan komunikasi</td>
                                        <td align="center">
                                            <input type="radio"  name="D4" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D4" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D4" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">E. Metode Pembelajaran</td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">22.</td>
                                        <td>Sesuai dengan tujuan pembelajaran</td>
                                        <td align="center">
                                            <input type="radio"  name="E1" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E1" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E1" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">23.</td>
                                        <td>Sesuai dengan pendekatan saintifik</td>
                                        <td align="center">
                                            <input type="radio"  name="E2" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E2" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E2" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center">24.</td>
                                        <td>Sesuai dengan model model inkuiri, pembelajaran berbasis masalah, atau proyek</td>
                                        <td align="center">
                                            <input type="radio"  name="E3" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E3" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E3" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center">25.</td>
                                        <td>Mengembangkan kapasitas individu dan kerja sama peserta didik</td>
                                        <td align="center">
                                            <input type="radio"  name="E4" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E4" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E4" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">E. Rencana Kegiatan Pembelajaran</td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    </tr>
									<tr>
                                        <td align="center">26.</td>
                                        <td>Menampilkan kegiatan pendahuluan, inti, dan penutup</td>
                                        <td align="center">
                                            <input type="radio"  name="E5" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E5" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E5" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center">27.</td>
                                        <td>Menjelaskan tujuan pembelajaran</td>
                                        <td align="center">
                                            <input type="radio"  name="E6" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E6" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E6" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center">28.</td>
                                        <td>Merencanakan kegiatan siswa menanya</td>
                                        <td align="center">
                                            <input type="radio"  name="E7" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E7" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E7" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center">29.</td>
                                        <td>Merencanakan kegiatan siswa mengamati</td>
                                        <td align="center">
                                            <input type="radio"  name="E8" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E8" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E8" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center">30.</td>
                                        <td>Merancang kegiatan siswa mencoba</td>
                                        <td align="center">
                                            <input type="radio"  name="E9" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E9" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E9" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center">31.</td>
                                        <td>Merancang  kegiatan siswa menalar atau mengasosiasi (eksplorasi, elaborasi, dan konfirmasi)</td>
                                        <td align="center">
                                            <input type="radio"  name="E10" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E10" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E10" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center">32.</td>
                                        <td>Merancang kegiatan siswa membentuk jejaring atau mengomunikasikan produk penalarannya</td>
                                        <td align="center">
                                            <input type="radio"  name="E11" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E11" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E11" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center">33.</td>
                                        <td>Merangkan kegiatan siswa berkarya atau mencipta</td>
                                        <td align="center">
                                            <input type="radio"  name="E12" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E12" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E12" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center">34.</td>
                                        <td>Mengandung rencana kegiatan tindak lanjut (penugasan, remedial, dan pengayaan)</td>
                                        <td align="center">
                                            <input type="radio"  name="E13" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E13" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="E13" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">F. Penilaian</td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    </tr>
									<tr>
                                        <td align="center">35.</td>
                                        <td>Menilai ketercapain indikator hasil belajar</td>
                                        <td align="center">
                                            <input type="radio"  name="F1" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="F1" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="F1" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center">36.</td>
                                        <td>Mengukur sikap, pengetahuan, dan keterampilan</td>
                                        <td align="center">
                                            <input type="radio"  name="F2" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="F2" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="F2" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center">37.</td>
                                        <td>Merancang penilaian otentik</td>
                                        <td align="center">
                                            <input type="radio"  name="F3" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="F3" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="F3" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center">38.</td>
                                        <td>Meliputi rancangan instrumen tes</td>
                                        <td align="center">
                                            <input type="radio"  name="F4" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="F4" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="F4" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center">39.</td>
                                        <td>Merancang penilai tugas</td>
                                        <td align="center">
                                            <input type="radio"  name="F5" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="F5" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="F5" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center">40.</td>
                                        <td>Menetapkan pedoman penskoran</td>
                                        <td align="center">
                                            <input type="radio"  name="F6" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="F6" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="F6" value="3">
                                        </td>
                                    </tr>
                                </table>
                                <table><input type="submit" name="submit" value="Simpan"></table>
                            </form>
                        </div> <!-- /widget-content -->
                    </div> <!-- /widget -->
                </div> <!-- /span8 -->
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->
</div> <!-- /main -->
<?php include './S_footer.php'; ?>