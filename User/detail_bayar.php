<?php
session_start();
include 'includes/connector.php';

if (isset($_SESSION['USER_LOGIN'])) {
    $NAMA_USER=$_SESSION['NAMA_USER'];
    $ID_USER=$_SESSION['ID_USER'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
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
        <form action="pesan_bayar.php" method="post">
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
        $result = mysqli_query($koneksi, "SELECT daftar.ID_DAFTAR,daftar.TOTAL_BAYAR,user.NAMA_USER, jenis_lomba.NAMA_LOMBA, daftar.TGL_DAFTAR,daftar.STATUS_BAYAR FROM jenis_lomba,user,daftar
        WHERE daftar.ID_DAFTAR='$id_daftar' AND daftar.ID_USER = user.ID_USER AND  daftar.ID_JENIS_LOMBA =jenis_lomba.ID_JENIS_LOMBA");
                    
                      while($data_rekening = mysqli_fetch_assoc($result)){
                        $id_daftar  = $data_rekening['ID_DAFTAR'];
                        $total_bayar = $data_rekening['TOTAL_BAYAR'];
                        $nama_user = $data_rekening['NAMA_USER'];
                        $jenis_lomba = $data_rekening['NAMA_LOMBA'];
                        $tanggal_daftar = $data_rekening['TGL_DAFTAR'];
                        $status_bayar = $data_rekening['STATUS_BAYAR'];
                        ?>
                         <?php }?>
        <!-- Modal body -->
        <div class="modal-body">
        <div class="card-body p-4">
                <form action=".php" method="post" enctype="multipart/form-data">
                <input type="text" class="form-control" name="STATUS_BAYAR" value="<?= $status_bayar ?>" hidden>
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
<!-- Tabel Siswa -->
<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <?php
                $ID_DAFTAR=$_GET['ID_DAFTAR'];
                ?>
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>          
                            
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                        $result_for_tabel = mysqli_query(
                            $koneksi,
                            "SELECT siswa.NISN, siswa.NAMA_SISWA,
                            daftar.ID_DAFTAR, daftar.STATUS_REKOM, daftar.STATUS_FILE, daftar.STATUS_BAYAR, 
                            user.ID_USER, 
                            detail_daftar.ID_DAFTAR, detail_daftar.NISN
                            FROM siswa, daftar, user, detail_daftar 
                            WHERE detail_daftar.NISN=siswa.NISN 
                            AND detail_daftar.ID_DAFTAR=daftar.ID_DAFTAR 
                            AND daftar.ID_USER=user.ID_USER 
                            AND daftar.ID_DAFTAR='$ID_DAFTAR'
                            ");

                        if(mysqli_num_rows($result_for_tabel) > 0){
                            //membuat variabel $no untuk menyimpan nomor urut
                            $no = 1;
                            //melakukan perulangan while dengan dari dari query $sql
                            while($data = mysqli_fetch_assoc($result_for_tabel)){
                                
                                //menampilkan data perulangan
                                echo '
                                <tr>
                                    <td>'.$no.'</td>
                                    <td>'.$data['NISN'].'</td>
                                    <td>'.$data['NAMA_SISWA'].'</td>
                                </tr>
                                ';
                                $no++;
                            }
                        //jika query menghasilkan nilai 0
                        }else{
                            echo '
                            <tr>
                                <td colspan="6"><b>Tidak ada data.</b></td>
                            </tr>
                            ';
                        }
                        ?>    
                    <body>
                </table>
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
                        <select required name="id_rekening" class="form-control">
                            <option value="">--pilih bank untuk pembayaran anda--</option>
                            <option value="002">BRI</option>
                            <option value="001">BNI</option>
                            <option value="003">MANDIRI</option>
                        </select>
            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <a href="bayar_saya.php"><button type="button" class="btn btn-secondary ml-2">Kembali</button></a>
        <input type="submit"    id="bayar" name="bayar" value="Bayar" class="btn btn-primary font-m-med">
        </div>
    </div>
  </div>
  </form>
  </form>
</div>
</div>

</body>
</html>
<?php } else {
        require 'login_user.php';
    }
?>