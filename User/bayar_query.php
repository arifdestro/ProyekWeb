
<?php

include 'includes/connector.php';
if (isset($_POST['bayar'])) {
    $id_daftar = $_POST['ID_DAFTAR'];
    $id_rekening = $_POST['id_rekening'];
$data = mysqli_query($koneksi, "SELECT ID_BAYAR from bayar ORDER BY ID_BAYAR DESC LIMIT 1");
        while($bayar_data = mysqli_fetch_array($data))
        {
            $byr_id = $bayar_data['ID_BAYAR'];
        }

        $row = mysqli_num_rows($data);
        if($row>0){
          $id_bayar= autonumber($byr_id, 3, 6);
        }else{
          $id_bayar= 'BYR000001';
        }


    $query = mysqli_query($koneksi, "INSERT INTO bayar VALUES('$id_bayar','$id_daftar','$id_rekening','BELUM ADA','BELUM ADA')");

    if($query){
      echo"berhasil menambah DATABASE <br>";
    }else{
      echo"gagal menambah DATABASE <br>";
    }
}
?>