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

</head>
<body>
    <div class="container container-fluid-lg">
    <div class="row justify-content-center">
    <div class="col-lg-10 m-5">
        <div class="card p shadow">
            <div class="card-header text-center text-light bg-info">
                <h3 class="m-0">FORMULIR PENDAFTARAN SISWA</h3>
            </div>

            <div class="card-body p-4">
                <form action="upload_siswa.php" method="post" enctype="multipart/form-data">
                <input type="text" class="form-control" name="ID_DAFTAR" value="<?= $id_daftar ?>" hidden>
                <?php
                    $TGL_DAFTAR="ABC";
                    $ID_DAFTAR="ABC";
                    $NAMA_USER="ABC";
                    $NAMA_RAYON="ABC";
                    $NAMA_LOMBA="ABC";
                    $NAMA_SEKOLAH="ABC";                
                ?>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Tanggal Daftar</span>
                </div>
                <input readonly type="text" class="form-control" name="TGL_DAFTAR" value="<?=$TGL_DAFTAR?>">
            </div>
                        
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">ID Daftar</span>
                </div>
                <input readonly type="text" class="form-control" name="ID_DAFTAR" value="<?=$ID_DAFTAR?>">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Nama User</span>
                </div>
                <input readonly type="text" class="form-control" name="NAMA_USER" value="<?=$NAMA_USER?>">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rayon</span>
                </div>
                <input readonly type="text" class="form-control" name="NAMA_LOMBA" value="<?=$NAMA_RAYON?>">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Jenis Lomba</span>
                </div>
                <input readonly type="text" class="form-control" name="NAMA_LOMBA" value="<?=$NAMA_LOMBA?>">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Asal Sekolah</span>
                </div>
                <input readonly type="text" class="form-control" name="NAMA_SEKOLAH" value="<?=$NAMA_SEKOLAH?>">
            </div>
            <br>
            <hr>
            <br>
                
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

            <div class="from-group row custom-control custom-radio">
            <label class="col-sm-2 col-form-label" required>Jenis Kelamin</label>
                <input type="radio" name="JENIS_KELAMIN" value="LAKI LAKI" required="required" />Laki Laki
                <input type="radio" name="JENIS_KELAMIN" value="PEREMPUAN" required="required" />Perempuan
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" name="ALAMAT" class="form-control" required>
                    </div>
            </div>

            <div class="form-group">
                    <label for="NPSN">Foto Siswa</label>
                    <input type="file" class="form-control-file border" name="FOTO" >
            </div>

            <br>
            <hr>
            <br>

            <div class="from-group row" float="right">
                <a href="#" class="btn btn-secondary" float="right">Kembali</a>
                <hr>
                <button type="submit" class="btn btn-primary" name="signup_submit" float="right"> Simpan</button>
            </div>

            </form>
            </div>
                <div class="card-footer p-4">
                <h5 class="m-0">Setelah mengisi Formulir pendaftaran ini, anda dapat melakukan pengisian formulir siswa dengan mengklik tambah siswa.</h5>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>