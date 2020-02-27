<?php
include 'includes/header.php';
include 'includes/connector.php';
?>
<div class="container px-5">

<div class="card mt-1 mb-5 shadow justify-content-center">
    <div class="card-header text-center"><h4>Berita dan Pengumuman</h4></div>
    <div class="card-body">
            <?php
              $berita= mysqli_query($koneksi, "SELECT * FROM berita");

                $counter3 = 1;
                while($for_berita = mysqli_fetch_array($berita)){
            ?>

            <div class="col-lg-12 faq-item border p-4<?php if($counter3 <=1){ echo " active ";} ?>" data-aos="fade-up">
                <h4><?php echo $for_berita['JUDUL_BERITA']?></h4>
                <h5><?php echo $for_berita['TGL_BERITA']?></h5>
                <p>
                <?php echo $for_berita['SJ_BERITA']?>
                </p>
                <a href="lp_berita.php?ID_BERITA=<?php echo $for_berita['ID_BERITA']?>">Selengkapnya...</a>
            </div>

            <?php $counter3++; } ?>
    </div>
    <div class="card-footer text-center">Anda telah mencapai bagian akhir halaman</div>
</div>
</div>

<?php
include 'includes/footer.php'
?>