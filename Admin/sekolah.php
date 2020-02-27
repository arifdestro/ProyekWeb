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
            <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Sekolah</li>
        </ol>

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
    Data Sekolah</div>
    <div><a class="btn btn-primary" href="tambah_sekolah.php" role="button">Tambah</a></div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="thead-dark">
    <tr>
        <th>No.</th>
        <th>NPSN</th>
        <th>NAMA SEKOLAH</th>
        <th>AKSI</th>
    </tr>
    </thead>
    <tbody>
        
        <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM sekolah ORDER BY NPSN ASC") or die(mysqli_error($koneksi));
        if(mysqli_num_rows($sql) > 0){
            $no = 1;
            while($data = mysqli_fetch_assoc($sql)){
                echo '
                <tr>
                    <td>'.$no.'</td>
                    <td>'.$data['NPSN'].'</td>
                    <td>'.$data['NAMA_SEKOLAH'].'</td>
                    <td>
                        <a href="ubah_sekolah.php?NPSN='.$data['NPSN'].'" class="badge badge-warning">Edit</a>
                        <a href="hapus_sekolah.php?NPSN='.$data['NPSN'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
                    </td>
                </tr>
                ';
                $no++;
            }
        }else{
            echo '
            <tr>
                <td colspan="6"><b>Tidak ada data.</b></td>
            </tr>
            ';
        }
        
        
        ?>
    <tbody>
</table>


</div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

    <p class="small text-center text-muted my-5">
            <em>More table examples coming soon...</em>
        </p>

        </div>
        <!-- /.container-fluid -->
		<?php 
                include 'includes/footer.php';
            }else{
    require 'login_admin.php';
    }
?>