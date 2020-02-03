<?php 
include 'includes/connector.php'; 
include 'includes/header.php';
include 'includes/sidebar.php';
?>

        <div id="content-wrapper">

        <div class="container-fluid">


            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="admin.php">Admin</a>
            </li>
            <li class="breadcrumb-item active">Ubah Data Admin</li>
            </ol>

            <div class="container" style="margin-top:20px">
            <hr>
            
            <?php
            //jika sudah mendapatkan parameter GET id dari URL
            if(isset($_GET['ID_ADMIN'])){
                //membuat variabel $id untuk menyimpan id dari GET id di URL
                $ID_ADMIN = $_GET['ID_ADMIN'];
                
                //query ke database SELECT tabel mahasiswa berdasarkan id = $id
                $select = mysqli_query($koneksi, "SELECT * FROM admin WHERE ID_ADMIN='$ID_ADMIN'") or die(mysqli_error($koneksi));
                
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
                $ID_ADMIN       = $_POST['ID_ADMIN'];
                $NAMA_ADMIN     = $_POST['NAMA_ADMIN'];
                $PASSWORD_ADMIN = $_POST['PASSWORD_ADMIN'];
                
                $sql = mysqli_query($koneksi, "UPDATE admin SET ID_ADMIN='$ID_ADMIN', NAMA_ADMIN='$NAMA_ADMIN', PASSWORD_ADMIN='$PASSWORD_ADMIN' WHERE ID_ADMIN='$ID_ADMIN'") or die(mysqli_error($koneksi));
                
                if($sql){
                    echo '<script>alert("Berhasil menyimpan data."); 
                    document.location="admin.php?ID_ADMIN='.$ID_ADMIN.'";</script>';
                }else{
                    echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
                }
            }
            ?>
            
            <form action="ubah_admin.php?ID_ADMIN=<?php echo $ID_ADMIN; ?>" method="post">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID_ADMIN</label>
                    <div class="col-sm-10">
                        <input type="text" name="ID_ADMIN" class="form-control" value="<?php echo $data['ID_ADMIN']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NAMA ADMIN</label>
                    <div class="col-sm-10">
                        <input type="text" name="NAMA_ADMIN" class="form-control" value="<?php echo $data['NAMA_ADMIN']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">PASSWORD ADMIN</label>
                    <div class="col-sm-10">
                        <input type="text" name="PASSWORD_ADMIN" class="form-control" value="<?php echo $data['PASSWORD_ADMIN']; ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">&nbsp;</label>
                    <div class="col-sm-10">
                        <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
                        <a href="admin.php" class="btn btn-warning">KEMBALI</a>
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
?>
