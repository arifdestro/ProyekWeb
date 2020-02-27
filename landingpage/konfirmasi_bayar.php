<?php
include 'includes/header.php';
?>
<div class="container mt-2 mb-5">
    <div class="card">

        <div class="card-header text-center">
            Formulir Pembayaran
        </div>

        <div class="card-body">
        <div class="form">
            <form action="upoad_bukti.php" method="POST" enctype="multipart/form-data>
            <div class="form-group row justify-content-center">

            <div class="form-group row justify-content-center">
            <label class="col-md-2">Upload Bukti Bayar</label>
            <input name="BUKTI_BAYAR" type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
            </div>

            <div class="form-group row justify-content-center">
            <img id="blah" alt="your image" width="150" height="200" />
            </div>

            <div class="form-group row justify-content-center">
                <a class="btn btn-danger col-md-2 m-2" href="pendaftaran_saya.php">Batal</a>
                <button type="submit" class="btn btn-info col-md-2 m-2" name="upload_bukti">Simpan</button>
            </div>
            </form>
        </div>

        <div class="card-footer text-center">
        Halaman ini digunakan untuk memilih metode Pembayaran
        </div>

        </div>
        </div>

        </div>
        

    </div>
</div>
<?php
include 'includes/footer.php';
?>
