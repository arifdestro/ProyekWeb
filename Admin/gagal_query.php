<?php
include 'includes/connector.php';
if (isset($_GET['ID_DAFTAR'])) {
    $ID_DAFTAR = $_GET['ID_DAFTAR'];
    $data = mysqli_query($koneksi, "SELECT daftar.ID_DAFTAR, daftar.STATUS_BAYAR, bayar.ID_BAYAR, bayar.BUKTI_BAYAR
    FROM daftar, bayar
    WHERE 
    daftar.ID_DAFTAR=bayar.ID_DAFTAR
    AND daftar.ID_DAFTAR='$ID_DAFTAR'");
    $data_transaksi = mysqli_fetch_array($data);
    $ID_DAFTAR = $data_transaksi['ID_DAFTAR'];
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'delete') {
            $result = mysqli_query($koneksi, "DELETE FROM bayar WHERE bayar.ID_DAFTAR='$ID_DAFTAR'");
            $result = mysqli_query($koneksi, "UPDATE daftar SET daftar.STATUS_BAYAR='Belum Bayar' WHERE ID_DAFTAR='$ID_DAFTAR'");
            header("location: bayar.php");
        }
    }
}