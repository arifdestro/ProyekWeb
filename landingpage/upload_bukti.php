<?php

include 'includes/connector.php';

if (isset(upload_bukti)) {
    $ID_BAYAR=$_POST['ID_BAYAR'];
    $BUKTI_BAYAR=$_POST['BUKTI_BAYAR'];

    $ekstensi_boleh = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'); //ekstensi file yang boleh diupload
    $nama = $_FILES['BUKTI_BAYAR']['name']; //menunjukkan letak dan nama file yang akan di upload
    $ex = explode('.', $nama); //explode berfungsi memecahkan/memisahkan string sesuai dengan tanda baca yang ditentukan
    $ekstensi = strtolower(end($ex)); //end = mengambil nilai terakhir dari ex, dtrtolower = memanipulasi string menjadi huruf kecil 
    $size = $_FILES['BUKTI_BAYAR']['size']; //untuk mendapatkan size file yang diupload
    $file_temporary = $_FILES['BUKTI_BAYAR']['tmp_name']; //untuk mendapatkan temporary file yang di upload

    if (in_array($ekstensi, $ekstensi_boleh) === true) {
        if ($size < 31322100 && $size != 0) {
            $id = rand(0, 100);
            $uniq = uniqid($id, true);
            move_uploaded_file($file_temporary, 'src/bukti_bayar/' . $uniq . '.' . $ekstensi);
            
            $query="UPDATE bayar SET BUKTI_BAYAR='$BUKTI_BAYAR'";

            if ($query) {
                echo '<script>alert("Berhasil menambahkan data peserta"); document.location="pendaftaran_saya.php";</script>';
                } else {
                    echo '<script>alert("Gagal menambahkan data peserta"); document.location="pendaftaran_saya.php";</script>';
                    }
            } else {
                echo '<script>alert("Gagal menambahkan data peserta, Foto maksimal 3MB"); document.location="pendaftaran_saya.php";</script>';
            }
        } else {
            echo '<script>alert("Foto harus berformat .JPG, .PNG, .JPEG, .jpg, .jpeg, .png"); document.location="pendaftaran_saya.php";</script>';
            }
}

?>