<?php include './S_header.php'; ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">      		

                    <div class="widget ">

                        <div class="widget-header">
                            <i class="icon-reorder"></i>
                            <h3>Masukkan Data Survey Pelaksanaan</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <?php
                            include './konekDb.php';
                            
                            if (isset($_POST['submit'])) {
                                $query = "INSERT INTO survey3.tbl_s_pelaksanaan VALUES ("
                                        . "'" . $_POST['id_jurusan'] . "',"
                                        . "'" . $_POST['pengajar'] . "',"
                                        . "'" . $_POST['tahun_akademik'] . "',"
                                        . "'" . $_POST['semester_akademik'] . "',"
                                        . "'" . $_POST['A1'] . "',"
                                        . "'" . $_POST['A2'] . "',"
                                        . "'" . $_POST['A3'] . "',"
                                        . "'" . $_POST['A4'] . "',"
                                        . "'" . $_POST['B1'] . "',"
                                        . "'" . $_POST['B2'] . "',"
                                        . "'" . $_POST['C1'] . "',"
                                        . "'" . $_POST['C2'] . "',"
                                        . "'" . $_POST['C3'] . "',"
                                        . "'" . $_POST['C4'] . "',"
                                        . "'" . $_POST['C5'] . "',"
                                        . "'" . $_POST['C6'] . "',"
										. "'" . $_POST['C7'] . "',"
										. "'" . $_POST['C8'] . "',"
										. "'" . $_POST['C9'] . "',"
										. "'" . $_POST['C10'] . "',"
										. "'" . $_POST['C11'] . "',"
										. "'" . $_POST['C12'] . "',"
										. "'" . $_POST['C13'] . "',"
										. "'" . $_POST['C14'] . "',"
										. "'" . $_POST['C15'] . "',"
										. "'" . $_POST['C16'] . "',"
										. "'" . $_POST['C17'] . "',"
										. "'" . $_POST['C18'] . "',"
										. "'" . $_POST['C19'] . "',"
										. "'" . $_POST['C20'] . "',"
										. "'" . $_POST['C21'] . "',"
										. "'" . $_POST['C22'] . "',"
										. "'" . $_POST['C23'] . "',"
                                        . "'" . $_POST['D1'] . "',"
                                        . "'" . $_POST['D2'] . "',"
                                        . "'" . $_POST['D3'] . "',"
                                        . "'" . $_POST['D4'] . "',"
                                        . "'" . $_POST['D5'] . "',"
										. "'" . $_POST['E1'] . "',"
                                        . "'" . $_POST['E2'] . "',"
                                        . "'" . $_POST['E3'] . "',"
										. "'" . $_POST['F1'] . "',"
                                        . "'" . $_POST['F2'] . "',"
                                        . "'" . $_POST['F3'] . "',"
                                        . "'" . $_POST['F4'] . "',"
                                        . "'" . $_POST['F5'] . "')";
                                $berhasil = $mysqli->query($query);
                                if ($berhasil) {
                                    echo '<script> alert("Insert data berhasil");
                                                        window.location = "S_insert_pelaksanaan.php";</script>';
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
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">A. Apersepsi dan Motivasi</td>
                                        <td align="center">1</td>
                                        <td align="center">2</td>
                                        <td align="center">3</td>
                                    </tr>
                                    <tr>
                                        <td align="center">1.</td>
                                        <td>Mengaitkan materi pembelajaran sekarang dengan pengalaman peserta didik atau pembelajaran sebelumnya</td>
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
                                        <td>Mengajukan pertanyaan menantang</td>
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
                                        <td>Menyampaikan manfaat materi pembelajaran</td>
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
                                        <td>Mendemonstrasikan sesuatu yang terkait dengan materi pembelajaran</td>
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
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">B. Penyampaian Kompetensi dan Rencana Kegiatan</td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">5.</td>
                                        <td>Menyampaikan kemampuan yang akan dicapai peserta didik</td>
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
                                        <td align="center">6.</td>
                                        <td>Menyampaikan rencana kegiatan misalnya, individual, kerja kelompok, dan melakukan observasi</td>
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
                                        <td align="center">7.</td>
                                        <td>Kemampuan menyesuiakan materi dengan tujuan pembelajaran</td>
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
                                        <td align="center">8.</td>
                                        <td>Kemampuan mengkaitkan materi dengan pengetahuan lain yang relevan,  perkembangan Iptek , dan kehidupan nyata</td>
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
                                        <td align="center">9.</td>
                                        <td>Menyajikan pembahasan materi pembelajaran dengan tepat</td>
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
                                        <td align="center">10.</td>
                                        <td>Menyajikan materi secara sistematis  (mudah ke sulit, dari konkrit ke abstrak)</td>
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
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">Penerapan Strategi Pembelajaran yang Mendidik</td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">11.</td>
                                        <td>Melaksanakan pembelajaran sesuai dengan kompetensi yang akan dicapai</td>
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
                                        <td align="center">12.</td>
                                        <td>Menfasilitasi kegiatan yang memuat komponen eksplorasi, elaborasi dan konfirmasi</td>
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
                                        <td align="center">13.</td>
                                        <td>Melaksanakan pembelajaran secara runtut</td>
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
                                        <td align="center">14.</td>
                                        <td>Menguasai kelas</td>
                                        <td align="center">
                                            <input type="radio"  name="C8" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C8" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C8" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">15.</td>
                                        <td>Melaksanakan pembelajaran yang bersifat kontekstual</td>
                                        <td align="center">
                                            <input type="radio"  name="C9" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C9" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C9" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">16.</td>
                                        <td>Melaksanakan pembelajaran yang memungkinkan tumbuhnya kebiasaan positif (nurturant effect)</td>
                                        <td align="center">
                                            <input type="radio"  name="C10" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C10" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C10" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">17.</td>
                                        <td>Memberikan pertanyaan mengapa dan bagaimana</td>
                                        <td align="center">
                                            <input type="radio"  name="C11" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C11" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C11" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">Penerapan Pendekatan scientific</td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">18.</td>
                                        <td>Memberikan pertanyaan mengapa dan bagaimana</td>
                                        <td align="center">
                                            <input type="radio"  name="C12" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C12" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C12" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">19.</td>
                                        <td>Memfasilitasi peserta didik untuk mengamati</td>
                                        <td align="center">
                                            <input type="radio"  name="C13" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C13" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C13" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">20.</td>
                                        <td>Memancing peserta didik untuk bertanya</td>
                                        <td align="center">
                                            <input type="radio"  name="C14" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C14" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C14" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">21.</td>
                                        <td>Memfasilitasi peserta didik untuk mencoba</td>
                                        <td align="center">
                                            <input type="radio"  name="C15" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C15" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C15" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">22.</td>
                                        <td>Memfasilitasi peserta didik untuk menganalisis</td>
                                        <td align="center">
                                            <input type="radio"  name="C16" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C16" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C16" value="3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">23.</td>
                                        <td>Memberikan pertanyaan peserta didik untuk menalar (proses berfikir yang logis dan sistematis)</td>
                                        <td align="center">
                                            <input type="radio"  name="C17" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C17" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C17" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center">24.</td>
                                        <td>Menyajikan kegiatan peserta didik untuk berkomunikasi</td>
                                        <td align="center">
                                            <input type="radio"  name="C18" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C18" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C18" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">Pemanfaatan Sumber Belajar/Media dalam Pembelajaran</td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    </tr>
									<tr>
                                        <td align="center">25.</td>
                                        <td>Menunjukkan keterampilan dalam penggunaan sumber belajar pembelajaran</td>
                                        <td align="center">
                                            <input type="radio"  name="C19" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C19" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C19" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center">26.</td>
                                        <td>Menunjukkan keterampilan dalam penggunaan media pembelajaran</td>
                                        <td align="center">
                                            <input type="radio"  name="C20" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C20" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C20" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center">27.</td>
                                        <td>Menghasilkan pesan yang menarik</td>
                                        <td align="center">
                                            <input type="radio"  name="C21" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C21" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C21" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center">28.</td>
                                        <td>Melibatkan peserta didik dalam pemanfaatan sumber belajar pembelajaran</td>
                                        <td align="center">
                                            <input type="radio"  name="C22" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C22" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C22" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center">29.</td>
                                        <td>Melibatkan peserta didik dalam pemanfaatan media pembelajaran</td>
                                        <td align="center">
                                            <input type="radio"  name="C23" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C23" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="C23" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">D. Pelibatan Peserta Didik dalam Pembelajaran</td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    </tr>
									<tr>
                                        <td align="center">30.</td>
                                        <td>Menumbuhkan partisipasi aktif peserta didik melalui interaksi guru, peserta didik, sumber belajar</td>
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
                                        <td align="center">31.</td>
                                        <td>Merespon positif partisipasi peserta didik</td>
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
                                        <td align="center">32.</td>
                                        <td>Menunjukkan sikap terbuka terhadap respons peserta didik</td>
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
                                        <td align="center">33.</td>
                                        <td>Menunjukkan hubungan antar pribadi yang kondusif</td>
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
                                        <td align="center">34.</td>
                                        <td>Menumbuhkan keceriaan atau antuisme peserta didik dalam belajar</td>
                                        <td align="center">
                                            <input type="radio"  name="D5" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D5" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="D5" value="3">
                                        </td>
                                    </tr>
									<tr>
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">E. Melaksanakan Penilaian Autentik</td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    </tr>
									<tr>
                                        <td align="center">35.</td>
                                        <td>Menilai sikap dalam pembelajaran</td>
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
                                        <td align="center">36.</td>
                                        <td>Menilai pengetahuan dalam proses pembelajaran</td>
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
                                        <td align="center">37.</td>
                                        <td>Menilai pengetahuan dalam proses pembelajaran</td>
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
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">F. Penggunaan Bahasa yang Benar dan Tepat dalam Pembelajaran</td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    </tr>
									<tr>
                                        <td align="center">38.</td>
                                        <td>Menggunakan bahasa lisan secara jelas dan lancar</td>
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
                                        <td align="center">39.</td>
                                        <td>Menggunakan bahasa tulis yang baik dan benar</td>
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
                                        <td align="center" colspan="2" style="text-align: left; font-style: oblique">F. Penutup pembelajaran</td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                    </tr>
									<tr>
                                        <td align="center">40.</td>
                                        <td>Melakukan refleksi atau membuat rangkuman dengan melibatkan peserta didik</td>
                                        <td align="center">
                                            <input type="radio"  name="F3" value="1">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="F3" value="2">
                                        </td>
                                        <td align="center">
                                            <input type="radio"  name="F3" value="3">
                                        </td>
										
									<tr>
                                        <td align="center">41.</td>
                                        <td>Mengumpulkan hasil kerja sebagai bahan portofolio</td>
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
                                        <td align="center">42.</td>
                                        <td>Melaksanakan tindak lanjut dengan memberikan arahan kegiatan berikutnya dan tugas pengayaan</td>
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