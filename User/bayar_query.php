
<?php

include 'includes/connector.php';
if (isset($_POST['bayar'])) {
    $id_daftar = $_POST['ID_DAFTAR'];
    $id_rekening = $_POST['id_rekening'];

  }
  $result = mysqli_query($koneksi, "SELECT * FROM bank WHERE ID_BANK = '$id_rekening'");
  while($data_rekening = mysqli_fetch_assoc($result)){
  $nama_rekening = $data_rekening['NAMA_REK'];
  $nama_bank = $data_rekening['NAMA_BANK'];
  $nomer_rekening = $data_rekening['NO_REK'];
  }


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

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIMBA IAIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container container-fluid-md">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-9 pt-4">
   <!-- Modal Header -->
        <div class="modal-header">
            <div class="card p shadow"> 
                <div class="card-header text-center text-light bg-info">
                    <h4 class="modal-title">Pesan Pembayaran Anda</h4>
            </div>
        </div>
        </div>
<div class="modal-body">
        <div class="card-body p-4">
        <div class="card shadow p-5">
            <h2 class="text-center font-m-semi border-bottom mb-3">Silahkan Lakukan Pembayaran </h2>
            <div class="">
            <p>Transfer ke Rekening berikut :</p>
            <p>Nama BANK : <?=$nama_bank?></p>
            <p>Nomer Rekening : <?=$nomer_rekening?> </p>
            <p>Nama : <?=$nama_rekening?> </p>
            </div>
            <div class="custom-file mb-5 ">
                <input type="hidden" name="id_daftar" value="<?=$id_daftar?>">
                <input type="hidden" name="id_bank" value="<?=$id_rekening?>">
                </div>     
                </div>              
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <a href="bayar_saya.php" class="btn btn-primary">Selesai</a>
        </div>
    </div>
  </div>
  
</div>

</body>
</html>