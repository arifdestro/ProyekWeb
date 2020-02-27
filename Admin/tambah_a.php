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
            <a href="agenda.php">Agenda</a>
        </li>
        <li class="breadcrumb-item active">Tambah Data Agenda</li>
        </ol>
        <hr>

        <?php
    if(isset($_POST['submit'])){
        $ID_AGENDA			= $_POST['ID_AGENDA'];
        $TGL_AGENDA			= $_POST['TGL_AGENDA'];
        $JUDUL_AGENDA		= $_POST['JUDUL_AGENDA'];
        $SJ_AGENDA			= $_POST['SJ_AGENDA'];
        $ISI_AGENDA			= $_POST['ISI_AGENDA'];


        $cek = mysqli_query($koneksi, "SELECT * FROM agenda WHERE ID_AGENDA='$ID_AGENDA'") or die(mysqli_error($koneksi));
        
        if(mysqli_num_rows($cek) == 0){
            $sql = mysqli_query($koneksi, "INSERT INTO agenda(ID_AGENDA, TGL_AGENDA, JUDUL_AGENDA, SJ_AGENDA, ISI_AGENDA) VALUES('$ID_AGENDA', '$TGL_AGENDA', '$JUDUL_AGENDA', '$SJ_AGENDA', '$ISI_AGENDA' )") or die(mysqli_error($koneksi));
            
            if($sql){
                echo '<script>alert("Berhasil menambahkan data."); document.location="agenda.php";</script>';
            }else{
                echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
            }
            }else{
            echo '<div class="alert alert-warning">Gagal, data sudah terdaftar.</div>';
        }
    }
    ?>

    <div class="kotak">
		<h1>
			Tulis Agenda Disini<br/> 
        </h1>	
        <form action="tambah_b.php" method="post">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ID AGENDA</label>
            <div class="col-sm-10">
                <input type="text" name="ID_AGENDA" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">TANGGAL</label>
            <div class="col-sm-10">
                <input type="date" name="TGL_AGENDA" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">JUDUL</label>
            <div class="col-sm-10">
                <input type="text" name="JUDUL_AGENDA" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">SUB JUDUL</label>
            <div class="col-sm-10">
                <input type="text" name="SJ_AGENDA" class="form-control" required>
            </div>
        </div>

        <textarea class="ckeditor" id="ckeditor" name="ISI_AGENDA"></textarea>
        <script>CKEDITOR.replace('ckeditor', {
        filebrowserUploadUrl: 'ckeditor/ck_upload.php',
        filebrowserUploadMethod: 'form'
        });
        </script>
		<br/>
        <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
        <a href="agenda.php" class="btn btn-warning">KEMBALI</a>
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

