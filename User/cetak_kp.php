<?php

include 'includes/connector.php';
session_start();
if (isset($_GET['ID_DAFTAR']))
{
	$ID_DAFTAR=$_GET['ID_DAFTAR'];
}

?>

<html>
    <head>
        <title>Kartu Peserta</title>
        <script language="javascript">
        function printpage()
            {
                window.print();
            }
        </script>
    </head>
   <style>
   #card{
	   float:left;
	   width:360px;
	   height:450px;
	   margin:5px;
	   border:1px solid black;
	   background-image: url("images/id.jpg");
	   background-repeat: no-repeat;
	   background-size: 360px 230px;
	   -webkit-print-color-adjust: exact;
   }
   #c_left{
	   margin-bottom:65px;
	   margin-top:10px;
	   margin-left: 150px;
	   float:center;
	   width:80px;
	   height:120px;
	   border:1px solid red;

	   
   }
   #c_box{
	  width:80px; 
	  height:20px;
	  padding:5px;
	  border:1px solid green;

   }
  #c_right{
	   
	   /* margin-right:120px; */
	   margin-bottom : 50px;
	   width:220px;
	   height:200px;
	   border:1px solid yellow;

   }
   
   </style>
   <?php

       $i=0;
		$get_peserta="SELECT 
        siswa.NISN, siswa.NAMA_SISWA, siswa.TANGGAL_LAHIR, siswa.JENIS_KELAMIN, siswa.ALAMAT, siswa.FOTO, sekolah.NAMA_SEKOLAH
        FROM siswa, daftar, detail_daftar, sekolah
        WHERE
        detail_daftar.NISN= siswa.NISN
        AND daftar.NPSN= sekolah.NPSN
        AND detail_daftar.ID_DAFTAR= daftar.ID_DAFTAR
		AND daftar.ID_DAFTAR = '$ID_DAFTAR'";
		
		$run_peserta=mysqli_query($koneksi, $get_peserta);
		
		while ($row_peserta=mysqli_fetch_array($run_peserta)){
			
			
            $img = $row_peserta['FOTO'];
            $NISN = $row_peserta['NISN'];
			$st_name = $row_peserta['NAMA_SISWA'];
			$tgl_lahir = $row_peserta['TANGGAL_LAHIR'];
			$jk = $row_peserta['JENIS_KELAMIN'];
			$almt = $row_peserta['ALAMAT'];
			$sklh = $row_peserta['NAMA_SEKOLAH'];
			$i++;
					
		?>
   
   
   
     <body>
	 <h3>HMPS VEKTOR TADRIS IPA IAIN JEMBER</h3><br>
     <h3>Peserta Olimpiade MIPA 2019</h3>
	 <div id="card">
	  <div id="c_left">
	  <img src="student_images/<?php echo $img; ?>"width="80px"height="100px"style="border:1px solid black;"><br>
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
	  </table>
	  
	  </div>
	  </div>
	 <?php } ?>
	 	
	 </body>
   </head>
</html   