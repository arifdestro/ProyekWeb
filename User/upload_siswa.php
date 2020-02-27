<?php

include 'includes/connector.php';

if (isset($_POST['submit_siswa'])) {
    $ID_DAFTAR = $_POST['ID_DAFTAR'];
    $ID_PESERTA = $_POST['ID_PESERTA'];
    $ID_JENIS_LOMBA = $_POST['ID_JENIS_LOMBA'];

    $ceksiswa = mysqli_query($koneksi, "SELECT * FROM daftar WHERE ID_PESERTA='$ID_PESERTA'");
    $row = mysqli_num_rows($ceksiswa);
    if ($row > 0) {

        echo '<script>alert("Gagal Mendaftarkan siswa ini, karena telah terdaftar dalam lomba yang sama"); document.location="pendaftaran_saya.php";</script>';

    } else {

        if ($ID_JENIS_LOMBA == 'J0001') {
            $STATUS_SISWA = 1;
        } else if ($ID_JENIS_LOMBA == 'J0002') {
            $STATUS_SISWA = 2;
        }
        // var_dump($STATUS_SISWA);
        $NAMA_SISWA = $_POST['NAMA_SISWA'];
        $TEMPAT_LAHIR = $_POST['NAMA_SISWA'];
        $TANGGAL_LAHIR = $_POST['TANGGAL_LAHIR'];
        $JENIS_KELAMIN = $_POST['JENIS_KELAMIN'];
        $ALAMAT = $_POST['ALAMAT'];


        $ekstensi_boleh = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'); //ekstensi file yang boleh diupload
        $nama = $_FILES['FOTO']['name']; //menunjukkan letak dan nama file yang akan di upload
        $ex = explode('.', $nama); //explode berfungsi memecahkan/memisahkan string sesuai dengan tanda baca yang ditentukan
        $ekstensi = strtolower(end($ex)); //end = mengambil nilai terakhir dari ex, dtrtolower = memanipulasi string menjadi huruf kecil 
        $size = $_FILES['FOTO']['size']; //untuk mendapatkan size file yang diupload
        $file_temporary = $_FILES['FOTO']['tmp_name']; //untuk mendapatkan temporary file yang di upload

        if (in_array($ekstensi, $ekstensi_boleh) === true) {
            if ($size < 31322100 && $size != 0) {
                $id = rand(0, 100);
                $uniq = uniqid($id, true);
                move_uploaded_file($file_temporary, 'src/img/' . $uniq . '.' . $ekstensi); //untuk upload file
                $query = mysqli_query($koneksi, "INSERT INTO siswa 
                        VALUES('$NISN', '$NAMA_SISWA', '$TEMPAT_LAHIR', '$TANGGAL_LAHIR', '$JENIS_KELAMIN','$ALAMAT', '$uniq.$ekstensi', '$STATUS_SISWA') 
                        ");

                $query2 = mysqli_query($koneksi, "INSERT INTO detail_daftar VALUES ('$ID_DAFTAR', '$NISN')");

                if ($query) {
                    echo '<script>alert("Berhasil menambahkan data."); document.location="daftar.php";</script>';
                } else {
                    echo '<script>alert("Gagal menambahkan data."); document.location="daftar.php";</script>';
                }
            } else {
                echo '<script>alert("Foto terlalu besar."); document.location="daftar.php";</script>';
            }
        } else {
            echo '<script>alert("Ekstensi tidak diperbolehkan."); document.location="daftar.php";</script>';
        }
    }
}

