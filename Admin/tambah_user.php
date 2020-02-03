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
            <a href="user.php">User</a>
        </li>
        <li class="breadcrumb-item active">Tambah Data User</li>
        </ol>
    <hr>
        <?php
    if(isset($_POST['submit'])){
        $ID_USER		= $_POST['ID_USER'];
        $NAMA_USER		= $_POST['NAMA_USER'];
        $EMAIL_USER		= $_POST['EMAIL_USER'];
        $PASSWORD_USER		= $_POST['PASSWORD_USER'];
        
        $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE ID_USER='$ID_USER'") or die(mysqli_error($koneksi));
        
        if(mysqli_num_rows($cek) == 0){
            $sql = mysqli_query($koneksi, "INSERT INTO user(ID_USER, NAMA_USER, EMAIL_USER, PASSWORD_USER) VALUES('$ID_USER', '$NAMA_USER', '$EMAIL_USER', '$PASSWORD_USER')") or die(mysqli_error($koneksi));
            
            if($sql){
                echo '<script>alert("Berhasil menambahkan data."); document.location="user.php";</script>';
            }else{
                echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
            }
        }else{
            echo '<div class="alert alert-warning">Gagal, data sudah terdaftar.</div>';
        }
    }
    ?>
    
    <form action="tambah_user.php" method="post">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ID User</label>
            <div class="col-sm-10">
                <input type="text" name="ID_USER" class="form-control" size="4" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" name="NAMA_USER" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" name="EMAIL_USER" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="text" name="PASSWORD_USER" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">&nbsp;</label>
            <div class="col-sm-10">
                <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
                <a href="user.php" class="btn btn-warning">KEMBALI</a>
            </div>
        </div>
    </form>
        
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <script src="js/demo/chart-area-demo.js"></script>
    <?php 
                include 'includes/footer.php';
            }else{
    require 'login_admin.php';
    }
?>