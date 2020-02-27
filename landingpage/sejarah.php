<?php
include 'includes/header.php';
?>
<div class="container mt-2 mb-5">
    <div class="card">

        <div class="card-header">Sejarah</div>

        <div class="card-body">
            <div class="form">
                <?php
                $sejarah=mysqli_query($koneksi,"SELECT * FROM sejarah");
                $for_sejarah=mysqli_fecth_array($sejarah);

                echo $for_sejarah['ISI_SEJARAH'];
                ?>
            </div>
        </div>

        <div class="card-footer text-center">
        Halaman ini digunakan untuk pengisian Formulir Pendaftaran Siswa
        </div>

    </div>
</div>
<?php
include 'includes/footer.php';
?>