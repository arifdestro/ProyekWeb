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
                <a href="admin.php">Admin</a>
            </li>
            <li class="breadcrumb-item active">Tambah Data Admin</li>
            </ol>
			<hr>

            <?php
		if(isset($_POST['submit'])){
            $ID_ADMIN = $_POST['ID_ADMIN'];
            $NAMA_ADMIN = $_POST['NAMA_ADMIN'];
            $PASSWORD_ADMIN = $_POST['PASSWORD_ADMIN'];

			$cek = mysqli_query($koneksi, "SELECT * FROM admin WHERE ID_ADMIN='$ID_ADMIN'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO admin(ID_ADMIN, NAMA_ADMIN, PASSWORD_ADMIN) VALUES('$ID_ADMIN', '$NAMA_ADMIN', '$PASSWORD_ADMIN')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="admin.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
                }else{
				echo '<div class="alert alert-warning">Gagal, data sudah terdaftar.</div>';
			}
		}
		?>
		
		<form action="tambah_admin.php" method="post">
        <div class="form-group row">
				<label class="col-sm-2 col-form-label">ID ADMIN</label>
				<div class="col-sm-10">
					<input type="text" name="ID_ADMIN" class="form-control" placeholder="masukkan id admin" required >
				</div>
			</div>
			
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA ADMIN</label>
				<div class="col-sm-10">
					<input type="text" name="NAMA_ADMIN" class="form-control" placeholder="masukkan nama, maksimal =50 digit"  required>
				</div>
			</div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">PASSWORD</label>
				<div class="col-sm-10">
					<input type="text" name="PASSWORD_ADMIN" class="form-control" placeholder ="masukkan password"  required >
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-10 col-form-label">&nbsp;</label>
				<div class="col-md-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="admin.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
            
            <div class="card-footer mdall text-muted">Updated yesterday at 11:59 PM</div>
            </div>

        </div>
        <!-- /.container-fluid -->

    
    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

    <?php 
                include 'includes/footer.php';
            }else{
    require 'login_admin.php';
    }
?>

