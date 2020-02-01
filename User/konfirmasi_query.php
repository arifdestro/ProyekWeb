<?php

include 'includes/connector.php';

if(isset($_POST['konfir_pembayaran'])){

    $id_daftar = $_POST['ID_DAFTAR'];
    $ekstensi_boleh = array('png','jpg','jpeg','PNG','JPG','JPEG'); //ekstensi file yang boleh diupload
    $nama = $_FILES['file']['name']; //menunjukkan letak dan nama file yang akan di upload
    $ex = explode ('.',$nama); //explode berfungsi memecahkan/memisahkan string sesuai dengan tanda baca yang ditentukan
    $ekstensi = strtolower(end($ex)); //end = mengambil nilai terakhir dari ex, dtrtolower = memanipulasi string menjadi huruf kecil 
    $ukuran = $_FILES['file']['size']; //untuk mendapatkan ukuran file yang diupload
    $file_temporary = $_FILES['file']['tmp_name']; //untuk mendapatkan temporary file yang di upload
        if(in_array($ekstensi,$ekstensi_boleh)===true){
            if($ukuran < 10132210 && $ukuran != 0){ 
                $id = rand(0,100);
                $uniq = uniqid($id,true);
                move_uploaded_file($file_temporary, 'pictures/bukti_transfer/'.$uniq.'.'.$ekstensi); //untuk upload file
                // $query = mysqli_query ($con, "SELECT * FROM user");
                $query = mysqli_query ($con, "UPDATE bayar SET BUKTI_TRANSFER='$uniq.$ekstensi' WHERE ID_DAFTAR='$id_daftar'");
                    if($query) {
                        header("location:bayar_saya.php");
                    }else{
                        header("location:konfirmasi_bayar.php?ID_DAFTAR=$id_daftar");
                    }
            }else{
                header("location:konfirmasi_bayar.php?ID_DAFTAR=$id_daftar");
            }
        }else{
            header("location:konfirmasi_bayar.php?ID_DAFTAR=$id_daftar");
        }
}