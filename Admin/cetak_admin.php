<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA ADMIN</title>
</head>
 
	<center>
 
		<h2>DATA ADMIN</h2>
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
		<th>ID ADMIN</th>
		<th>NAMA ADMIN</th>
       	</tr>
		<?php 
		$no = 1;
        $sql = mysqli_query($koneksi,"select admin.ID_ADMIN, admin.NAMA_ADMIN
        FROM admin
        ");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['ID_ADMIN'];?></td>
        <td><?php echo $data['NAMA_ADMIN'];?></td>
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













