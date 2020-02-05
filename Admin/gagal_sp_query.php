<?php
include 'includes/connector.php';
if (isset($_GET['ID_DAFTAR'])) {
    $ID_DAFTAR = $_GET['ID_DAFTAR'];
    $data = mysqli_query($koneksi, "SELECT * FROM daftar WHERE ID_DAFTAR='$ID_DAFTAR'");
    $data_transaksi = mysqli_fetch_array($data);
    $ID_DAFTAR = $data_transaksi['ID_DAFTAR'];
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'update') {
            $result = mysqli_query($koneksi, "UPDATE daftar SET daftar.STATUS_BAYAR='Belum Bayar' WHERE ID_DAFTAR='$ID_DAFTAR'");
            header("location: bayar_sp.php");
        }
    }
}
    // $datay = mysqli_query($koneksi, "SELECT bayar.BUKTI_BAYAR FROM bayar WHERE daftar.ID_DAFTAR=bayar.ID_DAFTAR AND daftar.ID_DAFTAR='$ID_DAFTAR'");
    // $data_transaksi2 = mysqli_fetch_array($datay);
    // $ID_DAFTAR = $data_transaksi2['ID_DAFTAR'];
    // if (isset($_GET['action'])) {
    //     if ($_GET['action'] == 'update') {
    //         $result2 = mysqli_query($koneksi, "UPDATE bayar SET bayar.BUKTI_BAYAR='aaaa.jpg' WHERE ID_DAFTAR='$ID_DAFTAR'");
    //         header("location: bayar_sp.php");
    //     }
    // }


