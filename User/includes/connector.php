<?php
//koneksi ke database mysql, silahkan di rubah dengan koneksi agan sendiri
$koneksi = mysqli_connect("localhost", "root", "", "daftar_coba");
// echo "Berhasil Terhubung ke Database simba_iain . . .";
//cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut
if (mysqli_connect_errno()) {
	echo "Gagal Terhubung ke Database simba_iain . . . " . mysqli_connect_error();
}

function autonumber($id_terakhir, $panjang_kode, $panjang_angka)
{

	// mengambil nilai kode ex: USR0015 hasil USR
	$kode = substr($id_terakhir, 0, $panjang_kode);

	// mengambil nilai angka
	// ex: USR0015 hasilnya 0015
	$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);

	// menambahkan nilai angka dengan 1
	// kemudian memberikan string 0 agar panjang string angka menjadi 4
	// ex: angka baru = 6 maka ditambahkan strig 0 tiga kali
	// sehingga menjadi 0006
	$angka_baru = str_repeat("0", $panjang_angka - strlen($angka + 1)) . ($angka + 1);

	// menggabungkan kode dengan nilang angka baru
	$id_baru = $kode . $angka_baru;

	return $id_baru;
}

function numberDaftar()
{
}
