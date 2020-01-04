<?php
//koneksi ke database mysql, silahkan di rubah dengan koneksi agan sendiri
$koneksi = mysqli_connect("localhost","root","","simba_iain");
echo "Berhasil Terhubung ke Database simba_iain . . .";
//cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut
if (mysqli_connect_errno()){
	echo "Gagal Terhubung ke Database simba_iain . . . " . mysqli_connect_error();
}
?>