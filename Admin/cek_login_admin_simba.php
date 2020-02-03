<?php
    session_start();

    include 'includes/connector.php';

    $NAMA_ADMIN = $_POST['NAMA_ADMIN'];
    $PASSWORD_ADMIN = $_POST['PASSWORD_ADMIN'];

    $data = mysqli_query($koneksi, "SELECT * FROM admin where NAMA_ADMIN='$NAMA_ADMIN' and PASSWORD_ADMIN='$PASSWORD_ADMIN'");
    $data_admin = mysqli_fetch_assoc($data);
    $ID_ADMIN = $data_admin['ID_ADMIN'];
    $row = mysqli_num_rows($data);

    if($row > 0){
        $_SESSION['NAMA_ADMIN'] = $NAMA_ADMIN;
        $_SESSION['admin_login'] = 'login';
        $_SESSION['ID_ADMIN'] = $ID_ADMIN;
        
        header("location:index.php?pesan=loginberhasil");
    }else{
        header("location:index.php?pesan=gagal");
    }

?>