<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cetak</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">           
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
                  
                      <a href="cetak_nota.php?ID_DAFTAR='.$data['ID_DAFTAR'].'" class="badge badge-primary">Cetak Nota</a>
                      <a href="cetak_nota.php?ID_DAFTAR='.$data['ID_DAFTAR'].'" class="badge badge-primary">Cetak Kartu Peserta</a>
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
