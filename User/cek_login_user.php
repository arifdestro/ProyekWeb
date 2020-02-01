<?php
    session_start();

    include 'includes/connector.php';

    $NAMA_USER = $_POST['NAMA_USER'];
    $PASSWORD_USER = $_POST['PASSWORD_USER'];

    $data = mysqli_query($koneksi, "SELECT * FROM user where NAMA_USER='$NAMA_USER' and PASSWORD_USER='$PASSWORD_USER'");
    $data_user = mysqli_fetch_assoc($data);
    $ID_USER = $data_user['ID_USER'];
    $row = mysqli_num_rows($data);

    if($row > 0){
        $_SESSION['NAMA_USER'] = $NAMA_USER;
        $_SESSION['USER_LOGIN'] = 'login';
        $_SESSION['ID_USER'] = $ID_USER;
        
        header("location:daftar.php?pesan=loginberhasil");
    }else{
        header("location:daftar.php?pesan=logingagal");
    }

?>