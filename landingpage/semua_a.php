<?php
include 'includes/header.php';
include 'includes/connector.php';
?>
<div class="container px-5">

<div class="card mt-1 mb-5 shadow justify-content-center">
    <div class="card-header text-center"><h4>Agenda</h4></div>
    <div class="card-body">
            <?php
              $AGENDA= mysqli_query($koneksi, "SELECT * FROM agenda");

                $counter3 = 1;
                while($for_AGENDA = mysqli_fetch_array($AGENDA)){
            ?>

            <div class="col-lg-12 faq-item border p-4<?php if($counter3 <=1){ echo " active ";} ?>" data-aos="fade-up">
                <h4><?php echo $for_AGENDA['JUDUL_AGENDA']?></h4>
                <h5><?php echo $for_AGENDA['TGL_AGENDA']?></h5>
                <p>
                <?php echo $for_AGENDA['SJ_AGENDA']?>
                </p>
                <a href="lp_agenda.php?ID_AGENDA=<?php echo $for_AGENDA['ID_AGENDA']?>">Selengkapnya...</a>
            </div>

            <?php $counter3++; } ?>
    </div>
    <div class="card-footer text-center">Anda telah mencapai bagian akhir halaman</div>
</div>
</div>

<?php
include 'includes/footer.php'
?>