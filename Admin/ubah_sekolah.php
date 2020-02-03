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
            <a href="sekolah.php">Sekolah</a>
        </li>
        <li class="breadcrumb-item active">Ubah Data Sekolah</li>
        </ol>

        <div class="container" style="margin-top:20px">
    <hr>
    
    <?php
    //jika sudah mendapatkan parameter GET id dari URL
    if(isset($_GET['NPSN'])){
        //membuat variabel $id untuk menyimpan id dari GET id di URL
        $NPSN = $_GET['NPSN'];
        
        //query ke database SELECT tabel mahasiswa berdasarkan id = $id
        $select = mysqli_query($koneksi, "SELECT * FROM sekolah WHERE NPSN='$NPSN'") or die(mysqli_error($koneksi));
        
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
        $NPSN			= $_POST['NPSN'];
        $NAMA_SEKOLAH	= $_POST['NAMA_SEKOLAH'];
        
        $sql = mysqli_query($koneksi, "UPDATE sekolah SET NPSN='$NPSN', NAMA_SEKOLAH='$NAMA_SEKOLAH' WHERE NPSN='$NPSN'") or die(mysqli_error($koneksi));
        
        if($sql){
            echo '<script>alert("Berhasil menyimpan data."); 
            document.location="sekolah.php?NPSN='.$NPSN.'";</script>';
        }else{
            echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
        }
    }
    ?>
    
    <form action="ubah_sekolah.php?NPSN=<?php echo $NPSN; ?>" method="post">

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">NPSN</label>
            <div class="col-sm-10">
                <input type="text" name="NPSN" class="form-control" value="<?php echo $data['NPSN']; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">NAMA SEKOLAH</label>
            <div class="col-sm-10">
                <input type="text" name="NAMA_SEKOLAH" class="form-control" value="<?php echo $data['NAMA_SEKOLAH']; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">&nbsp;</label>
            <div class="col-sm-10">
                <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
                <a href="sekolah.php" class="btn btn-warning">KEMBALI</a>
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