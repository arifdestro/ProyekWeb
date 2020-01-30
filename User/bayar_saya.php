<?php
include 'includes/connector.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIMBA for IAIN</title>

    <!-- link css yang kita buat -->
    <link rel="stylesheet" href="style.css">

    <!-- link bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- source js saat kita menggunakan javascript -->
    <script type="text/javascript" src="js/jquery-3.2.1.slim.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- source js Modal Halaman ini -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container container-fluid-lg">
    <div class="row justify-content-center">
    <div class="col-lg-12 m-5">
        <div class="card p shadow">
            <div class="card-header text-center text-light bg-info">
                <h3 class="m-0">HALAMAN PEMBAYARAN LOMBA</h3>
            </div>


<!--Tabel bayar saya -->
            
            <div><h5>Berikut adalah Status Pembayaran Anda. Tekan tombol Detail untuk mengetahui detail pembayaran Anda</h5></div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>No.</th>
                            <th>ID Daftar</th>
                            <th>Regional</th>
                            <th>Jenis Lomba</th>
                            <th>Status Bayar</th>                          
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                            if(isset($_GET['ID_DAFTAR'])){
                                $id_daftar = $_GET['ID_DAFTAR'];
                    
                            }
                            $result = mysqli_query($koneksi, "SELECT daftar.ID_DAFTAR,daftar.NPSN, rayon.NAMA_RAYON,user.NAMA_USER, jenis_lomba.NAMA_LOMBA, daftar.STATUS_BAYAR FROM sekolah,rayon,jenis_lomba,user,daftar
                            WHERE rayon.ID_RAYON= daftar.ID_RAYON AND daftar.ID_USER = user.ID_USER AND jenis_lomba.ID_JENIS_LOMBA= daftar.ID_JENIS_LOMBA AND sekolah.NPSN = daftar.NPSN");
                            
    
                        if(mysqli_num_rows($result) > 0){
                            //membuat variabel $no untuk menyimpan nomor urut
                            $no = 1;
                            //melakukan perulangan while dengan dari dari query $sql
                            while($data = mysqli_fetch_assoc($result)){
                                //menampilkan data perulangan
                                $id_daftar = $data['ID_DAFTAR'];
                                $rayon = $data['NAMA_RAYON'];
                                $jenis_lomba = $data['NAMA_LOMBA'];
                                $status = $data['STATUS_BAYAR'];

                                echo '
                                <tr>
                                    <td>'.$no.'</td>
                                    <td>'.$id_daftar.'</td>
                                    <td>'.$rayon.'</td>
                                    <td>'.$jenis_lomba.'</td>
                                    <td>'.$status.'</td>
                                    <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Detail
                                  </button>
                                    </td>
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
        
<!-- Batas Tabel Daftar -->
        </div>
    </div>
</div>
</body>
</html>

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
        }
        $result = mysqli_query($koneksi, "SELECT daftar.ID_DAFTAR,daftar.TOTAL_BAYAR, rayon.NAMA_RAYON,user.NAMA_USER, jenis_lomba.NAMA_LOMBA, daftar.TGL_DAFTAR FROM rayon,jenis_lomba,user,daftar
        WHERE  rayon.ID_RAYON= daftar.ID_RAYON AND daftar.ID_USER = user.ID_USER AND jenis_lomba.ID_JENIS_LOMBA= daftar.ID_JENIS_LOMBA");
                    
                      while($data_rekening = mysqli_fetch_assoc($result)){
                        $id_daftar = $data_rekening['ID_DAFTAR'];
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
            <br>
            <hr>
            <br>

           <!-- <div class="form-group row">
            <label class="control-label"><small>Pilih Bank : </small></label>
                        <select name="id_rekening" class="form-control">
                            <option value="">--pilih bank untuk pembayaran anda--</option>
                            <option value="002">BRI</option>
                            <option value="001">BNI</option>
                            <option value="003">MANDIRI</option>
                        </select>
            </div>-->
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Bayar</button>
        </div>
    </div>
  </div>
  
</div>

</body>
</html>

<!-- <a href="tambah_siswa.php?ID_DAFTAR='.$data['ID_DAFTAR'].'" class="btn btn-primary" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Lihat Detail</a> -->