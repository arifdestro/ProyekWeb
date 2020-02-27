<?php 
session_start();
include 'includes/connector.php'; 

if(isset($_SESSION['user_login'])){
    include 'includes/header.php';
    $ID_USER=$_SESSION['ID_USER'];
    $NAMA_USER=$_SESSION['NAMA_USER'];
    $ID_DAFTAR=$_GET['ID_DAFTAR'];
    // var_dump($ID_DAFTAR);
?>
<div class="container mt-2 mb-5">
    <div class="card">

        <div class="card-header text-center">Formulir Siswa
        </div>

        <div class="card-body">
        <form action="upload_siswa.php" method="POST" enctype="multipart/form-data">


            <input hidden type="text" class="form-control col-md-3" name="ID_DAFTAR" value="<?=$ID_DAFTAR?>">


            <div class="form-group row justify-content-center">
                <label class="col-md-2">NISN</label>
                <input required type="text" class="form-control col-md-3" name="NISN">
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-md-2">Nama Siswa</label>
                <input required type="text" class="form-control col-md-3" name="NAMA_SISWA" >
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-md-2">Tempat Lahir</label>
                <input required type="text" class="form-control col-md-3" name="TEMPAT_LAHIR" >
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-md-2">Tanggal Lahir</label>
                <input required type="date" class="form-control col-md-3" name="TANGGAL_LAHIR" >
            </div>

            <div class="form-group row justify-content-center">
                <legend class="col-form-label col-md-2 pt-0 mr-4">Jenis Kelamin</legend>
                    <div class="form-check ml-2">
                    <input class="form-check-input" type="radio" name="JENIS_KELAMIN" value="LAKI LAKI" required>
                    <label class="form-check-label mr-4" for="gridRadios1">
                        Laki-laki
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="JENIS_KELAMIN" value="PEREMPUAN" required>
                    <label class="form-check-label mr-4" for="gridRadios2">
                        Perempuan
                    </label>
                    </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-md-2">Alamat</label>
                <input required type="text" class="form-control col-md-3"  name="ALAMAT" >
            </div>

            <div class="form-group row justify-content-center">
            <label class="col-md-2 ml-5">Foto</label>
            <input type="file" name="FOTO" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
            </div>

            <div class="form-group row justify-content-center">
            <label class="col-md-2"></label>
            <img id="blah" alt="your image" width="150" height="200" />
            </div>
            <hr>

            <div class="form-group row  justify-content-center ">
            <a class="btn btn-danger col-md-2 m-2" href="pendaftaran_saya.php">Batal</a>
            <button type="submit" class="btn btn-info col-md-2 m-2" name="tambah_siswa">Simpan</button>
            </div>

        </form>
        </div>

        </div>
        <div class="card-footer text-center">
        Halaman ini digunakan untuk pengisian Formulir Pendaftaran Siswa
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