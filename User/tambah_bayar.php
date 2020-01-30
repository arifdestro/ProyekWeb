<?php
include 'includes/connector.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <div class="card p shadow"> 
                <div class="card-header text-center text-light bg-info">
                    <h4 class="modal-title">DETAIL PEMBAYARAN ANDA</h4>
            </div>
        </div>
        </div>
        <?php
        if(isset($_GET['ID_DAFTAR'])){
            $id_daftar = $_GET['ID_DAFTAR'];
            $id_rekening = $_GET['ID_BANK'];
        }
        $result = mysqli_query($koneksi, "SELECT bayar.ID_DAFTAR, sekolah.NAMA_SEKOLAH, bayar.ID_BAYAR,daftar.TOTAL_BAYAR, rayon.NAMA_RAYON,user.NAMA_USER, jenis_lomba.NAMA_LOMBA, daftar.TGL_DAFTAR FROM bayar,sekolah,rayon,jenis_lomba,user,bank,daftar
        WHERE bayar.ID_DAFTAR = daftar.ID_DAFTAR AND  rayon.ID_RAYON= daftar.ID_RAYON AND daftar.ID_USER = user.ID_USER AND jenis_lomba.ID_JENIS_LOMBA= daftar.ID_JENIS_LOMBA");
                    
                      while($data_rekening = mysqli_fetch_assoc($result)){
                        $id_daftar = $data_rekening['ID_DAFTAR'];
                        $id_bayar = $data_rekening['ID_BAYAR'];
                        $total_bayar = $data_rekening['TOTAL_BAYAR'];
                        $nama_user = $data_rekening['NAMA_USER'];
                        $jenis_lomba = $data_rekening['NAMA_LOMBA'];
                        $tanggal_daftar = $data_rekening['TGL_DAFTAR'];
                        ?>
                         <?php }?>
        <!-- Modal body -->
        <div class="modal-body">
        <div class="card-body p-4">
                <form action=".php" method="post" enctype="multipart/form-data">
                <input type="text" class="form-control" name="ID_DAFTAR" value="<?= $id_daftar ?>" hidden>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">ID Daftar : ABC<?=$id_daftar?></span>
                </div>
            </div>
                        
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">Tanggal Daftar  : ABC<?=$tanggal_daftar?></span>
                </div>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Nama User : ABC<?=$nama_user?> </span>
                </div>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Jenis Lomba : ABC<?=$jenis_lomba?></span>
                </div>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Total Bayar : ABC<?=$total_bayar?> </span>
                </div>
            </div>
            <br>
            <hr>
            <br>

            <div class="form-group row">
            <label class="control-label"><small>Pilih Bank : </small></label>
                        <select name="id_rekening" class="form-control">
                            <option value="">--pilih bank untuk pembayaran anda--</option>
                            <option value="002">BRI</option>
                            <option value="001">BNI</option>
                            <option value="003">MANDIRI</option>
                        </select>
            </div>


            <br>
            <hr>
            <br>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
  
</div>

</body>
</html>