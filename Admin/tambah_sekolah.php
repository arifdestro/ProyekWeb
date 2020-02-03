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
            <a href="sekolah.php">Sekolah</a>
        </li>
        <li class="breadcrumb-item active">Tambah Data Sekolah</li>
        </ol>
        <hr>

        <?php
    if(isset($_POST['submit'])){
        $npsn			= $_POST['NPSN'];
        $nama_sekolah	= $_POST['NAMA_SEKOLAH'];

        $cek = mysqli_query($koneksi, "SELECT * FROM sekolah WHERE NPSN='$npsn'") or die(mysqli_error($koneksi));
        
        if(mysqli_num_rows($cek) == 0){
            $sql = mysqli_query($koneksi, "INSERT INTO sekolah(NPSN, NAMA_SEKOLAH) VALUES('$npsn', '$nama_sekolah' )") or die(mysqli_error($koneksi));
            
            if($sql){
                // echo '<script>alert("Berhasil menambahkan data."); document.location="sekolah.php";</script>';
            }else{
                echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
            }
            }else{
            echo '<div class="alert alert-warning">Gagal, data sudah terdaftar.</div>';
        }
    }
    ?>

    <form action="tambah.php" method="post">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">NPSN</label>
            <div class="col-sm-10">
                <input type="text" name="NPSN" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">NAMA SEKOLAH</label>
            <div class="col-sm-10">
                <input type="text" name="NAMA_SEKOLAH" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">&nbsp;</label>
            <div class="col-sm-10">
                <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
                <a href="sekolah.php" class="btn btn-warning">KEMBALI</a>
            </div>
        </div>
    </form>
        
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

    </div>
    <!-- /.container-fluid -->

        <!-- Demo scripts for this page-->
    <script src="js/demo/chart-area-demo.js"></script>
    <?php 
                include 'includes/footer.php';
            }else{
    require 'login_admin.php';
    }
?>

