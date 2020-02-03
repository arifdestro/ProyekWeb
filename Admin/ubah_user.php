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
        <li class="breadcrumb-item active">Ubah Data User</li>
        </ol>

            <div class="container" style="margin-top:20px">
        <hr>
		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['ID_USER'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$ID_USER = $_GET['ID_USER'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM user WHERE ID_USER='$ID_USER'") or die(mysqli_error($koneksi));
			
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
			$NAMA_USER = $_POST['NAMA_USER'];
			$EMAIL_USER = $_POST['EMAIL_USER'];
			$PASSWORD_USER = $_POST['PASSWORD_USER'];
			
			$sql = mysqli_query($koneksi, "UPDATE user SET ID_USER='$ID_USER', NAMA_USER='$NAMA_USER', EMAIL_USER='$EMAIL_USER', PASSWORD_USER='$PASSWORD_USER' WHERE ID_USER='$ID_USER'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="user.php?ID_USER='.$ID_USER.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form action="ubah_user.php?ID_USER=<?php echo $ID_USER; ?>" method="post">
			
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID User</label>
				<div class="col-sm-10">
					<input type="text" name="ID_USER" class="form-control" value="<?php echo $data['ID_USER']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-10">
					<input type="text" name="NAMA_USER" class="form-control" value="<?php echo $data['NAMA_USER']; ?>" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					<input type="text" name="EMAIL_USER" class="form-control" value="<?php echo $data['EMAIL_USER']; ?>" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input type="text" name="PASSWORD_USER" class="form-control" value="<?php echo $data['PASSWORD_USER']; ?>" required>
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