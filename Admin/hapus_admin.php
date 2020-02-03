<?php
//include file config.php
include 'includes/connector.php';


//jika benar mendapatkan GET id dari URL
if(isset($_GET['ID_ADMIN'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$ID_ADMIN = $_GET['ID_ADMIN'];
	
	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM admin WHERE ID_ADMIN='$ID_ADMIN'") or die(mysqli_error($koneksi));
	
	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE  FROM admin WHERE ID_ADMIN='$ID_ADMIN'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="admin.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="admin.php";</script>';
        }
        }else{
            echo '<script>alert("ID tidak ditemukan di database."); document.location="admin.php";</script>';
        }
    }else{
	echo '<script>alert("ID hhhhhhh ditemukan di database."); document.location="admin.php";</script>';
}

?>