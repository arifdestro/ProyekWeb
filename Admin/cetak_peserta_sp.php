<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA PESERTA SAINS PRODUCT</title>
</head>
 
	<center>
 
		<h2>DATA PESERTA SAINS PRODUCT</h2>
		<h4>SIMBA IAIN JEMBER</h4>
 
	</center>
 
	<?php 
    include 'includes/connector.php';
    include 'includes/fpdf.php';
	?>
 
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" border="1" style="width: 100%" cellspacing="0">
        <thead class="thead-dark">
		<tr>
        <th width="1%">No.</th>
		<th>NISN</th>
		<th>NAMA SISWA</th>
        <th>ASAL SEKOLAH</th>
        <th>Rayon</th>
        <th>TTD</th>
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"select daftar.ID_DAFTAR, daftar.STATUS, daftar.STATUS_FILE,
        jenis_lomba.ID_JENIS_LOMBA, jenis_lomba.NAMA_LOMBA,
        rayon.ID_RAYON, rayon.NAMA_RAYON,
        user.ID_USER, admin.ID_ADMIN,
        sekolah.NPSN, sekolah.NAMA_SEKOLAH,
        siswa.NISN, siswa.NAMA_SISWA,
        detail_daftar.NISN, detail_daftar.ID_DAFTAR
        FROM daftar, jenis_lomba, rayon, user, admin, sekolah, siswa, detail_daftar
        WHERE
        daftar.ID_JENIS_LOMBA = jenis_lomba.ID_JENIS_LOMBA
        AND detail_daftar.NISN=siswa.NISN
        AND detail_daftar.ID_DAFTAR=daftar.ID_DAFTAR
        AND daftar.ID_RAYON = rayon.ID_RAYON
        AND daftar.ID_USER = user.ID_USER
        AND daftar.ID_ADMIN = admin.ID_ADMIN
        AND daftar.NPSN = sekolah.NPSN
        AND jenis_lomba.ID_JENIS_LOMBA='J0002'
        AND daftar.STATUS_FILE='1'
        ");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['NISN'];?></td>
        <td><?php echo $data['NAMA_SISWA'];?></td>
        <td><?php echo $data['NAMA_SEKOLAH'];?></td>
        <td><?php echo $data['NAMA_RAYON'];?></td>
		</tr>
		<?php 
		}
		?>
	</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>













