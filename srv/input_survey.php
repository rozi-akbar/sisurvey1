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
                            <i class="icon-copy"></i>
                            <h3>Jawab Pertanyaan</h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                            <?php
                            if (isset($_POST['submit'])) {
                                $query = "INSERT INTO tbl_rekap_survey VALUES (
                                '" . $_POST['id_jurusan'] . "',
                                '" . $_POST['nip'] . "',
                                '" . $_POST['tahun_akademik'] . "',
                                '" . $_POST['semester_akademik'] . "',
                                '" . $_POST['A1'] . "',
                                '" . $_POST['A2'] . "',
                                '" . $_POST['A3'] . "',
                                '" . $_POST['A4'] . "',
                                '" . $_POST['A5'] . "',
                                '" . $_POST['A6'] . "',
                                '" . $_POST['A7'] . "',
                                '" . $_POST['A8'] . "',
                                '" . $_POST['A9'] . "',
                                '" . $_POST['A10'] . "',
                                '" . $_POST['B1'] . "',
                                '" . $_POST['B2'] . "',
                                '" . $_POST['B3'] . "',
                                '" . $_POST['B4'] . "',
                                '" . $_POST['B5'] . "',
                                '" . $_POST['B6'] . "',
                                '" . $_POST['B7'] . "',
                                '" . $_POST['B8'] . "',
                                '" . $_POST['C1'] . "',
                                '" . $_POST['C2'] . "',
                                '" . $_POST['C3'] . "',
                                '" . $_POST['C4'] . "',
                                '" . $_POST['C5'] . "',
                                '" . $_POST['C6'] . "',
                                '" . $_POST['D1'] . "',
                                '" . $_POST['D2'] . "',
                                '" . $_POST['D3'] . "',
                                '" . $_POST['D4'] . "',
                                '" . $_POST['D5'] . "',
                                '" . $_POST['D6'] . "')";
                                $berhasil = $mysqli->query($query);
                                if ($berhasil) {
                                    echo '<script> alert("Insert data berhasil");
                                    window.location = "input_survey";</script>';
                                } else {
                                    echo '<script> alert("Insert data gagal");</script>';
                                }
                            } else {
                                
                            }
                            ?>
                            <form method="post" name="formsurvey" onsubmit="return validasiSurvey()">
                                <div style="color: blue;"></div>
                                <table border="0">
                                    <tr><td>Instansi Sekolah</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                                echo "<input name='id_jurusan' type='hidden' value='" . $_GET['instansi'] . "'>";

                                                $query = "select nama_jurusan from tbl_jurusan where id_jurusan ='".$_GET['instansi']."'";
                                                $hasil = $mysqli->query($query);
                                                while ($baris = $hasil->fetch_assoc()) {?>
                                                    <input type="text" value="<?php echo $baris['nama_jurusan']; ?>"disabled>
                                            <?php }?>
                                        </td>
                                    </tr>
                                    <tr><td>Nama Pengajar</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                                echo "<input name='nip' type='hidden' value='" . $_GET['nip'] . "'>";

                                                $query = "select nama from tbl_pengajar where nip ='".$_GET['nip']."'";
                                                $hasil = $mysqli->query($query);
                                                while ($baris = $hasil->fetch_assoc()) {?>
                                                    <input type="text" value="<?php echo $baris['nama']; ?>"disabled>
                                            <?php }?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tahun Akademik</td>
                                        <td>:</td>
                                        <td>
                                            <select name="tahun_akademik">
                                                <option value="selected">--Tahun Akademik--</option>
                                                <?php
                                                $sql = "SELECT * FROM tbl_tahun_ajaran ORDER BY id_tahun_ajaran desc";
                                                $result = $mysqli->query($sql);
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . $row['id_tahun_ajaran'] . "'>" . $row['detail'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr><td>Semester Akademik</td>
                                        <td>:</td>
                                        <td>
                                            <select name="semester_akademik">
                                                <option selected="selected">--Semester--</option>
                                                <option value="ganjil">ganjil</option>
                                                <option value="genap">genap</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                                <table border="2" class="table table-striped table-bordered">
                                    <th align="center">No</th>
                                    <th align="center">Aspek yang Diamati</th>
                                    <th align="center" colspan="5">S K O R</th>
                                    <tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique"></td>
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
                                        <td align="center">3.</td>.
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
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique"></td>
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
                                        <td>Penggunaan artikel – artikel ilmiah untuk meningkatkan kualitas perkuliahan</td>
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
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">19.</td>
                                        <td>Kewibawaan sebagai pribadi guru</td>
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
                                        <td>Adil dalam memperlakukan siswa (obyektif)</td>
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
                                        <td>Percaya diri akan kemampuan mengajar</td>
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
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique"></td>
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
                                        <td>keterbukaan menerima kritik dan pendapat dari siswa</td>
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
                                        <td>Mengenal dengan baik siswa yang mengikuti kuliahnya</td>
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
                                        <td>Kesediaan berkomunikasi dengan siswa secara informal</td>
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
                                        <td>Toleransi terhadap keberagaman siswa</td>
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
                                        <td>Mudah bergaul dengan civitas (termasuk dengan siswa)</td>
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
                                <button type="submit" name="submit" class="btn btn-info">Simpan</button>
                            </form>
                        </div> <!-- /widget-content -->
                    </div> <!-- /widget -->
                </div> <!-- /span8 -->
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->
</div> <!-- /main -->
<?php include './footer.php'; ?>