<?php
include 'includes/connector.php';

if(isset($_GET['NO_PESERTA'])){
    $NO_PESERTA = $_GET['NO_PESERTA'];

    $cek = mysqli_query($koneksi, "SELECT * FROM detail_daftar WHERE NO_PESERTA='$NO_PESERTA'") or die(mysqli_error($koneksi));
    if(mysqli_num_rows($cek) > 0){
        $del2= mysqli_query($koneksi, "DELETE FROM detail_daftar WHERE NO_PESERTA='$NO_PESERTA'");
		echo '<script>alert("Berhasil menghapus data Siswa"); document.location="pendaftaran_saya.php";</script>';
    }else{
        echo '<script>alert("Gagal menghapus data siswa"); document.location="pendaftaran_saya.php";</script>';
    }

}

?>