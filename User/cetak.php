<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIMBA IAIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 text-align="center">CETAK</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
      <th>No</th>
        <th>ID Daftar</th>
        <th>ID Bayar</th>
        <th>Status Bayar</th>
        <th>Tanggal Bayar</th>
        <th>AKSI</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'includes/connector.php';
				$result = mysqli_query($koneksi, "SELECT daftar.ID_DAFTAR, bayar.ID_BAYAR, daftar.STATUS_BAYAR, bayar.TGL_BAYAR
          FROM daftar, bayar
          WHERE
          daftar.ID_DAFTAR = bayar.ID_DAFTAR");

      if(mysqli_num_rows($result) > 0){
          //membuat variabel $no untuk menyimpan nomor urut
          $no = 1;
          //melakukan perulangan while dengan dari dari query $sql
          while($data = mysqli_fetch_assoc($result)){
              //menampilkan data perulangan
              echo '
              <tr>
                  <td>'.$no.'</td>
                  <td>'.$data['ID_DAFTAR'].'</td>
                  <td>'.$data['ID_BAYAR'].'</td>
                  <td>'.$data['STATUS_BAYAR'].'</td>
                  <td>'.$data['TGL_BAYAR'].'</td>
                  <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                      Cetak Nota
                      </button>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#classModal">
                      Cetak Kartu Peserta
                      </button>
                    
                  </td>
              </tr>
              ';
              $no++;
          }
      //jika query menghasilkan nilai 0
      }else{
          echo '
          <tr>
              <td colspan="6"><b>Tidak ada data.</b></td>
          </tr>
          ';
      }
				?>
    </table>
</div>

  <!-- Button to Open the Modal -->
  

  <!-- The Modal Cetak Nota -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h1 class="modal-title">SIMBA IAIN</h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <h3>Cetak Nota</h3>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" border="1" style="width: 100%" cellspacing="0">
        <thead class="thead-dark">
		<tr>
        <th width="1%">No.</th>
		<th>ID Daftar</th>
		<th>ID Bayar</th>
        <th>Status Pembayaran</th>
		<th>Tanggal Bayar</th>
		<th>NISN</th>
        <th>Nama Siswa</th>
		<th>INFO</th>
		</tr>
    <?php
    session_start();
    if (isset($_GET['ID_DAFTAR']))
    {
      $ID_DAFTAR=$_GET['ID_DAFTAR'];
    } 
		$no = 1;
		$sql = mysqli_query($koneksi,"select daftar.ID_DAFTAR, bayar.ID_BAYAR, daftar.STATUS_BAYAR, bayar.TGL_BAYAR, siswa.NISN, siswa.NAMA_SISWA
        FROM daftar, bayar, detail_daftar, siswa
        WHERE
		daftar.ID_DAFTAR = bayar.ID_DAFTAR
		AND daftar.ID_DAFTAR= detail_daftar.ID_DAFTAR
    AND siswa.NISN = detail_daftar.NISN
    AND daftar.ID_DAFTAR='$ID_DAFTAR'");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['ID_DAFTAR'];?></td>
        <td><?php echo $data['ID_BAYAR'];?></td>
		<td><?php echo $data['STATUS_BAYAR'];?></td>
		<td><?php echo $data['TGL_BAYAR'];?></td>
		<td><?php echo $data['NISN'];?></td>
		<td><?php echo $data['NAMA_SISWA'];?></td>
		<td></td>
		</tr>
		<?php 
		}
		?>
	</table>
	<p>Dengan ini panitia menyatakan data diatas telah terverifikasi secara sah dan telah mengikuti serangkaian pendaftaran hingga pembayaran sehingga dinyatakan sah sebagai peserta.
</p>
          </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-primary"><a href="cetak_kp.php">Cetak(download)</a></button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

<!-- The Modal Cetak Kartu Peserta -->
<div class="modal" id="classModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h1 class="modal-title">SIMBA IAIN</h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <h3>HMPS VEKTOR TADRIS IPA IAIN JEMBER</h3><br>
          <h3>Peserta Olimpiade MIPA 2019</h3>
          
<?php
session_start();
if (isset($_GET['ID_DAFTAR']))
{
	$ID_DAFTAR=$_GET['ID_DAFTAR'];
}

?>
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
	   	   
   }
   #c_box{
	  width:80px; 
	  height:20px;
	  padding:5px;
	  
   }
  #c_right{
	   
	   /* margin-right:120px; */
	   margin-bottom : 50px;
	   width:220px;
	   height:200px;
	   
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
        AND daftar.ID_DAFTAR= '$ID_DAFTAR';";
		
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
   

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-primary"><a href="cetak_nota.php">Cetak(download)</a></button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

</body>
</html>
