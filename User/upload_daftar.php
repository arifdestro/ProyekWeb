<?php

include 'includes/connector.php';

if(isset($_POST['signup_submit'])){

    $ID_JENIS_LOMBA=$_POST['ID_JENIS_LOMBA'];
    //var_dump($ID_JENIS_LOMBA);

    date_default_timezone_set('Asia/Jakarta');
    $TANGGAL_DAFTAR=date('Y-m-d H:i:s');
    // var_dump($TANGGAL_DAFTAR);

    if($ID_JENIS_LOMBA=='J0001'){
        $SURAT_REKOM=$_FILES['SURAT_REKOM'];
        //$ID_DAFTAR= $_POST['ID_DAFTAR'];
        $data2 = mysqli_query($koneksi, "SELECT ID_DAFTAR FROM daftar ORDER BY ID_DAFTAR DESC LIMIT 1");
        while($data_daftar = mysqli_fetch_assoc($data2))
        {
        $dft_id = $data_daftar['ID_DAFTAR'];
        }

    $row2 = mysqli_num_rows($data2);
    if($row2>0){
      $ID_DAFTAR = autonumber($dft_id, 1, 4);
    }else{
      $ID_DAFTAR = 'D0001';
    }

        $ID_USER = $_POST['ID_USER'];
        $ID_RAYON = $_POST['ID_RAYON'];
        $ID_ADMIN= 'A0001';
        $NPSN = $_POST['NPSN'];
        
        
        $STATUS_REKOM= 'Belum Terverifikasi';
        $STATUS_FILE='Belum Terverifikasi';
        $STATUS_BAYAR= 'Belum Bayar';
        $TOTAL_BAYAR=0;
        $JUMLAH_SISWA=0;

        $ekstensi_boleh = array('pdf'); //ekstensi file yang boleh diupload
        $nama = $_FILES['SURAT_REKOM']['name']; //menunjukkan letak dan nama file yang akan di upload
        $ex = explode ('.',$nama); //explode berfungsi memecahkan/memisahkan string sesuai dengan tanda baca yang ditentukan
        $ekstensi = strtolower(end($ex)); //end = mengambil nilai terakhir dari ex, dtrtolower = memanipulasi string menjadi huruf kecil 
        $size = $_FILES['SURAT_REKOM']['size']; //untuk mendapatkan size file yang diupload
        $file_temporary = $_FILES['SURAT_REKOM']['tmp_name']; //untuk mendapatkan temporary file yang di upload

        if(in_array($ekstensi,$ekstensi_boleh)===true){
        if($size < 3132210 && $size != 0){ 
            $id = rand(0,100);
            $uniq = uniqid($id,true);
            move_uploaded_file($file_temporary, 'src/rekom/'.$uniq.'.'.$ekstensi); //untuk upload file
            $query = mysqli_query ($koneksi, "INSERT INTO daftar 
            VALUES('$ID_DAFTAR', '$ID_JENIS_LOMBA', '$ID_USER', '$ID_RAYON', '$ID_ADMIN','$NPSN', '$TANGGAL_DAFTAR', '$uniq.$ekstensi', NULL, '$STATUS_REKOM', '$STATUS_FILE', '$STATUS_BAYAR', '$TOTAL_BAYAR', '$JUMLAH_SISWA') 
            ");
            
            if($query) {
                echo '<script>alert("Berhasil menambahkan data."); document.location="daftar.php";</script>';
            }else{
                echo '<script>alert("Gagal menambahkan data."); document.location="daftar.php";</script>';
            }
        }else{
            echo '<script>alert("Foto terlalu besar."); document.location="daftar.php";</script>';
        }
        }else{
            echo '<script>alert("Ekstensi tidak diperbolehkan."); document.location="daftar.php";</script>';
        }

    
    }else if($ID_JENIS_LOMBA=='J0002'){

        $data2 = mysqli_query($koneksi, "SELECT ID_DAFTAR FROM daftar ORDER BY ID_DAFTAR DESC LIMIT 1");
        while($data_daftar = mysqli_fetch_assoc($data2))
        {
        $dft_id = $data_daftar['ID_DAFTAR'];
        }

        $row2 = mysqli_num_rows($data2);
            if($row2>0){
        $ID_DAFTAR = autonumber($dft_id, 1, 4);
            }else{
        $ID_DAFTAR = 'D0001';
        }

        $ID_USER = $_POST['ID_USER'];
        $ID_RAYON = $_POST['ID_RAYON'];
        $ID_ADMIN= 'A0001';
        $NPSN = $_POST['NPSN'];
        
        $STATUS_REKOM= 'Belum Terverifikasi';
        $STATUS_FILE='Belum Terverifikasi';
        $STATUS_BAYAR= 'Belum Bayar';
        $TOTAL_BAYAR=0;
        $JUMLAH_SISWA=0;

        $ekstensi_boleh = array('pdf'); //ekstensi file yang boleh diupload
        $nama = $_FILES['SURAT_REKOM']['name']; //menunjukkan letak dan nama file yang akan di upload
        $ex = explode ('.',$nama); //explode berfungsi memecahkan/memisahkan string sesuai dengan tanda baca yang ditentukan
        $ekstensi = strtolower(end($ex)); //end = mengambil nilai terakhir dari ex, dtrtolower = memanipulasi string menjadi huruf kecil 
        $size = $_FILES['SURAT_REKOM']['size']; //untuk mendapatkan size file yang diupload
        $file_temporary = $_FILES['SURAT_REKOM']['tmp_name']; //untuk mendapatkan temporary file yang di upload

        $ekstensi_boleh2 = array('pdf','doc','docx'); //ekstensi file yang boleh diupload
        $nama2 = $_FILES['FILE_ABSTRAK']['name']; //menunjukkan letak dan nama file yang akan di upload
        $ex2 = explode ('.',$nama2); //explode berfungsi memecahkan/memisahkan string sesuai dengan tanda baca yang ditentukan
        $ekstensi2 = strtolower(end($ex2)); //end = mengambil nilai terakhir dari ex, dtrtolower = memanipulasi string menjadi huruf kecil 
        $size2 = $_FILES['FILE_ABSTRAK']['size']; //untuk mendapatkan size file yang diupload
        $file_temporary2 = $_FILES['FILE_ABSTRAK']['tmp_name']; //untuk mendapatkan temporary file yang di upload

        if((in_array($ekstensi,$ekstensi_boleh)===true)&&(in_array($ekstensi2,$ekstensi_boleh2)===true)){
        if($size < 3132210 && $size != 0){ 
            $id = rand(0,100);
            $uniq = uniqid($id,true);
            move_uploaded_file($file_temporary, 'src/rekom/'.$uniq.'.'.$ekstensi); //untuk upload file
            $id2 = rand(0,100);
            $uniq2 = uniqid($id2,true);
            move_uploaded_file($file_temporary2, 'src/abstrak/'.$uniq2.'.'.$ekstensi2); //untuk upload file
            $query = mysqli_query ($koneksi, "INSERT INTO daftar 
            VALUES('$ID_DAFTAR', '$ID_JENIS_LOMBA', '$ID_USER', '$ID_RAYON', '$ID_ADMIN','$NPSN', '$TANGGAL_DAFTAR', '$uniq.$ekstensi', '$uniq2.$ekstensi2', '$STATUS_REKOM', '$STATUS_FILE', '$STATUS_BAYAR', '$TOTAL_BAYAR', '$JUMLAH_SISWA') 
            ");
            
            if($query) {
                echo '<script>alert("Berhasil menambahkan data."); document.location="daftar.php";</script>';
                
            }else{
                echo '<script>alert("Gagal menambahkan data."); document.location="daftar.php";</script>';
            }
        }else{
            echo '<script>alert("Foto terlalu besar."); document.location="daftar.php";</script>';

        }
        }else{
            echo '<script>alert("Ekstensi tidak diperbolehkan."); document.location="daftar.php";</script>';
        }

    }

}
?>