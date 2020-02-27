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

        <div class="card-header text-center">Detail Pendaftaran dan Pembayaran
        </div>

        <div class="card-body">
        <div class="form">

            <?php
            $daftar=mysqli_query($koneksi,"SELECT * FROM daftar WHERE ID_DAFTAR='$ID_DAFTAR'");
            $for_daftar=mysqli_fetch_array($daftar);
            ?>

            <div class="form-group row justify-content-center ">
                <label>1. Detail Pendaftaran</label>
            </div>

            <div class="form-group row justify-content-center ">
                <label class="col-md-2">NPSN</label>
                <input required readonly type="text" class="form-control col-md-3"  name="NPSN" value="<?=$for_daftar['NPSN']?>">
            </div>

            <?php
            $nama_sekolah=mysqli_query($koneksi,"SELECT NAMA_SEKOLAH FROM sekolah,daftar WHERE sekolah.NPSN=daftar.NPSN AND daftar.ID_DAFTAR='$ID_DAFTAR'");
            $for_nama=mysqli_fetch_array($nama_sekolah);
            ?>

            <div class="form-group row justify-content-center">
                <label class="col-md-2">Nama Sekolah</label>
                <input required readonly type="text" class="form-control col-md-3"  name="NAMA_SEKOLAH" value="<?=$for_nama['NAMA_SEKOLAH']?>">
            </div>

            <?php
            $nama_lomba=mysqli_query($koneksi,"SELECT NAMA_LOMBA FROM jenis_lomba, daftar WHERE jenis_lomba.ID_JENIS_LOMBA=daftar.ID_JENIS_LOMBA AND daftar.ID_DAFTAR='$ID_DAFTAR'");
            $for_lomba=mysqli_fetch_array($nama_lomba);
            ?>

            <div class="form-group row justify-content-center">
                <label class="col-md-2" for="">Jenis Lomba</label>
                <input required readonly type="text" class="form-control col-md-3"  name="JENIS_LOMBA" value="<?=$for_lomba['NAMA_LOMBA']?>">
            </div>

            <?php
            $nama_rayon=mysqli_query($koneksi,"SELECT NAMA_RAYON FROM rayon, daftar WHERE rayon.ID_RAYON=daftar.ID_RAYON AND daftar.ID_DAFTAR='$ID_DAFTAR'");
            $for_rayon=mysqli_fetch_array($nama_rayon);
            ?>

            <div class="form-group row justify-content-center">
                <label class="col-md-2" for="">Rayon</label>
                <input required readonly type="text" class="form-control col-md-3"  name="RAYON" value="<?=$for_rayon['NAMA_RAYON']?>">
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-md-2" for="">Surat Rekom</label>
                <input required readonly type="text" class="form-control col-md-3"  name="SURAT_REKOM" value="<?=$for_daftar['SURAT_REKOM']?>">
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-md-2" for="">File Abstrak</label>
                <input required readonly type="text" class="form-control col-md-3"  name="FILE_ABSTRAK" value="<?=$for_daftar['FILE_ABSTRAK']?>">
            </div>
            <br>
            <hr>

        </div>

        <!-- batas form1 -->
        <div class="form">
            <br>
            <div class="form-group row justify-content-center">
                <label class="col-md-10 text-center">2. Data Siswa yang Anda Daftarkan</label>
            </div>
            <br>

            <?php
            $detail=mysqli_query($koneksi,"SELECT * FROM daftar, siswa, detail_daftar 
            WHERE
            detail_daftar.ID_DAFTAR=daftar.ID_DAFTAR 
            AND detail_daftar.NO_PESERTA=siswa.NO_PESERTA
            AND daftar.ID_DAFTAR='$ID_DAFTAR'");

            $counter1=1;
            while($for_siswa=mysqli_fetch_array($detail)){
            ?>
            <div class="form-group row mx-2<?php if($counter1<=1){ echo " active ";} ?>">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                        <th colspan="2">Data Siswa ke-</th>
                        <td colspan="2"><?=$counter1?></td>
                        </tr>
                        <tr>
                        <th colspan="2">No Peserta</th>
                        <td colspan="2"><?php echo $for_siswa['NO_PESERTA']?></td>
                        </tr>
                        <tr>
                        <th colspan="2">NISN</th>
                        <td colspan="2"><?php echo $for_siswa['NISN']?></td>
                        </tr>
                        <tr>
                        <th colspan="2">NAMA SISWA</th>
                        <td colspan="2"><?php echo $for_siswa['NAMA_SISWA']?></td>
                        </tr>
                        <tr>
                        <th colspan="2">Jenis Kelamin</th>
                        <td colspan="2"><?php echo $for_siswa['JENIS_KELAMIN']?></td>
                        </tr>
                        <tr>
                        <th colspan="2" width="250px"">Foto</th>
                        <td colspan="2"><?php echo $for_siswa['FOTO']?></td>
                        <!-- <td colspan="2" width="250px"><img href="src/img/----------" alt="your image" width="150" height="200" /></td> -->
                        </tr>
                        <tr>
                        <th colspan="2">Aksi</th>
                        <td colspan="2">
                        <a class="btn btn-danger m-1" href="hapus_siswa.php?NO_PESERTA=<?php echo$for_siswa['NO_PESERTA']?>&&ID_DAFTAR=<?php echo$for_siswa['ID_DAFTAR']?>">Hapus</a>
                        <a class="btn btn-warning m-1" href="detail_daftar.php?ID_DAFTAR=<?php echo $for_siswa['ID_DAFTAR']?>&& ID_USER=<?php echo $ID_USER?>">Edit</a>
                        </td>
                        </tr>
                    </tbody>
                    </table>
            </div>

            <?php
            $counter1++;
            }
            ?>

            <div class="form-group row justify-content-center">
                <a class="btn btn-danger m-1" href="pendaftaran_saya.php?">Kembali ke Dashboard</a>
                <a class="btn btn-info m-1" href="tambah_siswa.php?ID_DAFTAR=<?php echo $for_daftar['ID_DAFTAR']?>&& ID_USER=<?php echo $ID_USER?>">Tambah Siswa</a>
                <a class="btn btn-primary m-1" href="bayar.php?ID_DAFTAR=<?php echo $for_daftar['ID_DAFTAR']?>&& ID_USER=<?php echo $ID_USER?>">Lanjut ke Pembayaran</a>
            </div>
            <hr>

        </div>
        <!-- batas form2 -->
        <?php
        $bayar=mysqli_query($koneksi, "SELECT * FROM bayar WHERE bayar.ID_DAFTAR='$ID_DAFTAR'");
        $counter9=1;
        while ($for_bayar=mysqli_fetch_array($bayar)){
        ?>
        <div class="form <?php if($counter9 <=1){ echo " active ";} ?>">
            <br>
            <div class="form-group row justify-content-center">
                <label>3. Tagihan Anda</label>
            </div>
            <br>

            <div class="form-group row justify-content-center">
                <label class="col-md-2">BANK</label>
                <input required readonly type="text" class="form-control col-md-3"  name="NAMA_BANK" value="<?=$for_bayar[NAMA_BANK]?>" >
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-md-2">Nomor Rek</label>
                <input required readonly type="text" class="form-control col-md-3"  name="NO_REK" value="<?=$for_bayar[NO_REK]?>">
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-md-2">Atas Nama</label>
                <input required readonly type="text" class="form-control col-md-3"  name="NAMA_REK" value="<?=$for_bayar[NAMA_REK]?>>
            </div>

            <?php
            $total=mysqli_query($koneksi,"SELECT TOTAL_BAYAR FROM daftar WHERE ID_DAFTAR='$ID_DAFTAR'");
            ?>

            <div class="form-group row justify-content-center">
                <label class="col-md-2">Jumlah Bayar</label>
                <input required readonly type="text" class="form-control col-md-3"  name="JUMLAH_BAYAR" value="<?=$for_total[JUMLAH_BAYAR]?>>
            </div>

            <div class="form-group row justify-content-center">
                <button class="btn btn-info col-md-2 m-2">Pilih</button>
                <button class="btn btn-danger col-md-2 m-2">Batal</button>
            </div>
            <hr>
        </div>
        <?php
            $counter9++;
            }
        ?>
        <!-- batas form3 -->

        </div>
        <!-- batas card body -->

        </div>
        <div class="card-footer text-center">
        Halaman ini digunakan untuk Finalisasi data dan Pembayaran.
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