<?php
include 'includes/connector.php';  // Load file koneksi.php
$NPSN = $_POST['NPSN']; // Ambil data NIS yang dikirim lewat AJAX
$query = mysqli_query($koneksi, "SELECT * FROM sekolah WHERE NPSN='".$NPSN."'"); // Tampilkan data siswa dengan NIS tersebut
$row = mysqli_num_rows($query); // Hitung ada berapa data dari hasil eksekusi $query
if($row > 0){ // Jika data lebih dari 0
  $data = mysqli_fetch_array($query); // ambil data siswa tersebut
  
  // BUat sebuah array
  $callback = array(
    'status' => 'success', // Set array status dengan success
    'NAMA_SEKOLAH' => $data['NAMA_SEKOLAH'], // Set array nama dengan isi kolom nama pada tabel siswa
      );
}else{
  $callback = array('status' => 'failed'); // set array status dengan failed
}
echo json_encode($callback); // konversi varibael $callback menjadi JSON
?>
