<?php 

//koneksi ke database
$koneksi= mysqli_koneksi("localhost", "root", "", "simba_iain");


function daftar($data) {
    global $koneksi;

    $username =strtolower(stripslashes($data["username"]));
    $password= mysqli_real_escape_string ($koneksi, $data["password"]);
    $password2= mysqli_real_escape_string ($koneksi, $data["password2"]);

    
    }

//id autoincrement dari varchar`
$cri_id = mysqli_query ($koneksi, "SELECT max(ID_ADMIN) AS ID_ADMIN FROM admin");
$cari = mysqli_fetch_array ($cri_id);
$kode = substr ($cari ['ID_ADMIN'], 3,6);
$id_tbh = $kode+1;

if($id_tbh<10) {
    $id="A00".$id_tbh;
}else if($id_tbh>=10 && $id_tbh<100)
{$id="A0".$id_tbh;
}else{$id="A".$id_tbh;

}


//cek username sudah ada atau belum
$result = mysqli_query($koneksi, "SELECT NAMA_ADMIN FROM admin
WHERE  NAMA_ADMIN ='$username'");

if (mysqli_fetch_assoc($result)) {
    echo "<script>
            alert ('username sudah terdaftar')
        </script>";
        return false;
}
    //cek konfirmasi password
if ( $password !== $password2) {
    echo "<script>
            alert('konfirmasi password tidak sesuai');
        </script>";
    return false;
}


//tambah username ke database
mysqli_query ($koneksi , "INSERT INTO `admin`(`ID_ADMIN`, `NAMA_ADMIN`, `PASSWORD_ADMIN`) 
                                        VALUES  ('$id', '$username', '$password')") ;
  
return mysqli_affected_rows($koneksi);


 
?>