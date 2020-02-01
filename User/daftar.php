<?php
session_start();
include 'includes/connector.php';

if (isset($_SESSION['USER_LOGIN'])) {
    $NAMA_USER=$_SESSION['NAMA_USER'];
    $ID_USER=$_SESSION['ID_USER'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIMBA for IAIN</title>

    <!-- link css yang kita buat -->
    <link rel="stylesheet" href="style.css">

    <!-- link bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- source js saat kita menggunakan javascript -->
    <script type="text/javascript" src="js/jquery-3.2.1.slim.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- source js Modal Halaman ini -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container container-fluid-lg">
    <div class="row justify-content-center">
    <div class="col-lg-12 m-5">
        <div class="card p shadow">
            <div class="card-header text-center text-light bg-info">
                <h3 class="m-0">HALAMAN PENDAFTARAN LOMBA</h3>
            </div>
        <div class="card-body p-4">
            <div><h5>Klik Daftar Jika anda hendak menambahkan pendaftaran baru</h5></div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah Daftar</button>
            <br><hr><br>

<!-- Modal Tambah Daftar -->
        
            <div class="modal fade" id="myModal" >
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Tambah Daftar</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                    <div class="container">
                    <form action="upload_daftar.php" method="POST" enctype="multipart/form-data">
                    
                        <input type="text" class="form-control" name="ID_USER" value="<?= $ID_USER ?>" hidden>
                        
                                <label for="Nama User">Nama User</label>
                                <input readonly type="text" class="form-control" id="NAMA_USER" name="NAMA_USER" value="<?= $NAMA_USER ?>">

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                <label for="Rayon">Pilih Rayon</label>
                                    <select name="ID_RAYON" class="form-control">
                                        <option  value="">--pilih regional anda--</option>
                                        <option  value="R0001">Jember</option>
                                        <option  value="R0002">Banyuwangi</option>
                                        <option  value="R0003">Probolinggo</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                <label for="Jenis Lomba">Pilih Jenis Lomba</label>
                                    <select name="ID_JENIS_LOMBA" class="form-control">
                                        <option value="">--pilih lomba yang ingin anda ikuti--</option>
                                        <option value="J0001">Olimpiade Mipa</option>
                                        <option value="J0002">Science Product</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="group">
                            <label>NPSN</label>
                            <input type="text" class="form-control disabled" id="NPSN" name="NPSN" >
                            <button class="mt-2" type="button" id="btn-search">Cari</button>
                        </div>

                        <div class="form-group">
                            <label  for="Nama-sekolah" class="font-m-semi">Nama Sekolah</label>
                            <input readonly autocomplete type="text" class="form-control " id="NAMA_SEKOLAH" name="NAMA_SEKOLAH">
                        </div>
                        
                        <div class="form-group">
                            <label>Surat Rekom</label>
                            <input type="file" class="form-control-file border" name="SURAT_REKOM" accept=".pdf, .doc, .docx">
                        </div>

                        <div class="form-group">
                            <label>File Abstrak</label>
                            <input type="file" class="form-control-file border" name="FILE_ABSTRAK" accept=".pdf, .doc, .docx">
                        </div>

                        <br><hr><br>

                        <div class="from-group row" float="right">
                            <a href="myModal" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                            <hr>
                            <button type="submit" class="btn btn-primary ml-2" name="signup_submit">Simpan</button>
                            
                            <hr>
                        </div>

                    </form>
                    </div>

                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <h5 class="m-0">Halaman ini adalah dashboard admin yngmana anda dapat melakukan pendaftaran.</h5>
                        
                    </div>
                    
                </div>
                </div>
            </div>

<!-- Batas Modal Tambah Daftar -->

<!-- Modal Tambah Siswa -->
    <?php
    $result_for_siswa = mysqli_query(
        $koneksi,
        "SELECT 
        daftar.ID_DAFTAR, daftar.TGL_DAFTAR, daftar.STATUS_REKOM, daftar.STATUS_FILE, daftar.STATUS_BAYAR, daftar.JUMLAH_SISWA,
        jenis_lomba.ID_JENIS_LOMBA, jenis_lomba.NAMA_LOMBA,
        user.ID_USER, user.NAMA_USER,
        rayon.ID_RAYON, rayon.NAMA_RAYON,
        admin.ID_ADMIN, admin.NAMA_ADMIN,
        sekolah.NPSN, sekolah.NAMA_SEKOLAH

        FROM daftar, jenis_lomba, rayon, admin, user, sekolah

        WHERE
        daftar.ID_JENIS_LOMBA = jenis_lomba.ID_JENIS_LOMBA
        AND daftar.ID_RAYON = rayon.ID_RAYON
        AND daftar.ID_ADMIN = admin.ID_ADMIN
        AND daftar.ID_USER = user.ID_USER                            
        AND daftar.NPSN = sekolah.NPSN
        -- AND user.ID_USER=$ID_USER
        ");

    if(mysqli_num_rows($result_for_siswa) > 0){
        //membuat variabel $no untuk menyimpan nomor urut
        $no = 1;
        //melakukan perulangan while dengan dari dari query $sql
        while($for_siswa = mysqli_fetch_assoc($result_for_siswa)){
    ?>
            <div class="modal fade" id="<?=$for_siswa['ID_DAFTAR']?>">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Tambah Siswa</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">

                    <div>
                        <form action="upload_siswa.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="ID_DAFTAR" value="<?=$for_siswa['ID_DAFTAR']?>">
                        <input type="hidden" name="ID_JENIS_LOMBA" value="<?=$for_siswa['ID_JENIS_LOMBA']?>">
                    
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Tanggal Daftar</span>
                            </div>
                            <input readonly type="text" class="form-control" name="TGL_DAFTAR" value="<?=$for_siswa['TGL_DAFTAR']?>">
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ID Daftar</span>
                            </div>
                            <input readonly type="text" class="form-control" name="ID_DAFTAR" value="<?=$for_siswa['ID_DAFTAR']?>">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nama User</span>
                            </div>
                            <input readonly type="text" class="form-control" name="NAMA_USER" value="<?=$for_siswa['NAMA_USER']?>">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rayon</span>
                            </div>
                            <input readonly type="text" class="form-control" name="NAMA_LOMBA" value="<?=$for_siswa['NAMA_RAYON']?>">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Jenis Lomba</span>
                            </div>
                            <input readonly type="text" class="form-control" name="NAMA_LOMBA" value="<?=$for_siswa['NAMA_LOMBA']?>">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Asal Sekolah</span>
                            </div>
                            <input readonly type="text" class="form-control" name="NAMA_SEKOLAH" value="<?=$for_siswa['NAMA_SEKOLAH']?>">
                        </div>
            
                    <br><hr><br>
                
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NISN</label>
                                <div class="col-sm-10">
                                    <input type="text" name="NISN" class="form-control" required>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Siswa</label>
                                <div class="col-sm-10">
                                    <input type="text" name="NAMA_SISWA" class="form-control" required>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-10">
                                    <input type="text" name="TEMPAT_LAHIR" class="form-control" required>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" name="TANGGAL_LAHIR" class="form-control" required>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" name="ALAMAT" class="form-control" required>
                                </div>
                        </div>

                        <div class="from-group row custom-control custom-radio">
                        <label class="col-sm-2 col-form-label" required>Jenis Kelamin</label>
                            <input type="radio" name="JENIS_KELAMIN" value="LAKI LAKI" required="required" />Laki Laki
                            <input type="radio" name="JENIS_KELAMIN" value="PEREMPUAN" required="required" />Perempuan
                        </div>

                        <div class="form-group">
                                <label for="NPSN">Foto Siswa</label>
                                <input type="file" class="form-control-file border" accept=".jpg, .png, .jpeg" name="FOTO" >
                        </div>

                        <div class="from-group row" float="right">
                            <a href="#" class="btn btn-secondary" float="right">Kembali</a>
                            <hr>
                            <button type="submit" class="btn btn-primary" name="submit_siswa" float="right"> Simpan</button>
                        </div>

                        
                    </div>

                    </div>
                    </form>
            </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <h5 class="m-2">Dengan ini, saya menyatakan data siswa yang saya masukan adalah benar adanya.</h5>
                        
                    </div>
                    
                </div>
                </div>


            <?php
            } }
            ?>

<!-- Batas Modal Tambah Siswa -->


<!-- Modal Detail -->

    <?php
    $result_for_detail = mysqli_query(
        $koneksi,
        "SELECT 
        daftar.ID_DAFTAR, daftar.TGL_DAFTAR, daftar.STATUS_REKOM, daftar.STATUS_FILE, daftar.STATUS_BAYAR, daftar.JUMLAH_SISWA,
        jenis_lomba.ID_JENIS_LOMBA, jenis_lomba.NAMA_LOMBA,
        user.ID_USER, user.NAMA_USER,
        rayon.ID_RAYON, rayon.NAMA_RAYON,
        admin.ID_ADMIN, admin.NAMA_ADMIN,
        sekolah.NPSN, sekolah.NAMA_SEKOLAH

        FROM daftar, jenis_lomba, rayon, admin, user, sekolah

        WHERE
        daftar.ID_JENIS_LOMBA = jenis_lomba.ID_JENIS_LOMBA
        AND daftar.ID_RAYON = rayon.ID_RAYON
        AND daftar.ID_ADMIN = admin.ID_ADMIN
        AND daftar.ID_USER = user.ID_USER                            
        AND daftar.NPSN = sekolah.NPSN
        ");

    if(mysqli_num_rows($result_for_detail) > 0){
        //membuat variabel $no untuk menyimpan nomor urut
        $no = 1;
        //melakukan perulangan while dengan dari dari query $sql
        while($for_detail = mysqli_fetch_assoc($result_for_detail)){
    ?>
            <div class="modal fade" id="d<?=$for_detail['ID_DAFTAR']?>">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Detail Pendaftaran</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                    
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Tanggal Daftar</span>
                            </div>
                            <input readonly type="text" class="form-control" name="TGL_DAFTAR" value="<?=$for_detail['TGL_DAFTAR']?>">
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ID Daftar</span>
                            </div>
                            <input readonly type="text" class="form-control" name="ID_DAFTAR" value="<?=$for_detail['ID_DAFTAR']?>">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nama User</span>
                            </div>
                            <input readonly type="text" class="form-control" name="NAMA_USER" value="<?=$for_detail['NAMA_USER']?>">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rayon</span>
                            </div>
                            <input readonly type="text" class="form-control" name="NAMA_RAYON" value="<?=$for_detail['NAMA_RAYON']?>">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Jenis Lomba</span>
                            </div>
                            <input readonly type="text" class="form-control" name="NAMA_LOMBA" value="<?=$for_detail['NAMA_LOMBA']?>">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Asal Sekolah</span>
                            </div>
                            <input readonly type="text" class="form-control" name="NAMA_SEKOLAH" value="<?=$for_detail['NAMA_SEKOLAH']?>">
                        </div>
                    <br><hr><br>

<!-- Tabel Siswa -->
    <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <?php
                $ID_DAFTAR=$for_detail['ID_DAFTAR'];
                ?>
                    <thead class="thead-light">
                        <tr>
                            <th>NISN</th>
                            <th>Nama Siswa</th>          
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                        $result_for_tabel = mysqli_query(
                            $koneksi,
                            "SELECT siswa.NISN, siswa.NAMA_SISWA,
                            daftar.ID_DAFTAR, daftar.STATUS_REKOM, daftar.STATUS_FILE, daftar.STATUS_BAYAR, 
                            user.ID_USER, 
                            detail_daftar.ID_DAFTAR, detail_daftar.NISN
                            FROM siswa, daftar, user, detail_daftar 
                            WHERE detail_daftar.NISN=siswa.NISN 
                            AND detail_daftar.ID_DAFTAR=daftar.ID_DAFTAR 
                            AND daftar.ID_USER=user.ID_USER 
                            AND daftar.ID_DAFTAR='$ID_DAFTAR'
                            ");

                        if(mysqli_num_rows($result_for_tabel) > 0){
                            //membuat variabel $no untuk menyimpan nomor urut
                            $no = 1;
                            //melakukan perulangan while dengan dari dari query $sql
                            while($data = mysqli_fetch_assoc($result_for_tabel)){
                                
                                //menampilkan data perulangan
                                echo '
                                <tr>
                                    <td>'.$no.'</td>
                                    <td>'.$data['NAMA_SISWA'].'</td>
                                    <td>
                                        <a href="hapus_siswa.php?ID_DAFTAR='.$data['ID_DAFTAR'].'" class="btn btn-danger" data-dismiss="modal" onclick="return confirm(\'Yakin ingin menghapus data siswa ini?\')">Hapus Siswa</a>
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
                    <body>
                </table>
            </div>
<!-- Batas Tabel Siswa -->
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <h5 class="m-2">Dengan ini, saya menyatakan semua data yang saya masukan adalah benar adanya, serta siap untuk mengikuti tahap pembayaran.</h5>
                        <div class="from-group row" float="right">
                            <a href="#" class="btn btn-secondary" float="right">Kembali</a>
                            <hr>
                            <button type="submit" class="btn btn-primary" name="signup_submit" float="right"> Checkout</button>
                        </div>
                    </div>
                    
                </div>
                </div>
            </div>

            <?php
            } }
            ?>

<!-- Batas Modal Detail -->

            <div><h5>Berikut adalah Pendaftaran yang telah anda lakukan. Anda dapat melanjutkan untuk menambahkan siswa, dan melihat detail Sebelum Checkout</h5></div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>No.</th>
                            <th>ID Daftar</th>
                            <th>Tanggal Daftar</th>
                            <th>Jenis Lomba</th>
                            <th>Jumlah Siswa</th>                            
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                        $result = mysqli_query(
                            $koneksi,
                            "SELECT 
                            daftar.ID_DAFTAR, daftar.TGL_DAFTAR, daftar.STATUS_REKOM, daftar.STATUS_FILE, daftar.STATUS_BAYAR, daftar.JUMLAH_SISWA,
                            jenis_lomba.ID_JENIS_LOMBA, jenis_lomba.NAMA_LOMBA,
                            user.ID_USER, user.NAMA_USER,
                            rayon.ID_RAYON,
                            admin.ID_ADMIN, admin.NAMA_ADMIN,
                            sekolah.NPSN, sekolah.NAMA_SEKOLAH

                            FROM daftar, jenis_lomba, rayon, admin, user, sekolah

                            WHERE
                            daftar.ID_JENIS_LOMBA = jenis_lomba.ID_JENIS_LOMBA
                            AND daftar.ID_RAYON = rayon.ID_RAYON
                            AND daftar.ID_ADMIN = admin.ID_ADMIN
                            AND daftar.ID_USER = user.ID_USER                            
                            AND daftar.NPSN = sekolah.NPSN
                            AND user.ID_USER='$ID_USER'
                            ");

                        if(mysqli_num_rows($result) > 0){
                            //membuat variabel $no untuk menyimpan nomor urut
                            $no = 1;
                            //melakukan perulangan while dengan dari dari query $sql
                            while($data = mysqli_fetch_assoc($result)){
                                $ID_DAFTAR=$data['ID_DAFTAR'];
                                $result_row_siswa = mysqli_query($koneksi,"SELECT * FROM detail_daftar WHERE ID_DAFTAR='$ID_DAFTAR'");
                                $JUMLAH_SISWA=mysqli_num_rows($result_row_siswa);
                                //menampilkan data perulangan
                                echo '
                                <tr>
                                    <td>'.$no.'</td>
                                    <td>'.$data['ID_DAFTAR'].'</td>
                                    <td>'.$data['TGL_DAFTAR'].'</td>
                                    <td>'.$data['NAMA_LOMBA'].'</td>
                                    <td>'.$JUMLAH_SISWA.'</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#'.$data['ID_DAFTAR'].'">Tambah Siswa</button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#d'.$data['ID_DAFTAR'].'">Lihat Detail</button>
                                        <a href="hapus_daftar.php?ID_DAFTAR='.$data['ID_DAFTAR'].'" class="btn btn-danger" data-dismiss="modal" onclick="return confirm(\'Yakin ingin menghapus data daftar ini?\')">Hapus Daftar</a>
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
                    <body>

                </table>
            </div>
        
<!-- Batas Tabel Daftar -->

            </div>
                <div class="card-footer p-4">
                <h5 class="m-0">Setelah mengisi Formulir pendaftaran ini, anda dapat melakukan pengisian formulir siswa dengan mengklik tambah siswa.</h5>
                </div>
                <a href="logout_user.php" class="btn btn-danger" data-dismiss="modal" onclick="return confirm(\'Yakin ingin logout?\')">Logout</a>
            </div>
        </div>
    </div>
</div>
<script src="process.js"></script>
</body>
</html>

<?php } else {
        require 'login_user.php';
    }
?>

<!-- <a href="tambah_siswa.php?ID_DAFTAR='.$data['ID_DAFTAR'].'" class="btn btn-primary" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Lihat Detail</a> -->