<?php
include 'includes/header.php';
include 'includes/connector.php';

if (isset($_GET['ID_AGENDA'])) {
    $ID_AGENDA=$_GET['ID_AGENDA'];

    $agenda = mysqli_query($koneksi,"SELECT * FROM AGENDA WHERE ID_AGENDA='$ID_AGENDA'");
    $for_agenda     = mysqli_fetch_assoc($agenda);

    $TGL_AGENDA     =$for_agenda['TGL_AGENDA'];
    $JUDUL_AGENDA   =$for_agenda['JUDUL_AGENDA'];
    $ISI_AGENDA     =$for_agenda['ISI_AGENDA'];
}

?>
<div class="AGENDA">
<div class="row justify-content-center px-4">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header text-center"><?= $JUDUL_AGENDA ?></div>
            <div class="card-body"><?= $ISI_AGENDA ?></div>
            <div class="card-footer text-center"><?= $TGL_AGENDA ?></div>
            <br>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header text-center">Agenda Lainya</div>
            <div class="card-body">
            <div class="col-lg-12 d-flex " data-aos="fade-up">
            <div class="info-box">
            <?php
              $agenda= mysqli_query($koneksi, "SELECT * FROM agenda");

                $counter3 = 1;
                while($for_agenda = mysqli_fetch_array($agenda)){
                    if ($counter3 < 4) {

                    
            ?>

            <div class="col-lg-12 faq-item<?php if($counter3 <=1){ echo " active ";} ?>" data-aos="fade-up">
                <h4><?php echo $for_agenda['JUDUL_AGENDA']?></h4>
                <h5><?php echo $for_agenda['TGL_AGENDA']?></h5>
                <p>
                <?php echo $for_agenda['SJ_AGENDA']?>
                </p>
                <a href="lp_agenda.php?ID_AGENDA=<?php echo $for_agenda['ID_AGENDA']?>">Lihat Selengkapnya...</a>
                <hr>
            </div>
            <?php } $counter3++; } ?>
            </div>
            </div>
            </div>
            <div class="card-footer text-center">
            <a href="semua_a.php">Lihat Semua Agenda...</a>
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