<?php
include 'includes/header.php';
include 'includes/connector.php';

if (isset($_GET['ID_BERITA'])) {
    $ID_BERITA=$_GET['ID_BERITA'];

    $berita = mysqli_query($koneksi,"SELECT * FROM berita WHERE ID_BERITA='$ID_BERITA'");
    $for_berita     = mysqli_fetch_assoc($berita);

    $TGL_BERITA     =$for_berita['TGL_BERITA'];
    $JUDUL_BERITA   =$for_berita['JUDUL_BERITA'];
    $ISI_BERITA     =$for_berita['ISI_BERITA'];
}

?>
<div class="berita">
<div class="row justify-content-center px-4">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header text-center"><?= $JUDUL_BERITA ?></div>
            <div class="card-body"><?= $ISI_BERITA ?></div>
            <div class="card-footer text-center"><?= $TGL_BERITA ?></div>
            <br>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header text-center">Daftar Berita</div>
            <div class="card-body">
            <div class="col-lg-12 d-flex " data-aos="fade-up">
            <div class="info-box">
            <?php
              $berita= mysqli_query($koneksi, "SELECT * FROM berita");

                $counter3 = 1;
                while($for_berita = mysqli_fetch_array($berita)){
                    if ($counter3 <4){
                    
            ?>

            <div class="col-lg-12 faq-item <?php if($counter3 <=1){ echo " active ";} ?>" data-aos="fade-up">
                <h4><?php echo $for_berita['JUDUL_BERITA']?></h4>
                <h5><?php echo $for_berita['TGL_BERITA']?></h5>
                <p>
                <?php echo $for_berita['SJ_BERITA']?>
                </p>
                <a href="lp_berita.php?ID_BERITA=<?php echo $for_berita['ID_BERITA']?>">Lihat Selengkapnya...</a>
                <hr>
            </div>
            <?php } $counter3++; } ?>
            </div>
            </div>
            </div>
            <div class="card-footer text-center">
            <a href="semua_b.php">Lihat Semua Berita...</a>
            </div>
            <br>
        </div>
    </div>
</div>
<br>
</div>
<br>

<?php
include 'includes/footer.php'
?>