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
            <li class="breadcrumb-item active">Ubah Data Rayon</li>
            </ol>

            <div class="container" style="margin-top:20px">
	
		<hr>
		
<!DOCTYPE html>
<html>
<head>
	<title>TABEL USER</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<div class="container" style="margin-top:20px">
		<!-- <h2>EDIT DATA</h2> -->
		
		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['ID_RAYON'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$ID_RAYON = $_GET['ID_RAYON'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM rayon WHERE ID_RAYON='$ID_RAYON'") or die(mysqli_error($koneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>
		
		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$NAMA_RAYON = $_POST['NAMA_RAYON'];
			
			$sql = mysqli_query($koneksi, "UPDATE rayon SET ID_RAYON='$ID_RAYON', NAMA_RAYON='$NAMA_RAYON' WHERE ID_RAYON='$ID_RAYON'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="rayon.php?ID_RAYON='.$ID_RAYON.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form action="ubah_rayon.php?ID_RAYON=<?php echo $ID_RAYON; ?>" method="post">
			
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Rayon</label>
				<div class="col-sm-10">
					<input type="text" name="ID_RAYON" class="form-control" value="<?php echo $data['ID_RAYON']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Rayon</label>
				<div class="col-sm-10">
					<input type="text" name="NAMA_RAYON" class="form-control" value="<?php echo $data['NAMA_RAYON']; ?>" required>
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
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>
	</div>
            
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