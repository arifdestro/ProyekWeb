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
    <li class="breadcrumb-item active">Siswa</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
        <i class="fas fa-table"></i>
        Data Siswa</div>
        <div><a class="btn btn-primary" href="tambah_siswa.php" role="button">Tambah</a></div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>NISN</th>
            <th>NAMA SISWA</th>
            <th>TEMPAT LAHIR</th>
            <th>TGL LAHIR</th>
            <th>JENIS KELAMIN</th>
            <th>ALAMAT</th>
            <!-- <th>FOTO</th> -->
            <th>AKSI</th>
        </tr>
        </thead>
        <tbody>
            
    <?php
    //query ke database SELECT tabel printer urut berdasarkan id yang paling besar
    $sql = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY NISN ASC ") or die(mysqli_error($koneksi));
    //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
    if(mysqli_num_rows($sql) > 0){
        //membuat variabel $no untuk menyimpan nomor urut
        $no = 1;
        //melakukan perulangan while dengan dari dari query $sql
        while($data = mysqli_fetch_assoc($sql)){
            //menampilkan data perulangan
            echo '
            <tr>
                <td>'.$no.'</td>
                <td>'.$data['NISN'].'</td>
                <td>'.$data['NAMA_SISWA'].'</td>
                <td>'.$data['TEMPAT_LAHIR'].'</td>
                <td>'.$data['TANGGAL_LAHIR'].'</td>
                <td>'.$data['JENIS_KELAMIN'].'</td>
                <td>'.$data['ALAMAT'].'</td>
                <td>
                    <a href="ubah_siswa.php?NISN='.$data['NISN'].'" class="badge badge-warning">Edit</a>
                    <a href="hapus_siswa.php?NISN='.$data['NISN'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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