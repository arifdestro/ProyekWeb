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
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<div class="card-header text-center text-light bg-info">
  <h2 text-align="center">CETAK</h2>
</div>  
  <table class="table table-bordered">
    <thead>
      <tr>
      <th>No</th>
      <th>NISN</th>
      <th>Nama Siswa</th>
      <th>Status Bayar</th>
      <th>Tanggal Bayar</th>
      <th>AKSI</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'includes/connector.php';
				$result = mysqli_query($koneksi, "SELECT daftar.ID_DAFTAR, siswa.NISN, siswa.NAMA_SISWA, bayar.ID_BAYAR, daftar.STATUS_BAYAR, bayar.TGL_BAYAR
          FROM daftar, bayar, detail_daftar, siswa
          WHERE
          daftar.ID_DAFTAR = bayar.ID_DAFTAR
          AND daftar.ID_DAFTAR = detail_daftar.ID_DAFTAR
          AND siswa.NISN = detail_daftar.NISN
          AND daftar.STATUS_BAYAR = 'Sudah Bayar'");

      if(mysqli_num_rows($result) > 0){
          //membuat variabel $no untuk menyimpan nomor urut
          $no = 1;
          //melakukan perulangan while dengan dari dari query $sql
          while($data = mysqli_fetch_assoc($result)){
              //menampilkan data perulangan
              echo '
              <tr>
                  <td>'.$no.'</td>
                  <td>'.$data['NISN'].'</td>
                  <td>'.$data['NAMA_SISWA'].'</td>
                  <td>'.$data['STATUS_BAYAR'].'</td>
                  <td>'.$data['TGL_BAYAR'].'</td>
                  <td>
                  <a href="cetak_nota.php?STATUS_BAYAR='.$data['STATUS_BAYAR'].'"><button type="button" class="btn btn-primary">Cetak Nota</button></a>
                  <a href="cetak_kp.php?NISN='.$data['NISN'].'"><button type="button" class="btn btn-primary">Cetak Kartu Peserta</button></a>
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

</body>
</html>
