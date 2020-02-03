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
            <a href="jenis_lomba.php">Jenis Lomba</a>
        </li>
        <li class="breadcrumb-item active">Ubah Data Jenis Lomba</li>
        </ol>


    <?php
    //jika sudah mendapatkan parameter GET id dari URL
    if(isset($_GET['ID_JENIS_LOMBA'])){
        //membuat variabel $id untuk menyimpan id dari GET id di URL
        $ID_JENIS_LOMBA = $_GET['ID_JENIS_LOMBA'];
        
        //query ke database SELECT tabel mahasiswa berdasarkan id = $id
        $select = mysqli_query($koneksi, "SELECT * FROM jenis_lomba WHERE ID_JENIS_LOMBA='$ID_JENIS_LOMBA'") or die(mysqli_error($koneksi));
        
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
        $ID_JENIS_LOMBA		= $_POST['ID_JENIS_LOMBA'];
        $NAMA_LOMBA	        = $_POST['NAMA_LOMBA'];
        $BIAYA              = $_POST['BIAYA'];
        
        $sql = mysqli_query($koneksi, "UPDATE jenis_lomba SET ID_JENIS_LOMBA='$ID_JENIS_LOMBA', NAMA_LOMBA='$NAMA_LOMBA', BIAYA='$BIAYA' WHERE ID_JENIS_LOMBA='$ID_JENIS_LOMBA'") or die(mysqli_error($koneksi));
        
        if($sql){
            echo '<script>alert("Berhasil menyimpan data."); document.location="jenis_lomba.php?ID_JENIS_LOMBA='.$ID_JENIS_LOMBA.'";</script>';
        }else{
            echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
        }
    }
    ?>
    
    <form action="ubah_jl.php?ID_JENIS_LOMBA=<?php echo $ID_JENIS_LOMBA; ?>" method="post">

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ID JL</label>
            <div class="col-sm-10">
                <input type="text" name="ID_JENIS_LOMBA" class="form-control" value="<?php echo $data['ID_JENIS_LOMBA']; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">NAMA LOMBA</label>
            <div class="col-sm-10">
                <input type="text" name="NAMA_LOMBA" class="form-control" value="<?php echo $data['NAMA_LOMBA']; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">BIAYA</label>
            <div class="col-sm-10">
                <input type="text" name="BIAYA" class="form-control" value="<?php echo $data['BIAYA']; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">&nbsp;</label>
            <div class="col-sm-10">
                <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
                <a href="jenis_lomba.php" class="btn btn-warning">KEMBALI</a>
            </div>
        </div>
    </form>
</div>

    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>

    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
        </div>
        </div>
    </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

    <script src="js/demo/chart-area-demo.js"></script>
    <?php 
                include 'includes/footer.php';
            }else{
    require 'login_admin.php';
    }
?>