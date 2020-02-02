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
    <form action="konfirmasi_bayar.php" method="post">
    <form action="detail_bayar.php" method="post">
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
                            WHERE daftar.ID_USER='$ID_USER' AND rayon.ID_RAYON= daftar.ID_RAYON AND daftar.ID_USER = user.ID_USER AND jenis_lomba.ID_JENIS_LOMBA= daftar.ID_JENIS_LOMBA AND sekolah.NPSN = daftar.NPSN");
                            
    
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
                                    '?>
                                    <?php
                                    if($status == "Belum Bayar") {
                                        echo '<a href="detail_bayar.php?ID_DAFTAR=' . $data['ID_DAFTAR'] . '"><button type="button"  id="INFO_REK " name="INFO_REK" class="btn btn-primary" onclick="add_project()" >Lihat Detail</button></a>';
                                    }elseif ($status == "Konfirmasi Bayar") {
                                        echo '<a href="konfirmasi_bayar.php?ID_DAFTAR=' . $data['ID_DAFTAR'] . '"><button type="button" class="btn btn-warning" onclick="return confirm(\'Apakah Anda sudah melakukan pembayaran di Bank?\')">Konfirmasi Pembayaran</button></a>';
                                    }elseif ($status == "Sudah Bayar") {
                                        echo 'Pembayaran Anda Telah Di Verifikasi';
                                    }
                                    ;
                                    ?>
                                    </td>
                                </tr>
                                <?php

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
                </form>
                </form>
            </div>
        
<!-- Batas Tabel Bayar -->
        </div>
    </div>
</div>
</body>
</html>
<?php } else {
        require 'login_user.php';
    }
?>
