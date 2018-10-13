<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>NIP</th>
            <th>NAMA</th>
            <th>OPTION</th>
        </tr>
        <?php
        include "../config/konekDb.php";

        if (isset($tahun)) { // Jika veriabel $tahun ada (user telah mengubah option tahun)
            $sql = "SELECT 1st.nip, 2nd.nama
                    FROM tbl_rekap_survey 1st
                    JOIN tbl_pengajar 2nd 
                    ON 2nd.nip = 1st.nip
                    WHERE 1st.tahun_akademik ='" . $tahun . "' 
                    AND 1st.semester_akademik = '" . $semester . "' 
                    AND 1st.id_jurusan = '" . $instansi . "'
                    GROUP BY 1st.nip";
            $result = $mysqli->query($sql); // Eksekusi querynya
        } else { // Jika user belum mengklik tombol search
            ?>
            <tr>
                <td colspan="4" style="text-align: center"><h3>PILIH DATA TERLEBIH DAHULU</h3></td>
            </tr>
            <?php
        }

        $no = 1;
        while ($data = $result->fetch_assoc()) {
            ?>
            <tr>
                <td style="text-align: center;"><?php echo $no; ?></td>
                <td><?php echo $data['nip']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td style="text-align: center;">
                    <a href="K_view.php?nip=<?php echo $data['nip'] ?>&instansi=<?php echo $instansi ?>&tahun=<?php echo $tahun ?>&semester=<?php echo $semester ?>" class="btn btn-success">
                        <i class="icon-info-sign"></i>View
                    </a>
                </td>
            </tr>
            <?php
            $no++;
        }
        ?>
    </table>
</div>