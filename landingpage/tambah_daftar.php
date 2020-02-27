<?php 
session_start();
include 'includes/connector.php'; 

if(isset($_SESSION['user_login'])){
    include 'includes/header.php';
    $ID_USER=$_SESSION['ID_USER'];
    $NAMA_USER=$_SESSION['NAMA_USER'];

?>
<div class="container mt-2 mb-5">
    <div class="card">

        <div class="card-header text-center">Formulir Pendaftaran Lomba
        </div>

        <div class="card-body">
        <form action="upload_daftar.php" method="POST" enctype="multipart/form-data">

            <input type="text" name="ID_USER" value="<?= $ID_USER ?>"hidden>

            <div class="form-group row justify-content-center ">
                <label class="col-md-2 ">NPSN</label>
                <input required type="text" class="form-control col-md-3 " name="NPSN">
                <!-- <button class="btn btn-info ml-4" id="btn-search">Cari</button> -->
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-md-2">Nama Sekolah</label>
                <input required type="text" class="form-control col-md-3" name="NAMA_SEKOLAH" >
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-md-2" for="">Jenis Lomba</label>
                <select class="form-control col-md-3" name="ID_JENIS_LOMBA">
                <?php
                $jl=mysqli_query($koneksi,"SELECT * FROM jenis_lomba");                                  
                $counter=1;
                while($for_jl=mysqli_fetch_array($jl)){
                ?>
                    <option value="<?php echo $for_jl['ID_JENIS_LOMBA']?>"><?php echo $for_jl['NAMA_LOMBA']?></option>
                <?php
                } $counter++;
                ?>
                </select>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-md-2" for="">Rayon</label>
                <select class="form-control col-md-3" name="ID_RAYON">
                <?php
                $ry=mysqli_query($koneksi,"SELECT * FROM rayon");                                  
                $counter2=1;
                while($for_ry=mysqli_fetch_array($ry)){
                ?> 
                    <option value="<?php echo $for_ry['ID_RAYON']?>"><?php echo $for_ry['NAMA_RAYON']?></option>
                <?php
                } $counter2++;
                ?>
                </select>
            </div>

            <div class="form-group row justify-content-center">
            <label class="col-md-2 ml-5" >Surat Rekom *</label>
            <input required class="mx-2" name="SURAT_REKOM" type="file">
            </div>

            <div class="form-group row justify-content-center">
            <label class="col-md-2 ml-5" >File Abstrak **</label>
            <input class="mx-2" name="FILE_ABSTRAK" type="file">
            </div>

            <hr>

            <div class="form-group row  justify-content-center">
            <a class="btn btn-danger col-md-2 m-2" href="pendaftaran_saya.php">Kembali</a>
            <button type="submit" class="btn btn-info col-md-2 m-2" name="tambah_daftar">Simpan</button>
            </div>

        </form>
        </div>

        </div>
        <div class="card-footer text-center">
        Halaman ini digunakan untuk pengisian Formulir Pendaftaran Lomba
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