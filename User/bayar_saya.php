<?php
session_start();
include 'includes/connector.php';
include 'includes/header.php';

if (isset($_SESSION['user_login'])) {
    $NAMA_USER = $_SESSION['NAMA_USER'];
    $ID_USER = $_SESSION['ID_USER'];

?>

    <section class="site-banner1 mb-2">
        <div class="container container-fluid-lg justify-content-center">
            <div class="row">
                <div class="col-lg-12 col-md-12 m-5 site-title">
                    <h1 class="title-text text-uppercase text-white">Pendaftaran Lomba</h1>
                    <div class="daftaran flo">
                        <h5 class="text-white">Berikut adalah halaman untuk pendaftaran lomba:</h5>
                        <h5 class="text-white">1. Pertama klik tombol *Tambah Lomba*</h4>
                            <h5 class="text-white">2. Kedua klik *Tambahkan Siswa* sesuai yang akan didaftarkan</h5>
                            <h5 class="text-white">3. Ketiga klik *Lihat Detail* untuk melihat detail pendaftaran</h5>
                            <h5 class="text-white">4. Ketiga klik *Checkout* untuk melanjutkan pendaftaran</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'includes/header-konten.php'; ?>
    <form action="konfirmasi_bayar.php" method="post">
        <form action="detail_bayar.php" method="post">
            <div class="container container-fluid-lg">
                <div class="row justify-content-center">
                    <div class="col-lg-12 m-5">
                        <div class="card p shadow">
                            <div class="card-header text-center text-light bg-primary">
                                <h3 class="m-0">HALAMAN PEMBAYARAN LOMBA</h3>
                            </div>


                            <!--Tabel bayar saya -->

                            <div class="text-center">
                                <h6>** Berikut adalah Status Pembayaran Anda. Tekan tombol Detail untuk mengetahui detail pembayaran Anda **</h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No.</th>
                                            <th>ID Daftar</th>
                                            <th>Regional</th>
                                            <th>Jenis Lomba</th>
                                            <th>Status Bayar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if (isset($_GET['ID_DAFTAR'])) {
                                            $id_daftar = $_GET['ID_DAFTAR'];
                                        }
                                        $result = mysqli_query($koneksi, "SELECT daftar.ID_DAFTAR,daftar.NPSN, rayon.NAMA_RAYON,user.NAMA_USER, jenis_lomba.NAMA_LOMBA, daftar.STATUS_BAYAR , daftar.STATUS_REKOM FROM sekolah,rayon,jenis_lomba,user,daftar
                            WHERE daftar.ID_USER='$ID_USER' AND rayon.ID_RAYON= daftar.ID_RAYON AND daftar.ID_USER = user.ID_USER AND jenis_lomba.ID_JENIS_LOMBA= daftar.ID_JENIS_LOMBA AND sekolah.NPSN = daftar.NPSN AND daftar.STATUS_REKOM='Sudah Terverifikasi' ");


                                        if (mysqli_num_rows($result) > 0) {
                                            //membuat variabel $no untuk menyimpan nomor urut
                                            $no = 1;
                                            //melakukan perulangan while dengan dari dari query $sql
                                            while ($data = mysqli_fetch_assoc($result)) {
                                                //menampilkan data perulangan
                                                $id_daftar = $data['ID_DAFTAR'];
                                                $rayon = $data['NAMA_RAYON'];
                                                $jenis_lomba = $data['NAMA_LOMBA'];
                                                $status = $data['STATUS_BAYAR'];

                                                echo '
                                <tr>
                                    <td>' . $no . '</td>
                                    <td>' . $id_daftar . '</td>
                                    <td>' . $rayon . '</td>
                                    <td>' . $jenis_lomba . '</td>
                                    <td>' . $status . '</td>
                                    <td>  
                                    ' ?>
                                                <?php
                                                if ($status == "Belum Bayar") {
                                                    echo '<a href="detail_bayar.php?ID_DAFTAR=' . $data['ID_DAFTAR'] . '"><button type="button"  id="INFO_REK " name="INFO_REK" class="btn btn-primary" onclick="add_project()" >Lihat Detail</button></a>';
                                                } elseif ($status == "Konfirmasi Bayar") {
                                                    echo '<a href="konfirmasi_bayar.php?ID_DAFTAR=' . $data['ID_DAFTAR'] . '"><button type="button" class="btn btn-warning" onclick="return confirm(\'Apakah Anda sudah melakukan pembayaran di Bank?\')">Konfirmasi Pembayaran</button></a>';
                                                } elseif ($status == "Proses Verfikasi") {
                                                    echo 'Pembayaran Anda Dalam Proses Verfikasi';
                                                } elseif ($status == "Sudah Bayar") {
                                                    echo '<a href="cetak.php?ID_DAFTAR=' . $data['ID_DAFTAR'] . '"><button type="button" class="btn btn-info" >Cetak Kartu Peserta</button></a>';
                                                };
                                                ?>
                                                </td>
                                                </tr>
                                        <?php

                                                $no++;
                                            }
                                            //jika query menghasilkan nilai 0
                                        } else {
                                            echo '
                            <tr>
                                <td colspan="6"><b>Menunggu Verifikasi surat rekom dari admin.</b></td>
                            </tr>
                            ';
                                        }
                                        ?>

                                        </tbody>

                                </table>
        </form>
    </form>
    </div>

    <!-- Batas Tabel Bayar -->
    </div>
    </div>
    </div>

    <?php include 'includes/footer.php'; ?>
<?php } else {
    require 'index.php';
}
?>