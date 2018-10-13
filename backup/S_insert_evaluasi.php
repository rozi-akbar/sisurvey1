<?php include './S_header.php'; ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">      		

                    <div class="widget ">

                        <div class="widget-header">
                            <i class="icon-reorder"></i>
                            <h3>Masukkan Data Survey Evaluasi</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <?php
                            include './konekDb.php';
                            
                            if (isset($_POST['submit'])) {
                                $query = "INSERT INTO survey3.tbl_s_evaluasi VALUES ("
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
                                        . "'" . $_POST['A7'] . "',"
                                        . "'" . $_POST['A8'] . "',"
                                        . "'" . $_POST['A9'] . "',"
                                        . "'" . $_POST['A10'] . "')";
                                $berhasil = $mysqli->query($query);
                                if ($berhasil) {
                                    echo '<script> alert("Insert data berhasil");
                                                        window.location = "S_insert_evaluasi.php";</script>';
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
                                    <th align="center">Aspek yang dinilai</th>
                                    <th align="center" colspan="5">S K O R</th>
                                    <tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">A. Kompetensi Pedagogik</td>
                                        <td align="center">1</td>
                                        <td align="center">2</td>
                                        <td align="center">3</td>
                                    </tr>
                                    <tr>
                                        <td align="center">1.</td>
                                        <td>Ada Buku Nilai/Daftar Nilai</td>
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
                                        <td>Melaksanakan Tes; UH, MidSem, UAS</td>
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
                                        <td align="center">3.</td>
                                        <td>Penugasan Tersturktur</td>
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
                                        <td>Kegiatan Mandiri Tidak Terstruktur (KMTT)</td>
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
                                        <td>Melaksanakan Penilaian Ketrampilan (Psikomotorik)</td>
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
                                        <td>Melaksanakan Penilaian Afektif Ahlak Mulia</td>
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
                                        <td align="center">7.</td>
                                        <td>Melaksanakan Penilaian Afektif Kepribadian</td>
                                        <td align="center">
                                            <input type="radio"  name="A7" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A7" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A7" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">8.</td>
                                        <td>Program dan Pelaksanaaan Remedial</td>
                                        <td align="center">
                                            <input type="radio"  name="A8" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A8" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A8" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">9.</td>
                                        <td>Analisis Hasil Ulangan</td>
                                        <td align="center">
                                            <input type="radio"  name="A9" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A9" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A9" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">10.</td>
                                        <td>Bank Soal/Instrumen Tes</td>
                                        <td align="center">
                                            <input type="radio"  name="A10" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A10" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="A10" value="3">
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