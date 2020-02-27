<?php
//koneksi ke database mysql, silahkan di rubah dengan koneksi agan sendiri
$koneksi = mysqli_connect("localhost","root","","simba_iain");
//echo "Terhubung ke database. . .";
//cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut
if (mysqli_connect_errno()){
echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}
?>