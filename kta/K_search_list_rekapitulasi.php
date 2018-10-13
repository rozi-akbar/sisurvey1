<?php
$tahun = $_POST['tahun']; // Ambil data tahun yang dikirim dengan AJAX
$semester = $_POST['semester'];
$instansi = $_POST['instansi'];

// Load view.php
ob_start();
include "K_view_rekapitulasi.php";
$html = ob_get_contents(); // Masukan isi dari view.php ke dalam variabel $html
ob_end_clean();

// Buat array dengan index hasil dan value nya $html
// Lalu konversi menjadi JSON
echo json_encode(array('hasil'=>$html));
?>