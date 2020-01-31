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

      
        <!-- Modal Header -->
        <form action="bayar_query.php" method="post">
        <div class="container container-fluid-md">
        <div class="row justify-content-center mt-4">
        <div class="col-lg-9 pt-4">
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
        }
        $result = mysqli_query($koneksi, "SELECT daftar.ID_DAFTAR,daftar.TOTAL_BAYAR,user.NAMA_USER, jenis_lomba.NAMA_LOMBA, daftar.TGL_DAFTAR FROM jenis_lomba,user,daftar
        WHERE daftar.ID_DAFTAR='$id_daftar' AND daftar.ID_USER = user.ID_USER AND  daftar.ID_JENIS_LOMBA =jenis_lomba.ID_JENIS_LOMBA");
                    
                      while($data_rekening = mysqli_fetch_assoc($result)){
                        $id_daftar  = $data_rekening['ID_DAFTAR'];
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
                    <span class="input-group-text">ID Daftar : <?=$id_daftar?></span>
                </div>
            </div>
                        
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">Tanggal Daftar  : <?=$tanggal_daftar?></span>
                </div>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Nama User : <?=$nama_user?> </span>
                </div>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Jenis Lomba : <?=$jenis_lomba?></span>
                </div>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Total Bayar : <?=$total_bayar?> </span>
                </div>
            </div>
           <!-- <p class="pt-3 font-m-semi">Pilih Bank :</p>
                    <div id="select_bank" class="">
                   
                        $i = 1;
                        $result = mysqli_query($con, "select * from bank");
                            while($data_rekening = mysqli_fetch_assoc($result)){
                                $id_bank = $data_rekening['ID_BANK'];
                                $nama_rekening = $data_rekening['NAMA_REKENING'];
                                $nomer_rekening = $data_rekening['NOMER_REKENING'];
                                echo '<div class="custom-control custom-radio custom-control-inline mb-3 pl-5">
                                <input type="radio" aria-describedby="'.$nomer_rekening.'" id="pilihbank'.$i.'" name="pilihbank" value="'.$id_rekening.'" class="custom-control-input" required>
                                <label class="custom-control-label" for="pilihbank'.$i.'">'.$nama_rekening.'</label>
                                </div>';
                                $i+=1;
                            }   
                    ?>-->
            <div class="form-group row">
            <label class="control-label"><small>Pilih Bank : </small></label>
                        <select name="id_rekening" class="form-control">
                            <option value="">--pilih bank untuk pembayaran anda--</option>
                            <option value="002">BRI</option>
                            <option value="001">BNI</option>
                            <option value="003">MANDIRI</option>
                        </select>
            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <input type="submit"    name="bayar" value="Bayar" class="btn btn-primary font-m-med">
        </div>
    </div>
  </div>
  </form>
  
</div>
</div>

</body>
</html>