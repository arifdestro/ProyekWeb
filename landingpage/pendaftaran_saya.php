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

        <div class="card-header text-center">Dashboard Pendaftaran <?=$NAMA_USER?>
        </div>

        <div class="card-body">
        <div class="form">

            <input hidden type="text" name="ID_USER" value="<?=$ID_USER?>">

            <div class="form-group row justify-content-center">
                <label class="col-md-10 text-center">Hai <?=$NAMA_USER?>, Jika kamu belum pernah melakukan pendaftaran lomba, atau ingin menambah pendaftaran klik Formulir Pendaftaran.</label>
            </div>

            <div class="form-group row justify-content-center m-2">
            <a class="btn btn-info col-md-4 m-2" href="tambah_daftar.php?ID_USER=<?php echo $ID_USER?>">Formulir Pendaftaran</a>
            </div>
            <hr>

            <div class="form-group row justify-content-center">
                <label class="col-md-10 text-center">Riwayat pendaftaran kamu akan tampil di bawah ini.</label>
            </div>

            <?php
            $daftar=mysqli_query($koneksi,"SELECT daftar.ID_DAFTAR, jenis_lomba.ID_JENIS_LOMBA, jenis_lomba.BIAYA, daftar.STATUS_REKOM, daftar.STATUS_FILE, daftar.STATUS_BAYAR FROM daftar, user, jenis_lomba WHERE 
            daftar.ID_JENIS_LOMBA=jenis_lomba.ID_JENIS_LOMBA
            AND daftar.ID_USER=user.ID_USER AND user.ID_USER='$ID_USER'");
            
            ?>

            <?php
            $counter=1;
            while($for_daftar=mysqli_fetch_array($daftar)){
            ?>

            <div class="form-group row mx-2<?php if($counter<=1){ echo " active ";} ?>">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                        <th colspan="2">Pendaftaran ke-</th>
                        <td colspan="2"><?=$counter?></td>
                        </tr>
                        <tr>
                        <th colspan="2">No. Pendaftaran</th>
                        <td colspan="2"><?php echo $for_daftar['ID_DAFTAR']?></td>
                        </tr>
                        <tr>
                        <th colspan="2">Jenis Lomba</th>
                        <td colspan="2"><?php echo $for_daftar['ID_JENIS_LOMBA']?></td>
                        </tr>
                        <tr>
                        <th colspan="2">Jumlah Siswa</th>
                        <td colspan="2">
                        <?php 
                        $ID_DAFTAR=$for_daftar['ID_DAFTAR'];
                        $jumlah_siswa = mysqli_query($koneksi,"SELECT * FROM detail_daftar WHERE ID_DAFTAR='$ID_DAFTAR'");
                        $jumlah=mysqli_num_rows($jumlah_siswa);
                        echo $jumlah;
                        ?></td>
                        </tr>
                        <tr>
                        <th colspan="2">Biaya</th>
                        <td colspan="2"><?php 
                        $BIAYA_LOMBA=$for_daftar['BIAYA'];
                        $TOTAL_BAYAR=$BIAYA_LOMBA*$jumlah;
                        echo $TOTAL_BAYAR;
                        $simpan_total_bayar=mysqli_query($koneksi,"UPDATE daftar SET TOTAL_BAYAR='$TOTAL_BAYAR' WHERE ID_DAFTAR='$ID_DAFTAR'");
                        ?></td>
                        </tr>
                        <tr>
                        <th colspan="2">Surat Rekom</th>
                        <td colspan="2"><?php echo $for_daftar['STATUS_REKOM']?></td>
                        </tr>
                        <tr>
                        <th colspan="2">File Abstrak</th>
                        <td colspan="2"><?php echo $for_daftar['STATUS_FILE']?></td>
                        </tr>
                        <tr>
                        <th colspan="2">Keterangan</th>
                        <td colspan="2"><?php echo $for_daftar['STATUS_BAYAR']?></td>
                        </tr>
                        <tr>
                        <th colspan="2">Aksi</th>
                        <td colspan="2">
                        <a class="btn btn-info m-1" href="tambah_siswa.php?ID_DAFTAR=<?php echo $for_daftar['ID_DAFTAR']?>">Tambah Data Siswa</a>
                        <a class="btn btn-info m-1" href="detail_daftar.php?ID_DAFTAR=<?php echo $for_daftar['ID_DAFTAR']?>&& ID_USER=<?php echo $ID_USER?>">Lihat Detail</a>
                        </td>
                        </tr>
                    </tbody>
                    </table>
            </div>
            <hr>

            <?php
            $counter++;
            }
            ?>

            <div class="form-group row justify-content-center m-2">
            <a class="btn btn-danger col-md-4 m-2" href="index.html">Keluar Dari Dashboard</a>
            </div>

        </div>
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

