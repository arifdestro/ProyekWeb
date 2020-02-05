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
        "SELECT daftar.ID_DAFTAR, daftar.TGL_DAFTAR, user.NAMA_USER, bayar.ID_BAYAR, 
        bayar.TGL_BAYAR, daftar.STATUS_BAYAR, bayar.BUKTI_BAYAR
        FROM daftar, bayar, user 
        WHERE daftar.ID_USER = user.ID_USER 
        AND bayar.ID_DAFTAR = daftar.ID_DAFTAR
        AND daftar.ID_DAFTAR='$ID_DAFTAR'");

        $data_dtr = mysqli_fetch_assoc($result_trs);
        $NAMA_USER = $data_dtr['NAMA_USER'];
        $TGL_DAFTAR = $data_dtr['TGL_DAFTAR'];
        $ID_DAFTAR = $data_dtr['ID_DAFTAR'];
        $TGL_BAYAR = $data_dtr['TGL_BAYAR'];
        $ID_BAYAR = $data_dtr['ID_BAYAR'];
        $STATUS_BAYAR = $data_dtr['STATUS_BAYAR'];
        $BUKTI_BAYAR= $data_dtr['BUKTI_BAYAR'];
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
                            <h6 class="d-inline sm">ID DAFTAR : </h6>
                            <label><?= $ID_DAFTAR ?></label><br>
                            <h6 class="d-inline sm">Nama User : </h6>
                            <label><?= $NAMA_USER ?></label><br>
                            <h6 class="d-inline">Tanggal Daftar : </h6>
                            <label><?= $TGL_DAFTAR ?></label><br>
                            <h6 class="d-inline">Tanggal Bayar : </h6>
                            <label class="font-wight-bold"><?= $TGL_BAYAR ?></label><br>
                            <h6 class="d-inline">ID BAYAR :</h6>
                            <label><?= $ID_BAYAR ?></label>
                        </div>
                            <div>
                            <img class="img-responsive" src="../User/src/bukti_transfer/<?=$BUKTI_BAYAR?>" alt="Chania" width="300" height="500"> 
                            </div>
                    </div>
                </div>
                <div class="card-footer">
                    <?php
                        $data2 = mysqli_query($koneksi, "SELECT STATUS_BAYAR FROM daftar WHERE ID_DAFTAR ='$ID_DAFTAR'");
                        $data_trs = mysqli_fetch_array($data2);
                        $status_trs = $data_trs['STATUS_BAYAR'];
                        if ($status_trs == 'Proses Verif') {
                            echo '<a href="bayar_info_query_sp.php?action=update&ID_DAFTAR='. $ID_DAFTAR .'" class="btn btn-primary">Verifikasi</a>';
                        }else if ($status_trs=='Sudah Bayar'){
                            echo '';
                        }
                        ?>
                    <a href="bayar_sp.php" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                    <br><br>
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