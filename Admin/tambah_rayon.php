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
                <a href="rayon.php">Rayon</a>
            </li>
            <li class="breadcrumb-item active">Tambah Data Rayon</li>
            </ol>
            <div class="container" style="margin-top:20px">
		<hr>
            <?php
		if(isset($_POST['submit'])){
			$ID_RAYON			= $_POST['ID_RAYON'];
			$NAMA_RAYON		= $_POST['NAMA_RAYON'];
			
			$cek = mysqli_query($koneksi, "SELECT * FROM rayon WHERE ID_RAYON='$ID_RAYON'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO rayon(ID_RAYON, NAMA_RAYON) VALUES('$ID_RAYON', '$NAMA_RAYON')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="rayon.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, data sudah terdaftar.</div>';
			}
		}
		?>
		
		<form action="tambah_rayon.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Rayon</label>
				<div class="col-sm-10">
					<input type="text" name="ID_RAYON" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Rayon</label>
				<div class="col-sm-10">
					<input type="text" name="NAMA_RAYON" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="rayon.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
            
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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