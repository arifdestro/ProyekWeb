<?php
//include file config.php
include 'includes/connector.php';

//jika benar mendapatkan GET id dari URL
if(isset($_GET['ID_BERITA'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$ID_BERITA = $_GET['ID_BERITA'];
	
	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM berita WHERE ID_BERITA='$ID_BERITA'") or die(mysqli_error($koneksi));
	
	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM berita WHERE ID_BERITA='$ID_BERITA'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="berita.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="berita.php";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="berita.php";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="berita.php";</script>';
}

?>