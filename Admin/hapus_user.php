<?php
//include file config.php
include 'includes/connector.php';

//jika benar mendapatkan GET id dari URL
if(isset($_GET['ID_USER'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$ID_USER = $_GET['ID_USER'];
	
	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM user WHERE ID_USER='$ID_USER'") or die(mysqli_error($koneksi));
	
	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM user WHERE ID_USER='$ID_USER'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="user.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="user.php";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="user.php";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="user.php";</script>';
}

?>