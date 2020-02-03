<?php

session_start();

include 'includes/connector.php';

$username = $_POST['username-user'];
$password = md5($_POST['password-user']);

$data = mysqli_query($con, "select * from user where NAMA_USER='$username' and PASSWORD_USER='$password'");
$data_user = mysqli_fetch_assoc($data);
// $status_admin = $data_admin['STATUS_MITRA'];
$id_user = $data_user['ID_USER'];
$row = mysqli_num_rows($data);

if ($row > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['user_login'] = 'login';
    // $_SESSION['admin_status'] = $status_admin;
    $_SESSION['id_user'] = $id_user;
    header("location:index.php?pesan=loginberhasil");
} else {
    header("location:index.php?pesan=gagal");
}
