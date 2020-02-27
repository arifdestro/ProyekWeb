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
            <a href="slideshow.php">slideshow</a>
        </li>
        <li class="breadcrumb-item active">Tambah Data slideshow</li>
        </ol>
        <hr>
<?php
        if(isset($_POST['submit_ss'])){
        $ID_SS			= $_POST['ID_SS'];
        $JUDUL_SS		= $_POST['JUDUL_SS'];
        $ISI_SS		    = $_POST['ISI_SS'];

        $cek = mysqli_query($koneksi, "SELECT * FROM slideshow WHERE ID_SS='$ID_SS'") or die(mysqli_error($koneksi));
        
        if(mysqli_num_rows($cek) == 0){

        $ekstensi_boleh = array('jpg', 'JPG'); //ekstensi file yang boleh diupload
        $nama = $_FILES['NAMA_SS']['name']; //menunjukkan letak dan nama file yang akan di upload
        $ex = explode ('.',$nama); //explode berfungsi memecahkan/memisahkan string sesuai dengan tanda baca yang ditentukan
        $ekstensi = strtolower(end($ex)); //end = mengambil nilai terakhir dari ex, dtrtolower = memanipulasi string menjadi huruf kecil 
        $size = $_FILES['NAMA_SS']['size']; //untuk mendapatkan size file yang diupload
        $file_temporary = $_FILES['NAMA_SS']['tmp_name']; //untuk mendapatkan temporary file yang di upload


            if(in_array($ekstensi,$ekstensi_boleh)===true){
            if($size < 3132210 && $size != 0){ 
                $id = rand(0,100);
                $uniq = uniqid($id,true);
                move_uploaded_file($file_temporary, '../landingpage/assets/img/slide/'.$uniq.'.'.$ekstensi); //untuk upload file
                $sql = mysqli_query($koneksi, "INSERT INTO slideshow VALUES('$ID_SS', '$uniq.$ekstensi', '$JUDUL_SS', '$ISI_SS' )") or die(mysqli_error($koneksi));
                
                if($sql) {
                    echo '<script>alert("Berhasil menambahkan data."); document.location="slideshow.php";</script>';
                }else{
                    echo '<script>alert("Gagal menambahkan data."); document.location="slideshow.php";</script>';
                }
            }else{
                echo '<script>alert("Foto terlalu besar."); document.location="slideshow.php";</script>';
            }
            }else{
                echo '<script>alert("Ekstensi tidak diperbolehkan."); document.location="slideshow.php";</script>';
            }
            }else{
            echo '<div class="alert alert-warning">Gagal, data sudah terdaftar.</div>';
        }
    }
?>
    <form action="tambah_ss.php" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ID_SS</label>
            <div class="col-sm-10">
                <input type="text" name="ID_SS" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">JUDUL SLIDE</label>
            <div class="col-sm-10">
                <input type="text" name="JUDUL_SS" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">TEKS SLIDE</label>
            <div class="col-sm-10">
                <input type="text" name="ISI_SS" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 ">UPLOAD GAMBAR</label>
            <div class="col-sm-10">
                <input type="file" name='NAMA_SS' required
                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                </div>
        </div>
        <br>
        <img id="blah" alt="your image" width="576px" height="324px" />
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">&nbsp;</label>
            <div class="col-sm-10">
            <br>
                <input type="submit" name="submit_ss" class="btn btn-primary" value="SIMPAN">
                <a href="slideshow.php" class="btn btn-warning">KEMBALI</a>
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

