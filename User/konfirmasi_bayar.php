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

      

<form action="konfirmasi_query.php" method="post" enctype="multipart/form-data">
<div class="container container-fluid-md">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-9 pt-4">
   <!-- Modal Header -->
        <div class="modal-header">
            <div class="card p shadow"> 
                <div class="card-header text-center text-light bg-info">
                    <h4 class="modal-title">KONFIRMASI PEMBAYARAN ANDA</h4>
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
                        $id_daftar = $data_rekening['ID_DAFTAR'];
                        $tanggal_daftar = $data_rekening['TGL_DAFTAR'];
                        $total_bayar = $data_rekening['TOTAL_BAYAR'];
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
            <br>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Bayar</label>
                            <div class="col-sm-10">
                                <input type="date" name="TANGGAL_BAYAR" class="form-control" required>
                            </div>
                </div>     
                </div>              
            <div class="custom-file mb-5 ">
           
                <input required type="file" name="file" class="form-control-file border" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept=".jpg, .jpeg, .png">
                <label for="uploadfile">Silahkan Transfer dan Upload bukti pembayaran Anda </label>
            </div> 

        
        <!-- Modal footer -->
        <div class="modal-footer">
        <a href="bayar_saya.php"><button type="button" class="btn btn-secondary ml-2">Kembali</button></a>
        <input type="submit" name="konfir_pembayaran" class="btn btn-primary" value="Selesai">
        </div>
       
    </div>
  </div>
  
</div>

</body>
</html>