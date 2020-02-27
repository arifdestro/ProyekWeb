<?php
    session_start();
    include 'includes/connector.php';

    $NAMA_USER = $_POST['NAMA_USER'];
    $PASSWORD_USER = $_POST['PASSWORD_USER'];

    $data = mysqli_query($koneksi, "SELECT * FROM user WHERE NAMA_USER='$NAMA_USER' AND PASSWORD_USER='$PASSWORD_USER'");

    $row = mysqli_num_rows($data);

    if($row > 0){
        $data_USER = mysqli_fetch_assoc($data);
        $_SESSION['NAMA_USER'] = $data_USER['NAMA_USER'];
        $_SESSION['user_login'] = 'login';
        $_SESSION['ID_USER'] = $data_USER['ID_USER'];

        echo '<script>alert("Login Berhasil, anda dapat mengakses fitur pendaftaran."); document.location="pendaftaran_saya.php";</script>';
    }else{
        echo '<script>alert("Login Gagal, Periksa username dan password anda kembali."); document.location="index.php";</script>';
    }

?>