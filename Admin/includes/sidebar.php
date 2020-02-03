<?php
if (isset($_SESSION['admin_login'])) {
$NAMA_ADMIN = $_SESSION['NAMA_ADMIN'];
$data = mysqli_query($koneksi, "SELECT * FROM admin WHERE NAMA_ADMIN = '$NAMA_ADMIN'");
$data_admin = mysqli_fetch_assoc($data);
$ID_ADMIN = $data_admin['ID_ADMIN'];
}
?>

<div id="wrapper">

<!-- Sidebar -->
<ul class="sidebar navbar-nav">
<li class="nav-item">
    <a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span>
    </a>
</li>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Verifikasi</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
    <a class="dropdown-item" href="verifikasi_rekom.php">Surat Rekom</a>
    <a class="dropdown-item" href="verifikasi_file.php">File Abstrak</a>
    <a class="dropdown-item" href="bayar.php"> Bayar Olimpiade</a>
    <a class="dropdown-item" href="bayar_sp.php">Bayar Sains Produk</a>
    </div>
</li>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-fw fa-table"></i>
    <span>Master</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
    <a class="dropdown-item" href="admin.php">Admin</a>
    <a class="dropdown-item" href="user.php">User</a>
    <a class="dropdown-item" href="sekolah.php">Sekolah</a>
    <a class="dropdown-item" href="siswa.php">Siswa</a>
    <a class="dropdown-item" href="jenis_lomba.php">Jenis Lomba</a>
    <a class="dropdown-item" href="rayon.php">Rayon</a>
    <a class="dropdown-item" href="detail_daftar.php">Detail Daftar</a>
    <a class="dropdown-item" href="daftar.php">Daftar Olimpiade</a>
    <a class="dropdown-item" href="daftar_sp.php">Daftar Sains Produk</a>
    <a class="dropdown-item" href="bayar.php">Bayar Olimpiade</a>
    <a class="dropdown-item" href="bayar_sp.php">Bayar Sains Produk</a>
    </div>
</li>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-fw fa-folder"></i>
    <span>Laporan</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
    <a class="dropdown-item" href="laporan_peserta_olimpiade.php">Peserta Olimpiade</a>
    <a class="dropdown-item" href="laporan_peserta_sp.php">Peserta Sains Produk</a>
    <a class="dropdown-item" href="laporan_bayar_olimpiade.php">Dana Olimpiade</a>
    <a class="dropdown-item" href="laporan_bayar_sp.php">Dana Sains Produk</a>

    </div>
</li>

</ul>