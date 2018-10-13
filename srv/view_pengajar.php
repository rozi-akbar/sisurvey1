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

        if (isset($instansi)) { // Jika veriabel $instansi ada (user telah mengubah option instansi)
            $sql = "SELECT nip, nama
                    FROM tbl_pengajar
                    WHERE id_jurusan = '" . $instansi . "'
                    ORDER BY nama";
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
                    <a href="input_survey.php?nip=<?php echo $data['nip'] ?>&instansi=<?php echo $instansi ?>" class="btn btn-success">
                        <i class="icon-check"></i> Pilih
                    </a>
                </td>
            </tr>
            <?php
            $no++;
        }
        ?>
    </table>
</div>