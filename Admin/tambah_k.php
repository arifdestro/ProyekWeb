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
            <a href="kontak.php">Kontak</a>
        </li>
        <li class="breadcrumb-item active">Tambah Data kontak</li>
        </ol>
        <hr>

        <?php
    if(isset($_POST['submit'])){
        $ID_K			= $_POST['ID_K'];
        $RAYON			= $_POST['RAYON'];
        $HP			    = $_POST['HP'];
        $NAMA			= $_POST['NAMA'];


        $cek = mysqli_query($koneksi, "SELECT * FROM kontak WHERE ID_K='$ID_K'") or die(mysqli_error($koneksi));
        
        if(mysqli_num_rows($cek) == 0){
            $sql = mysqli_query($koneksi, "INSERT INTO kontak(ID_K, RAYON, HP, NAMA) VALUES('$ID_K', '$RAYON', '$HP', '$NAMA' )") or die(mysqli_error($koneksi));
            
            if($sql){
                echo '<script>alert("Berhasil menambahkan data."); 
                document.location="kontak.php";</script>';
            }else{
                echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
            }
            }else{
            echo '<div class="alert alert-warning">Gagal, data sudah terdaftar.</div>';
        }
    }
    ?>

    <form action="tambah_k.php" method="post">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ID_K</label>
            <div class="col-sm-10">
                <input type="text" name="ID_K" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">RAYON</label>
            <div class="col-sm-10">
                <input type="text" name="RAYON" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">HP</label>
            <div class="col-sm-10">
                <input type="text" name="HP" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">NAMA</label>
            <div class="col-sm-10">
                <input type="text" name="NAMA" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">&nbsp;</label>
            <div class="col-sm-10">
                <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
                <a href="kontak.php" class="btn btn-warning">KEMBALI</a>
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

