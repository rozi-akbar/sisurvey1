<?php

session_start();
include './konekDb.php';

$userid = $_POST['username'];
$psw = $_POST['password'];
$op = $_GET['op'];

if ($op == "in") {
    $result = $mysqli->query("SELECT id_user, level FROM tbl_user WHERE username = '$userid' AND password = '$psw'");
    
    if ($result->num_rows == 1) {//jika berhasil akan bernilai 1
        $c = $result->fetch_array(MYSQLI_ASSOC);
        $_SESSION['id_user'] = $c['id_user'];
        $_SESSION['level'] = $c['level'];
        if ($c['level'] == "admin") {
            header("location:../adm/dashboard");
        } else if ($c['level'] == "ketua") {
            header("location:../kta/dashboard");
        } else if ($c['level'] == "surveyor") {
            header("location:../srv/dashboard");
        }
    } else {
        echo '<script> alert("Username atau Password salah");'
        . 'window.location = "../login";</script>';
    }
} else if ($op == "out") {
    unset($_SESSION['id_user']);
    unset($_SESSION['level']);
    header("location:../login");
}
?>