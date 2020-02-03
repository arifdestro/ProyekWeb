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
            <a href="jenis_lomba.php">Jenis Lomba</a>
        </li>
        <li class="breadcrumb-item active">Tambah Jenis Lomba</li>
        </ol>
        <hr>

    <?php
    if(isset($_POST['submit'])){
        $id_jenis_lomba		= $_POST['ID_JENIS_LOMBA'];
        $nama_lomba        = $_POST['NAMA_LOMBA'];
        $biaya             = $_POST['BIAYA'];

        
        $cek = mysqli_query($koneksi, "SELECT * FROM jenis_lomba WHERE ID_JENIS_LOMBA='$id_jenis_lomba'") or die(mysqli_error($koneksi));

        if(mysqli_num_rows($cek) == 0){
            $sql = mysqli_query($koneksi, "INSERT INTO jenis_lomba(ID_JENIS_LOMBA, NAMA_LOMBA, BIAYA) VALUES('$id_jenis_lomba', '$nama_lomba', '$biaya' )") or die(mysqli_error($koneksi));
            
            if($sql){
                echo '<script>alert("Berhasil menambahkan data."); document.location="jenis_lomba.php";</script>';
            }else{
                echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
            }
        }else{
            echo '<div class="alert alert-warning">Gagal, data sudah terdaftar.</div>';
        }
    }
    ?>
    
    <form action="tambah_jl.php" method="post">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ID LOMBA</label>
            <div class="col-sm-10">
                <input type="text" name="ID_JENIS_LOMBA" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">NAMA LOMBA</label>
            <div class="col-sm-10">
                <input type="text" name="NAMA_LOMBA" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">BIAYA</label>
            <div class="col-sm-10">
                <input type="text" name="BIAYA" class="form-control" required>
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