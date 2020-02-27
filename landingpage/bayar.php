<?php 
session_start();
include 'includes/connector.php'; 

if(isset($_SESSION['user_login'])){
    include 'includes/header.php';
    $ID_USER=$_SESSION['ID_USER'];
    $NAMA_USER=$_SESSION['NAMA_USER'];
    $ID_DAFTAR=$_GET['ID_DAFTAR'];
?>
<div class="container mt-2 mb-5">
    <div class="card">

        <div class="card-header text-center">
            Formulir Pembayaran
        </div>

        <div class="card-body">
        <div class="form">
            <form action="upload_bayar.php" method="POST">
            <div class="form-group row justify-content-center">
                <legend class="col-form-label mr-2 col-sm-2 pt-0">Pilih BANK</legend>
                    <?php
                    $jl=mysqli_query($koneksi,"SELECT * FROM bank");                     
                    $counter=1;
                    while($for_jl=mysqli_fetch_array($jl)){
                    ?>
                        <div class="form-check ml-2">
                            <input class="form-check-input" type="radio" name="BANK" value="<?php echo $for_jl['ID_BANK']?>" required>
                            <label class="form-check-label mr-4" for="gridRadios1"><?php echo $for_jl['NAMA_BANK']?></label>
                        </div>
                    <?php
                    } $counter++;
                    ?>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-md-2">Nomor Rek</label>
                <input required readonly type="text" class="form-control col-md-3" id="NPSN" name="NPSN" >
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-md-2">Atas Nama</label>
                <input required readonly type="text" class="form-control col-md-3" id="NPSN" name="NPSN" >
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-md-2">Jumlah Bayar</label>
                <input required readonly type="text" class="form-control col-md-3" id="NPSN" name="NPSN" >
            </div>

            <div class="form-group row justify-content-center">
                <button type="submit" class="btn btn-info col-md-2 m-2" name="pilih_bayar">Pilih</button>
                <a class="btn btn-danger col-md-2 m-2" href="detail_daftar.php?">Batal</a>
            </div>
            
            </form>
        </div>

        <div class="card-footer text-center">
        Halaman ini digunakan untuk memilih metode Pembayaran
        </div>

        </div>
        </div>

        </div>
        

    </div>
</div>
<?php
include 'includes/footer.php';

}else{
echo '
<script>alert("Mohon Maaf, Halaman tidak dapat diakses. Anda harus Login sebagai User untuk mengakses Pendaftaran Lomba"); document.location="index.php";</script>';
}
?>