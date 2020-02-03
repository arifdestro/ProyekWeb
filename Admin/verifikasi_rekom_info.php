<?php 
session_start();
$_SESSION['active_link']=['admin'];
include 'includes/connector.php'; 

if(isset($_SESSION['admin_login'])){
    include 'includes/header.php' ;
    include 'includes/sidebar.php' ;

    if (isset($_GET['ID_DAFTAR'])) {
        // $id_transaksi = $_GET['id_transaksi'];
        $ID_DAFTAR = $_GET['ID_DAFTAR'];

        $result_trs = mysqli_query($koneksi,  
        "SELECT daftar.ID_DAFTAR,
        daftar.STATUS_REKOM,
        daftar.TGL_DAFTAR, 
        daftar.SURAT_REKOM, 
        daftar.STATUS_BAYAR, 
        daftar.STATUS_FILE,
        daftar.FILE_ABSTRAK,
        jenis_lomba.ID_JENIS_LOMBA, jenis_lomba.NAMA_LOMBA,
        rayon.ID_RAYON, rayon.NAMA_RAYON,
        user.ID_USER, user.NAMA_USER,
        admin.ID_ADMIN,
        sekolah.NPSN, sekolah.NAMA_SEKOLAH
        FROM daftar, jenis_lomba, rayon, user, admin, sekolah
        WHERE 
        daftar.ID_JENIS_LOMBA = jenis_lomba.ID_JENIS_LOMBA
        AND daftar.ID_RAYON = rayon.ID_RAYON
        AND daftar.ID_USER = user.ID_USER
        AND daftar.ID_ADMIN = admin.ID_ADMIN
        AND daftar.NPSN = sekolah.NPSN
        AND daftar.ID_DAFTAR='$ID_DAFTAR'");

        $data_dtr = mysqli_fetch_assoc($result_trs);
        $NAMA_USER = $data_dtr['NAMA_USER'];
        $TGL_DAFTAR = $data_dtr['TGL_DAFTAR'];
        $ID_DAFTAR = $data_dtr['ID_DAFTAR'];
        $SURAT_REKOM = $data_dtr['SURAT_REKOM'];
        $STATUS_REKOM = $data_dtr['STATUS_REKOM'];
    }
    ?>

<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card my-5 shadow">
                <div class="card-header text-center text-light bg-info">
                    <h2 class="mb-0">Detail Transaksi</h2>
                </div>
                <div class="card-body px-5 py-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6 class="d-inline sm">Nama User :</h6>
                            <label><?= $NAMA_USER?></label><br>
                            <h6 class="d-inline sm">Tgl Daftar :</h6>
                            <label><?= $TGL_DAFTAR?></label><br>
                            <h6 class="d-inline">ID Daftar : </h6>
                            <label><?= $ID_DAFTAR?></label><br>
                            <h6 class="d-inline">Surat Rekom :</h6>
                            <label><?= $SURAT_REKOM?></label><br>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <?php
                        $data2 = mysqli_query($koneksi, "SELECT STATUS_FILE FROM daftar WHERE ID_DAFTAR ='$ID_DAFTAR'");
                        $data_trs = mysqli_fetch_array($data2);
                        $status_trs = $data_trs['STATUS_FILE'];
                        if ($status_trs == 'Belum Terverifikasi') {
                            echo '<a href="verifikasi_rekom_query.php?action=update&ID_DAFTAR='. $ID_DAFTAR .'" class="btn btn-primary">Verifikasi</a>';
                        }else if ($status_trs== 'Sudah Terverifikasi'){
                            echo "Sudah Terverifikasi";
                        }
                        ?>
                    <a href="verifikasi_rekom.php" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
                include 'includes/footer.php';
            }else{
    require 'login_admin.php';
    }
?>