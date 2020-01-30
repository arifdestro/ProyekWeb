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
                            <th>Nama Sekolah</th>
                            <th>Regional</th>
                            <th>Jenis Lomba</th>
                            <th>Total Bayar</th>
                            <th>Status Bayar</th>                          
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                            if(isset($_GET['ID_DAFTAR'])){
                                $id_daftar = $_GET['ID_DAFTAR'];
                                $id_rekening = $_GET['ID_BANK'];
                            }
                            $result = mysqli_query($koneksi, "SELECT bayar.ID_DAFTAR, sekolah.NAMA_SEKOLAH, bayar.ID_BAYAR,daftar.TOTAL_BAYAR, rayon.NAMA_RAYON,user.NAMA_USER, jenis_lomba.NAMA_LOMBA FROM bayar,sekolah,rayon,jenis_lomba,user,bank,daftar
                            WHERE bayar.ID_DAFTAR = daftar.ID_DAFTAR AND  rayon.ID_RAYON= daftar.ID_RAYON AND daftar.ID_USER = user.ID_USER AND jenis_lomba.ID_JENIS_LOMBA= daftar.ID_JENIS_LOMBA");
                            
    
                        if(mysqli_num_rows($result) > 0){
                            //membuat variabel $no untuk menyimpan nomor urut
                            $no = 1;
                            $id_daftar = $data['ID_DAFTAR'];
                            $total_bayar = $data['TOTAL_BAYAR'];
                            $nama_sekolah = $data['NAMA_SEKOLAH'];
                            $rayon = $data['NAMA_RAYON'];
                            $jenis_lomba = $data['NAMA_LOMBA'];
                            $status = $data['STATUS_BAYAR'];
                            //melakukan perulangan while dengan dari dari query $sql
                            while($data = mysqli_fetch_assoc($result)){
                                //menampilkan data perulangan
                                echo '
                                <tr>
                                    <td>'.$no.'</td>
                                    <td>'.$id_daftar.'</td>
                                    <td>'.$nama_sekolah.'</td>
                                    <td>'.$rayon.'</td>
                                    <td>'.$jenis_lomba.'</td>
                                    <td>'.$total_bayar.'</td>
                                    <td>'.$status.'</td>
                                    <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Bayar
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

<!-- <a href="tambah_siswa.php?ID_DAFTAR='.$data['ID_DAFTAR'].'" class="btn btn-primary" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Lihat Detail</a> -->