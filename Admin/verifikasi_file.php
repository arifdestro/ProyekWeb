<?php 
session_start();
$_SESSION['active_link']=['admin'];
include 'includes/connector.php'; 

if(isset($_SESSION['admin_login'])){
    include 'includes/header.php' ;
    include 'includes/sidebar.php' ;
    ?>
    <div id="content-wrapper">

    <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
        <i class="fas fa-table"></i>
        Data Bayar Olimpiade</div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark">
                        <tr>
                            <th>No.</th>
                            <th>NAMA USER</th>
                            <th>NAMA SEKOLAH</th>
                            <th>TGL DAFTAR</th>
                            <th>ID DAFTAR</th>
                            <th>FILE ABSTRAK</th>
                            <th>STATUS FILE</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
				$result = mysqli_query(
                    $koneksi,
                    "SELECT daftar.ID_DAFTAR,
                    daftar.TGL_DAFTAR, 
                    daftar.SURAT_REKOM, 
                    daftar.STATUS_BAYAR, 
                    daftar.STATUS_FILE,
                    daftar.FILE_ABSTRAK,
                    jenis_lomba.ID_JENIS_LOMBA, jenis_lomba.NAMA_LOMBA,
                    rayon.ID_RAYON, rayon.NAMA_RAYON,
                    user.ID_USER, user.NAMA_USER,
                    admin.ID_ADMIN,
                    sekolah.NPSN, sekolah.NAMA_SEKOLAH
                    FROM daftar, jenis_lomba, rayon, user, admin, sekolah
                    WHERE
                    daftar.ID_JENIS_LOMBA = jenis_lomba.ID_JENIS_LOMBA
                    AND daftar.ID_RAYON = rayon.ID_RAYON
                    AND daftar.ID_USER = user.ID_USER
                    AND daftar.ID_ADMIN = admin.ID_ADMIN
                    AND daftar.NPSN = sekolah.NPSN
                    AND daftar.ID_JENIS_LOMBA='J0002'
                    ");
                if(mysqli_num_rows($result) > 0){
                    //membuat variabel $no untuk menyimpan nomor urut
                    $no = 1;
                    //melakukan perulangan while dengan dari dari query $sql
                    while($data = mysqli_fetch_assoc($result)){
                        //menampilkan data perulangan
                        echo '
                        <tr>
                            <td>'.$no.'</td>
                            <td>'.$data['NAMA_USER'].'</td>
                            <td>'.$data['NAMA_SEKOLAH'].'</td>
                            <td>'.$data['TGL_DAFTAR'].'</td>
                            <td>'.$data['ID_DAFTAR'].'</td>
                            <td>'.$data['FILE_ABSTRAK'].'</td>
                            <td>'.$data['STATUS_FILE'].'</td>
                            <td>
                            <a href="verifikasi_file_info.php?ID_DAFTAR='.$data['ID_DAFTAR'].'" class="badge badge-primary"><i class="fas fa-info"></i></a>
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
        </div>
    </div>
</div>
            <!-- Demo scripts for this page-->
<script src="js/demo/datatables-demo.js"></script>

<?php 
                include 'includes/footer.php';
                    }else{
    require 'login_admin.php';
    }
?>