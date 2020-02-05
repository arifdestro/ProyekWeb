<!DOCTYPE html>
<html>

<head>
	<title>CETAK NOTA</title>
</head>

<center>

	<h2>CETAK NOTA</h2>
	<h4>SIMBA IAIN JEMBER</h4>

</center>

<?php
include 'includes/connector.php';
include 'includes/fpdf.php';
session_start();
if (isset($_GET['ID_DAFTAR'])) {
	$id_daftar = $_GET['ID_DAFTAR'];
}
?>

<div class="table-responsive">
	<table class="table table-bordered" id="dataTable" border="1" style="width: 100%" cellspacing="0">
		<thead class="thead-dark">
			<tr>
				<th>ID Daftar</th>
				<th>ID Bayar</th>
				<th>Status Pembayaran</th>
				<th>Tanggal Bayar</th>
				<th>NISN</th>
				<th>Nama Siswa</th>
				<th>INFO</th>
			</tr>
			<?php
			$sql = mysqli_query($koneksi, "select daftar.ID_DAFTAR, bayar.ID_BAYAR, daftar.STATUS_BAYAR, bayar.TGL_BAYAR, siswa.NISN, siswa.NAMA_SISWA
        FROM daftar, bayar, detail_daftar, siswa
        WHERE
		daftar.ID_DAFTAR = bayar.ID_DAFTAR
		AND daftar.ID_DAFTAR= detail_daftar.ID_DAFTAR
		AND siswa.NISN = detail_daftar.NISN
		AND daftar.STATUS_BAYAR='Sudah Bayar'
		AND daftar.ID_DAFTAR='$id_daftar'");
			while ($data = mysqli_fetch_array($sql)) {
			?>
				<tr>
					<td><?php echo $data['ID_DAFTAR']; ?></td>
					<td><?php echo $data['ID_BAYAR']; ?></td>
					<td><?php echo $data['STATUS_BAYAR']; ?></td>
					<td><?php echo $data['TGL_BAYAR']; ?></td>
					<td><?php echo $data['NISN']; ?></td>
					<td><?php echo $data['NAMA_SISWA']; ?></td>
					<td></td>
				</tr>
			<?php
			}
			?>
	</table>
	<p>Dengan ini panitia menyatakan data diatas telah terverifikasi secara sah dan telah mengikuti serangkaian pendaftaran hingga pembayaran sehingga dinyatakan sah sebagai peserta.
	</p>
	<script>
		window.print();
	</script>
	</body>

</html>