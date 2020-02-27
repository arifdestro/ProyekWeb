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
        <!-- <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="berita.php">Berita</a>
        </li>
        <li class="breadcrumb-item active">Tambah Data Berita</li>
        </ol>
        <hr> -->

        <?php
    if(isset($_POST['submit'])){
        $ID_BERITA			= $_POST['ID_BERITA'];
        $TGL_BERITA			= $_POST['TGL_BERITA'];
        $JUDUL_BERITA		= $_POST['JUDUL_BERITA'];
        $SJ_BERITA			= $_POST['SJ_BERITA'];
        $ISI_BERITA			= $_POST['ISI_BERITA'];


        $cek = mysqli_query($koneksi, "SELECT * FROM berita WHERE ID_BERITA='$ID_BERITA'") or die(mysqli_error($koneksi));
        
        if(mysqli_num_rows($cek) == 0){
            $sql = mysqli_query($koneksi, "INSERT INTO berita(ID_BERITA, TGL_BERITA, JUDUL_BERITA, SJ_BERITA, ISI_BERITA) VALUES('$ID_BERITA', '$TGL_BERITA', '$JUDUL_BERITA', '$SJ_BERITA', '$ISI_BERITA' )") or die(mysqli_error($koneksi));
            
            if($sql){
                echo '<script>alert("Berhasil menambahkan data."); document.location="berita.php";</script>';
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
			Tulis Berita Disini<br/> 
        </h1>	
        <form action="tambah_b.php" method="post">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ID BERITA</label>
            <div class="col-sm-10">
                <input type="text" name="ID_BERITA" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">TANGGAL</label>
            <div class="col-sm-10">
                <input type="date" name="TGL_BERITA" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">JUDUL</label>
            <div class="col-sm-10">
                <input type="text" name="JUDUL_BERITA" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">SUB JUDUL</label>
            <div class="col-sm-10">
                <input type="text" name="SJ_BERITA" class="form-control" required>
            </div>
        </div>

        <textarea class="ckeditor" id="ckeditor" name="ISI_BERITA"></textarea>
        <script>CKEDITOR.replace('ckeditor', {
        filebrowserUploadUrl: 'ckeditor/ck_upload.php',
        filebrowserUploadMethod: 'form'
        });
        </script>
		<br/>
        <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
        <a href="berita.php" class="btn btn-warning">KEMBALI</a>
    </form>
    </div>

    <!-- <form action="tambah_b.php" method="post">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ID BERITA</label>
            <div class="col-sm-10">
                <input type="text" name="ID_BERITA" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">TANGGAL</label>
            <div class="col-sm-10">
                <input type="date" name="TGL_BERITA" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">JUDUL</label>
            <div class="col-sm-10">
                <input type="text" name="JUDUL_BERITA" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">SUB JUDUL</label>
            <div class="col-sm-10">
                <input type="text" name="SJ_BERITA" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ISI BERITA</label>
            <div class="col-sm-10">
                <input type="text" name="ISI_BERITA" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">&nbsp;</label>
            <div class="col-sm-10">
                <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
                <a href="berita.php" class="btn btn-warning">KEMBALI</a>
            </div>
        </div>
    </form>
        
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
        </div>

    </div>
    <!-- /.container-fluid -->

        <!-- Demo scripts for this page-->
    <!-- <script src="js/demo/chart-area-demo.js"></script> -->
    <?php 
                include 'includes/footer.php';
            }else{
    require 'login_admin.php';
    }
?>

