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
                <h3 class="m-0">FORMULIR PENDAFTARAN LOMBA</h3>
            </div>
        <div class="card-body p-4">
            <form action="upload_daftar.php" method="post" enctype="multipart/form-data">
                <input type="text" class="form-control" name="ID_USER" value="<?= $id_user ?>" hidden>
                <div class="form-group">
                        <label for="Nama User">Nama User</label>
                        <input readonly type="text" class="form-control" id="NAMA_USER" name="NAMA_USER" value="<?= $username ?>">
                </div>

                <div class="col-xs-12">
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
                    </div>

                    <div class="col-xs-12">
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
                    </div>

                <div class="group">
                    <label for="NPSN">NPSN</label>
                    <input type="text" class="form-control disabled" id="NPSN" name="NPSN" >
                    <button class="mt-2" type="button" id="btn-search">Cari</button>
                </div>

                <div class="form-group">
                    <label readonly for="Nama-sekolah" class="font-m-semi">Nama Sekolah</label>
                    <input type="text" class="form-control " id="NAMA_SEKOLAH" name="NAMA_SEKOLAH">
                </div>

                <div class="form-group">
                    <label for="NPSN">Surat Rekom</label>
                    <input type="file" class="form-control-file border" name="SURAT_REKOM">
                </div>

                <div class="form-group">
                    <label for="NPSN">File Abstrak</label>
                    <input type="file" class="form-control-file border" name="FILE_ABSTRAK" >
                </div>

            <br>
            <hr>

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