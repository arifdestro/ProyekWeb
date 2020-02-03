<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA BAYAR OLIMPIADE</title>
</head>
 
	<center>
 
		<h2>DATA BAYAR OLIMPIADE</h2>
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
        <th>NAMA USER</th>
        <th>TGL DAFTAR</th>
        <th>ID DAFTAR</th>
        <th>ID BAYAR</th>
        <th>TGL BAYAR</th>
        <th>TOTAL BAYAR</th>
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"select daftar.ID_DAFTAR, daftar.TGL_DAFTAR, user.ID_USER, user.NAMA_USER, bayar.ID_BAYAR, daftar.TOTAL_BAYAR, bayar.TGL_BAYAR, daftar.STATUS, jenis_lomba.ID_JENIS_LOMBA
        FROM daftar, bayar, user, jenis_lomba
        WHERE daftar.ID_USER = user.ID_USER
        AND bayar.ID_DAFTAR = daftar.ID_DAFTAR
        AND daftar.ID_JENIS_LOMBA=jenis_lomba.ID_JENIS_LOMBA
        AND jenis_lomba.ID_JENIS_LOMBA='J0001'
        AND daftar.STATUS_BAYAR='Sudah Bayar'
        ");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['NAMA_USER'];?></td>
        <td><?php echo $data['TGL_DAFTAR'];?></td>
        <td><?php echo $data['ID_DAFTAR'];?></td>
        <td><?php echo $data['ID_BAYAR'];?></td>
        <td><?php echo $data['TGL_BAYAR'];?></td>
        <td><?php echo $data['TOTAL_BAYAR'];?></td>
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













