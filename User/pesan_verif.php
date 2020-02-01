
<?php
include 'includes/connector.php';
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
        <!-- Modal body -->
        <div class="modal-body">
        <div class="card-body p-4">
        <div class="card shadow p-5">
            <h2 class="text-center font-m-semi border-bottom mb-3">Selamat Anda Sudah Mengkonfirmasi Pembayaran Anda </h2>
            <div class="">
            <h4 class="text-center font-m-semi border-bottom mb-3">Tunggu hingga Panita memverifkasi Pembayaran Anda </h4>
            <h4 class="text-center font-m-semi border-bottom mb-3">Untuk selanjutanya Anda dapat mencetak kartu peserta, Apabila status pembayaran Anda sudah terverifikasi</h4>
            </div>
                       
        <!-- Modal footer -->
        <div class="modal-footer">
        <a href="bayar_saya.php" class="btn btn-primary">Kembali</a>
        </div>
    </div>
  </div>
  
</div>

</body>
</html>