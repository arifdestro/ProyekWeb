<?php

include 'includes/connector.php';
include 'includes/fpdf.php';
session_start();
if (isset($_GET['NISN']))
{
	$NISN=$_GET['NISN'];
}

?>

<html>
    <head>
	<link rel="stylesheet" href="style.css">
        <title>Kartu Peserta</title>
        <script>
		window.print();
	</script>
    </head>
    <?php
	    $i=0;
		$get_peserta="SELECT 
        siswa.NISN, siswa.NAMA_SISWA, siswa.TANGGAL_LAHIR, siswa.JENIS_KELAMIN, siswa.ALAMAT, siswa.FOTO, sekolah.NAMA_SEKOLAH, jenis_lomba.NAMA_LOMBA
        FROM siswa, daftar, detail_daftar, sekolah, jenis_lomba
        WHERE
        detail_daftar.NISN= siswa.NISN
        AND daftar.NPSN= sekolah.NPSN
        AND detail_daftar.ID_DAFTAR= daftar.ID_DAFTAR
		AND daftar.ID_JENIS_LOMBA = jenis_lomba.ID_JENIS_LOMBA
		AND siswa.NISN='$NISN'";
		
		$run_peserta=mysqli_query($koneksi, $get_peserta);
		
		while ($row_peserta=mysqli_fetch_array($run_peserta)){
			
			
            $img = $row_peserta['FOTO'];
            $NISN = $row_peserta['NISN'];
			$st_name = $row_peserta['NAMA_SISWA'];
			$tgl_lahir = $row_peserta['TANGGAL_LAHIR'];
			$jk = $row_peserta['JENIS_KELAMIN'];
			$almt = $row_peserta['ALAMAT'];
			$sklh = $row_peserta['NAMA_SEKOLAH'];
			$lomba = $row_peserta['NAMA_LOMBA'];
			$i++;
					
		?>
   
   
   
     <body>
	 <div id="card">
	 <div id="h3">
	  <h3>Kartu Peserta Lomba</h3><br>
	  <h3>HMPS Tadris IPA IAIN Jember</h3>
	 </div>
	  <div id="c_left">
	  <img src="pictures/register/<?php echo $img; ?>"width="80px"height="100px"style="border:1px solid black;"><br>
	  </div>
	  <div id="c_right">
	  <table style="margin-top:23px;">
	  <tr>
	  <td><b>NISN</b></td><td><b>: <?php echo $NISN; ?></b></td>
	  </tr>
	  <tr>
	  <td><b>Nama Peserta</b></td><td>: <?php echo $st_name; ?></td>
	  </tr>
	  <tr>
	  <td><b>Tanggal Lahir</b></td><td>: <?php echo $tgl_lahir; ?></td>
	  </tr>
	  <tr>
	  <td><b>Jenis Kelamin</b></td><td>: <?php echo $jk; ?></td>
	  </tr>
	  <tr>
	  <td><b>Alamat</b></td><td>: <?php echo $almt; ?></td>
	  </tr>
      <tr>
	  <td><b>Nama Sekolah</b></td><td>: <?php echo $sklh; ?></td>
	  </tr>
	  <tr>
	  <td><b>Lomba yang diikuti</b></td><td>: <?php echo $lomba; ?></td>
	  </tr>
	  </table>
	  
	  </div>
	  </div>
	 <?php } ?>
	 	
	 </body>
   </head>
</html   