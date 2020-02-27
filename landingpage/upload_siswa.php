<?php

include 'includes/connector.php';

if (isset($_POST['tambah_siswa'])) {
    $ID_DAFTAR = $_POST['ID_DAFTAR'];
    $NISN = $_POST['NISN'];
    // var_dump($ID_DAFTAR);
    // var_dump($NISN);

    $jl=mysqli_query($koneksi,"SELECT daftar.ID_JENIS_LOMBA FROM daftar WHERE ID_DAFTAR='$ID_DAFTAR'");
    while($for_jl=mysqli_fetch_assoc($jl)){
        $ID_JENIS_LOMBA=$for_jl['ID_JENIS_LOMBA'];

        $NO_PESERTA=$ID_JENIS_LOMBA.$NISN;
        // var_dump($NO_PESERTA);

        $cek_siswa=mysqli_query($koneksi,"SELECT * FROM siswa WHERE NO_PESERTA='$NO_PESERTA'");
        $for_siswa=mysqli_num_rows($cek_siswa);

        if ($for_siswa > 0) {
            echo '<script>alert("Gagal Mendaftarkan Siswa, Karena siswa telah terdaftar dalam jenis lomba yang sama"); document.location="tambah_siswa.php";</script>';
        }else {
                    $NAMA_SISWA = $_POST['NAMA_SISWA'];
                    $TEMPAT_LAHIR = $_POST['TEMPAT_LAHIR'];
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
                                    VALUES('$NO_PESERTA','$NISN', '$NAMA_SISWA', '$TEMPAT_LAHIR', '$TANGGAL_LAHIR', '$JENIS_KELAMIN','$ALAMAT', '$uniq.$ekstensi') 
                                    ");

                            $query2 = mysqli_query($koneksi, "INSERT INTO detail_daftar VALUES ('$ID_DAFTAR', '$NO_PESERTA')");

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

    }


}