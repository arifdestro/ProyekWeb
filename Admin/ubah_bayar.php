<?php 
session_start();
$_SESSION['active_link']=['admin'];
include 'includes/connector.php'; 

if(isset($_SESSION['admin_login'])){
    include 'includes/header.php' ;
    include 'includes/sidebar.php' ;
    ?>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<div class="container" style="margin-top:20px">
		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['ID_BAYAR'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$ID_USER = $_GET['ID_BAYAR'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT user.ID_USER, user.NAMA_USER, daftar.TGL, daftar.STATUS, bayar.ID_BAYAR, bayar.ID_DAFTAR, bayar.TGL_BAYAR 
            FROM user, daftar, bayar 
            WHERE daftar.ID_USER=user.ID_USER
            AND bayar.ID_DAFTAR=daftar.ID_DAFTAR
            ORDER BY ID_BAYAR ASC ") or die(mysqli_error($koneksi));
			
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
			$STATUS = $_POST['STATUS'];
			
			$sql = mysqli_query($koneksi, "UPDATE user SET ID_USER='$ID_USER', NAMA_USER='$NAMA_USER', EMAIL_USER='$EMAIL_USER', PASSWORD_USER='$PASSWORD_USER' WHERE ID_USER='$ID_USER'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="user.php?ID_USER='.$ID_USER.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

    <div id="content-wrapper">
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
        </ol>

            <div class="container" style="margin-top:20px">
        <h2>UBAH DATA SISWA</h2>
        
        <hr>
        
        <?php
        //jika sudah mendapatkan parameter GET id dari URL
        if(isset($_GET['ID_BAYAR'])){
            //membuat variabel $id untuk menyimpan id dari GET id di URL
            $ID_BAYAR = $_GET['ID_BAYAR'];
            
            //query ke database SELECT tabel mahasiswa berdasarkan id = $id
            $select = mysqli_query($koneksi, 
            "SELECT user.ID_USER, user.NAMA_USER, daftar.TGL, daftar.STATUS, bayar.ID_BAYAR, bayar.ID_DAFTAR, bayar.TGL_BAYAR 
            FROM user, daftar, bayar 
            WHERE daftar.ID_USER=user.ID_USER
            AND bayar.ID_DAFTAR=daftar.ID_DAFTAR
            ORDER BY ID_BAYAR ASC ") or die(mysqli_error($koneksi));
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
            $NAMA_USER		= $_POST['NAMA_USER'];
            $TGL            = $_POST['TGL'];
            $ID_DAFTAR      = $_POST['ID_DAFTAR'];
            $TGL_BAYAR      = $_POST['TGL_BAYAR'];
            $ID_BAYAR       = $_POST['ID_BAYAR'];
            $STATUS         = $_POST['STATUS'];
            
            $sql = mysqli_query($koneksi, "UPDATE bayar SET STATUS='$STATUS' WHERE ID_BAYAR='$ID_BAYAR'") or die(mysqli_error($koneksi));
            
            if($sql){
                echo '<script>alert("Berhasil menyimpan data."); 
                document.location="bayar.php?ID_BAYAR='.$ID_BAYAR.'";</script>';
            }else{
                echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
            }
        }
        ?>
        
        <form action="ubah_bayar.php?ID_BAYAR=<?php echo $ID_BAYAR; ?>" method="post">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
            <tr>
                <th>NAMA USER</th>
                <th>TGL DAFTAR</th>
                <th>ID DAFTAR</th>
                <th>TGL BAYAR</th>
                <th>ID BAYAR</th>
                <th>STATUS</th>
                <th>AKSI</th>
            </tr>
            </thead>
            <tbody>
                    <?php
                        echo '
                        <tr>
                            <td>'.$data['NAMA_USER'].'</td>
                            <td>'.$data['TGL'].'</td>
                            <td>'.$data['ID_BAYAR'].'</td>
                            <td>'.$data['ID_DAFTAR'].'</td>
                            <td>'.$data['TGL_BAYAR'].'</td>
                            <td>'.$data['STATUS'].'</td>
                            <td>
                                <a href="#?ID_BAYAR='.$data['ID_BAYAR'].'" class="badge badge-success">Verifikasi</a>
                            </td>
                        </tr>
                        ';
                    ?>
            <body>
        </table>
        </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">&nbsp;</label>
                <div class="col-sm-10">
                    <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
                    <a href="bayar.php" class="btn btn-warning">KEMBALI</a>
                </div>
            </div>
        </form>
        
    </div>
            
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
