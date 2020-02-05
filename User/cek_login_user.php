<?php

session_start();

include 'includes/connector.php';

$username = $_POST['username-user'];
$password = md5($_POST['password-user']);

$data = mysqli_query($koneksi, "select * from user where NAMA_USER='$username' and PASSWORD_USER='$password'");
$data_user = mysqli_fetch_assoc($data);
$id_user = $data_user['ID_USER'];
$username_user = $data_user['NAMA_USER'];
$row = mysqli_num_rows($data);

if ($row > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['user_login'] = 'login';
    $_SESSION['ID_USER'] = $id_user;
    $_SESSION['NAMA_USER'] = $username_user;
    header('location: index.php?pesan=loginberhasil');
    exit;
} else {
    echo "<script>location.href='index.php?pesan=gagal';</script>";
    exit;
}
