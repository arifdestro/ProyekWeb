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
                            <th>TGL DAFTAR</th>
                            <th>ID DAFTAR</th>
                            <th>TGL BAYAR</th>
                            <th>ID BAYAR</th>
                            <th>STATUS</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $result = mysqli_query($koneksi, 
                        "SELECT daftar.ID_DAFTAR, daftar.TGL_DAFTAR, user.ID_USER, user.NAMA_USER, bayar.ID_BAYAR, bayar.TGL_BAYAR, daftar.STATUS, jenis_lomba.ID_JENIS_LOMBA
                        FROM daftar, bayar, user, jenis_lomba
                        WHERE daftar.ID_USER = user.ID_USER
                        AND bayar.ID_DAFTAR = daftar.ID_DAFTAR
                        AND daftar.ID_JENIS_LOMBA=jenis_lomba.ID_JENIS_LOMBA
                        AND jenis_lomba.ID_JENIS_LOMBA='J0002'");

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
                                    <td>'.$data['ID_DAFTAR'].'</td>
                                    <td>'.$data['TGL_DAFTAR'].'</td>
                                    <td>'.$data['ID_BAYAR'].'</td>
                                    <td>'.$data['TGL_BAYAR'].'</td>
                                    <td>'.$data['STATUS'].'</td>
                                    <td>
                                        <a href="bayar_info_sp.php?ID_DAFTAR='.$data['ID_DAFTAR'].'" class="badge badge-primary"><i class="fas fa-info"></i></a>
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