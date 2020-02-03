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
            <a href="siswa.php">Siswa</a>
        </li>
        <li class="breadcrumb-item active">Ubah Data Siswa</li>
        </ol>

            <div class="container" style="margin-top:20px">
        <hr>
        
        <?php
        //jika sudah mendapatkan parameter GET id dari URL
        if(isset($_GET['NISN'])){
            //membuat variabel $id untuk menyimpan id dari GET id di URL
            $NISN = $_GET['NISN'];
            
            //query ke database SELECT tabel mahasiswa berdasarkan id = $id
            $select = mysqli_query($koneksi, "SELECT * FROM siswa WHERE NISN='$NISN'") or die(mysqli_error($koneksi));
            
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
            $NISN			= $_POST['NISN'];
            $NAMA_SISWA     = $_POST['NAMA_SISWA'];
            $TEMPAT_LAHIR   = $_POST['TEMPAT_LAHIR'];
            $TANGGAL_LAHIR  = $_POST['TANGGAL_LAHIR'];
            $JENIS_KELAMIN  = $_POST['JENIS_KELAMIN'];
            $ALAMAT         = $_POST['ALAMAT'];
            
            $sql = mysqli_query($koneksi, "UPDATE siswa SET NISN='$NISN', NAMA_SISWA='$NAMA_SISWA', TEMPAT_LAHIR='$TEMPAT_LAHIR', JENIS_KELAMIN='$JENIS_KELAMIN', ALAMAT='$ALAMAT'  WHERE NISN='$NISN'") or die(mysqli_error($koneksi));
            
            if($sql){
                echo '<script>alert("Berhasil menyimpan data."); 
                document.location="siswa.php?NISN='.$NISN.'";</script>';
            }else{
                echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
            }
        }
        ?>
        
        <form action="ubah_siswa.php?NISN=<?php echo $NISN; ?>" method="post">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NISN</label>
                <div class="col-sm-10">
                    <input type="text" name="NISN" class="form-control" value="<?php echo $data['NISN']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NAMA SISWA</label>
                <div class="col-sm-10">
                    <input type="text" name="NAMA_SISWA" class="form-control" value="<?php echo $data['NAMA_SISWA']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">TEMPAT LAHIR</label>
                <div class="col-sm-10">
                    <input type="text" name="TEMPAT_LAHIR" class="form-control" value="<?php echo $data['TEMPAT_LAHIR']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">TANGGAL LAHIR</label>
                <div class="col-sm-10">
                    <input type="date" name="TANGGAL_LAHIR" class="form-control" value="<?php echo $data['TANGGAL_LAHIR']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-2 col-form-label">JENIS KELAMIN</label>
            <div class="col-sm-10">
                <select class="form-control" name="JENIS_KELAMIN">
                <option value="LAKI LAKI">LAKI LAKI</option>
                <option value="PEREMPUAN">PEREMPUAN</option>
                </select>
            </div>
        </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ALAMAT</label>
                <div class="col-sm-10">
                    <input type="text" name="ALAMAT" class="form-control" value="<?php echo $data['ALAMAT']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">&nbsp;</label>
                <div class="col-sm-10">
                    <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
                    <a href="siswa.php" class="btn btn-warning">KEMBALI</a>
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