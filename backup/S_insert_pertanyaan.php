<?php include './S_header.php'; ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">      		

                    <div class="widget ">

                        <div class="widget-header">
                            <i class="icon-reorder"></i>
                            <h3>Masukkan Data Survey</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <?php
                            include './konekDb.php';
                            
                            if (isset($_POST['submit'])) {
                                $query = "INSERT INTO survey3.tbl_pertanyaan VALUES ("
                                        . "'" . $_POST['instansi'] . "',"
                                        . "'" . $_POST['pengajar'] . "',"
                                        . "'" . $_POST['tahun_akademik'] . "',"
                                        . "'" . $_POST['semester_akademik'] . "',"
                                        . "'" . $_POST['A1'] . "',"
                                        . "'" . $_POST['A2'] . "',"
                                        . "'" . $_POST['A3'] . "',"
                                        . "'" . $_POST['A4'] . "',"
                                        . "'" . $_POST['A5'] . "',"
                                        . "'" . $_POST['A6'] . "',"
                                        . "'" . $_POST['A7'] . "',"
                                        . "'" . $_POST['A8'] . "',"
                                        . "'" . $_POST['A9'] . "',"
                                        . "'" . $_POST['A10'] . "',"
                                        . "'" . $_POST['B1'] . "',"
                                        . "'" . $_POST['B2'] . "',"
                                        . "'" . $_POST['B3'] . "',"
                                        . "'" . $_POST['B4'] . "',"
                                        . "'" . $_POST['B5'] . "',"
                                        . "'" . $_POST['B6'] . "',"
                                        . "'" . $_POST['B7'] . "',"
                                        . "'" . $_POST['B8'] . "',"
                                        . "'" . $_POST['C1'] . "',"
                                        . "'" . $_POST['C2'] . "',"
                                        . "'" . $_POST['C3'] . "',"
                                        . "'" . $_POST['C4'] . "',"
                                        . "'" . $_POST['C5'] . "',"
                                        . "'" . $_POST['C6'] . "',"
                                        . "'" . $_POST['D1'] . "',"
                                        . "'" . $_POST['D2'] . "',"
                                        . "'" . $_POST['D3'] . "',"
                                        . "'" . $_POST['D4'] . "',"
                                        . "'" . $_POST['D5'] . "',"
                                        . "'" . $_POST['D6'] . "')";
                                $berhasil = $mysqli->query($query);
                                if ($berhasil) {
                                    echo '<script> alert("Insert data berhasil");
                                                        window.location = "S_insert_pertanyaan.php";</script>';
                                } else {
                                    echo '<script> alert("Insert data gagal");</script>';
                                }
                            } else {
                                
                            }
                            ?>
                            <form method="post">
                                <table border="0">
                                    <tr><td>Nama Jurusan</td><td>:</td><td>
                                            <select class="input-medium" name="instansi">
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
                                    <th align="center">Aspek yang dinilai</th>
                                    <th align="center" colspan="5">S K O R</th>
                                    <tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">A. Kompetensi Pedagogik</td>
                                        <td align="center">1</td>
                                        <td align="center">2</td>
                                        <td align="center">3</td>
                                        <td align="center">4</td>
                                        <td align="center">5</td>
                                    </tr>
                                    <tr>
                                        <td align="center">1.</td>
                                        <td>Kesiapan memberikan kuliah dan/atau praktek/praktikum</td>
                                        <td align="center">
                                            <input type="radio"  name="A1" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A1" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A1" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A1" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A1" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">2.</td>
                                        <td>Keteraturan dan ketertiban penyelenggaraan perkuliahan</td>
                                        <td align="center">
                                            <input type="radio"  name="A2" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A2" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A2" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A2" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A2" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">3.</td>
                                        <td>Hadir tepat waktu</td>
                                        <td align="center">
                                            <input type="radio"  name="A3" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A3" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A3" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A3" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A3" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">4.</td>
                                        <td>Tatap muka sesuai SKS (1 sks : 50 menit)</td>
                                        <td align="center">
                                            <input type="radio"  name="A4" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A4" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A4" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A4" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A4" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">5.</td>
                                        <td>Kemampuan menghidupkan suasana kelas</td>
                                        <td align="center">
                                            <input type="radio"  name="A5" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A5" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A5" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A5" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A5" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">6.</td>
                                        <td>Kejelasan penyampaian materi dan jawaban terhadap pertanyaan di kelas</td>
                                        <td align="center">
                                            <input type="radio"  name="A6" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A6" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A6" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A6" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A6" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">7.</td>
                                        <td>Pemanfaatan media dan teknologi pembelajaran</td>
                                        <td align="center">
                                            <input type="radio"  name="A7" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A7" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A7" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A7" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A7" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">8.</td>
                                        <td>Keanekaragaman cara pengukuran hasil belajar</td>
                                        <td align="center">
                                            <input type="radio"  name="A8" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A8" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A8" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A8" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A8" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">9.</td>
                                        <td>Pemberian umpan balik terhadap tugas</td>
                                        <td align="center">
                                            <input type="radio"  name="A9" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A9" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A9" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A9" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A9" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">10.</td>
                                        <td>Nilai diberikan secara obyektif</td>
                                        <td align="center">
                                            <input type="radio"  name="A10" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A10" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A10" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A10" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A10" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">B. Kompetensi Profesional</td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">11.</td>
                                        <td>Kemampuan menjelaskan pokok bahasan/topik secara tepat</td>
                                        <td align="center">
                                            <input type="radio"  name="B1" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B1" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B1" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B1" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B1" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">12.</td>
                                        <td>Kemampuan memberi contoh relevan dari konsep yang diajarkan</td>
                                        <td align="center">
                                            <input type="radio"  name="B2" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B2" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B2" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B2" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B2" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">13.</td>
                                        <td>Kemampuan menjelaskan keterkaitan bidang/topik yang diajarkan dengan bidang/topik lain</td>
                                        <td align="center">
                                            <input type="radio"  name="B3" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B3" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B3" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B3" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B3" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">14.</td>
                                        <td>Kemampuan menjelaskan keterkaitan bidang/topik yang diajarkan dengan konteks kehidupan</td>
                                        <td align="center">
                                            <input type="radio"  name="B4" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B4" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B4" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B4" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B4" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">15.</td>
                                        <td>Penguasaan akan isu-isu mutakhir dalam bidang yang diajarkan</td>
                                        <td align="center">
                                            <input type="radio"  name="B5" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B5" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B5" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B5" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B5" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">16.</td>
                                        <td>Penggunaan artikel - artikel ilmiah untuk meningkatkan kualitas perkuliahan</td>
                                        <td align="center">
                                            <input type="radio"  name="B6" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B6" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B6" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B6" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B6" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">17.</td>
                                        <td>Menggunakan buku referensi yang terbaru</td>
                                        <td align="center">
                                            <input type="radio"  name="B7" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B7" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B7" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B7" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B7" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">18.</td>
                                        <td>Kemampuan menggunakan beragam tekhnologi informasi yang menunjang proses pembelajaran</td>
                                        <td align="center">
                                            <input type="radio"  name="B8" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B8" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B8" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B8" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="B8" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">C. Kompetensi Kepribadian</td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">19.</td>
                                        <td>Kewibawaan sebagai pribadi dosen</td>
                                        <td align="center">
                                            <input type="radio"  name="C1" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C1" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C1" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C1" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C1" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">20.</td>
                                        <td>Menjadi contoh dalam bersikap dan berperilaku</td>
                                        <td align="center">
                                            <input type="radio"  name="C2" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C2" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C2" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C2" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C2" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">21.</td>
                                        <td>Konsistensi antara kata dan tindakan</td>
                                        <td align="center">
                                            <input type="radio"  name="C3" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C3" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C3" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C3" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C3" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">22.</td>
                                        <td>Kemampuan mengendalikan diri dalam berbagai situasi dan kondisi</td>
                                        <td align="center">
                                            <input type="radio"  name="C4" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C4" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C4" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C4" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C4" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">23.</td>
                                        <td>Adil dalam memperlakukan mahasiswa (obyektif)</td>
                                        <td align="center">
                                            <input type="radio"  name="C5" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C5" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C5" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C5" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C5" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">24.</td>
                                        <td>Percaya diri akan kemampuan mengajar </td>
                                        <td align="center">
                                            <input type="radio"  name="C6" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C6" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C6" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C6" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C6" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">C. Kompetensi Kepribadian</td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">25.</td>
                                        <td>Kemampuan menyampaikan materi perkuliahan</td>
                                        <td align="center">
                                            <input type="radio"  name="D1" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D1" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D1" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D1" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D1" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">26.</td>
                                        <td>keterbukaan menerima kritik dan pendapat dari mahasiswa</td>
                                        <td align="center">
                                            <input type="radio"  name="D2" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D2" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D2" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D2" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D2" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">27.</td>
                                        <td>Mengenal dengan baik mahasiswa yang mengikuti kuliahnya</td>
                                        <td align="center">
                                            <input type="radio"  name="D3" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D3" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D3" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D3" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D3" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">28.</td>
                                        <td>Kesediaan berkomunikasi dengan mahasiswa secara informal</td>
                                        <td align="center">
                                            <input type="radio"  name="D4" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D4" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D4" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D4" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D4" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">29.</td>
                                        <td>Toleransi terhadap keberagaman mahasiswa</td>
                                        <td align="center">
                                            <input type="radio"  name="D5" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D5" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D5" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D5" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D5" value="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">30.</td>
                                        <td>Mudah bergaul dengan civitas (termasuk dengan mahasiswa)</td>
                                        <td align="center">
                                            <input type="radio"  name="D6" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D6" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D6" value="3">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D6" value="4">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D6" value="5">
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