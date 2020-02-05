<?php
include 'includes/connector.php';

$ID_DAFTAR = $_GET['ID_DAFTAR'];
$TOTAL_BAYAR = $_GET['TOTAL_BAYAR'];

$query = mysqli_query($koneksi, "UPDATE daftar SET TOTAL_BAYAR = $TOTAL_BAYAR WHERE ID_DAFTAR = '$ID_DAFTAR'");

if($query){
    echo '<script>alert("Berhasil Checkout, Silahkan Tunggu Verifikasi surat rekom untuk melihat pembayaran anda"); document.location="bayar_saya.php";</script>';

}else{
     echo '<script>alert("Gagal Checkout"); document.location="daftar.php";</script>';
}
?>