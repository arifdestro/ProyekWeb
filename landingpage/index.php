<?php
include 'includes/connector.php';
include 'includes/header.php';
?>

  <!-- ======= Slide Show ======= -->
  <section id="hero">
  <?php
    $result= mysqli_query($koneksi, "SELECT * FROM slideshow");
    ?>
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">

        <?php
            $counter=1;
            while($for_slideshow=mysqli_fetch_array($result)){
              ?>
            <div class="carousel-item<?php if($counter <=1){ echo " active ";} ?>" style="background-image: url('assets/img/slide/<?php echo $for_slideshow['NAMA_SS']?>');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animated fadeInDown"><?php echo $for_slideshow['JUDUL_SS']?></h2>
                <p class="animated fadeInUp"><?php echo $for_slideshow['ISI_SS']?></p>
              </div>
            </div>
          </div>
          <?php
            $counter++;
          }
          ?>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section>
  <!-- Akhir Slide Show -->

  <main id="main">

    <!-- ======= Berita Section ======= -->

    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Pengumuman Berita dan Agenda Utama</h2>
        </div>

        <div class="row">
          <div class="col-lg-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="info-box">
              <div id="judul">
                <h4>Pengumuman dan Berita</h4>
              </div>
              <hr>

              <?php
              $berita= mysqli_query($koneksi, "SELECT * FROM berita");

                $counter3 = 1;
                while($for_berita = mysqli_fetch_array($berita)){
              ?>

              <div class="col-lg-12 faq-item<?php if($counter3 <=1){ echo " active ";} ?>" data-aos="fade-up">
                <h4><?php echo $for_berita['JUDUL_BERITA']?></h4>
                <h5><?php echo $for_berita['TGL_BERITA']?></h5>
                <p>
                <?php echo $for_berita['SJ_BERITA']?>
                </p>
                <a href="lp_berita.php?ID_BERITA=<?php echo $for_berita['ID_BERITA']?>">Selengkapnya...</a>
                <hr>
              </div>
              <?php $counter3++; } ?>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="info-box ">
              <div id="judul">
                <h4>Agenda Utama</h4>
              </div>
              <hr>
              <?php
              $agenda= mysqli_query($koneksi, "SELECT * FROM agenda ORDER BY ID_AGENDA");

                $counter2 = 1;
                while($for_agenda = mysqli_fetch_array($agenda)){
              ?>
              <div class="col-lg-12 faq-item<?php if($counter2 <=1){ echo " active ";} ?>" data-aos="fade-up">
                <h4><?php echo $for_agenda['JUDUL_AGENDA']?></h4>
                <h5><?php echo $for_agenda['TGL_AGENDA']?></h5>
                <p class="overflow-auto"><?php echo $for_agenda['SJ_AGENDA']?>
                </p>
                <a href="lp_agenda.php?ID_AGENDA=<?php echo $for_agenda['ID_AGENDA']?>">Selengkapnya...</a>
                <hr>
              </div>
              <?php $counter2++; } ?>
              
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- ======= Akhir Berita Section ======= -->

    <hr>

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row no-gutters">
          <div class="col-lg-6 video-box">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
            <a href="https://youtu.be/H5kxp44zXPo" class="venobox play-btn mb-4" data-vbtype="video"
              data-autoplay="true"></a>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

            <div class="section-title">
              <hr>
              <h4>Visi</h4>
              <p>Pada tahun 2020, menjadi program studi pencetak Sarjana yang unggul dalam bidang pendidikan Ilmu
                Pengetahuan Alam
                berorientasi nilai-nilai Islam Nusantara dan pengembangan media pembelajaran berbasis Teknologi Tepat
                Guna</p>
              <hr>
              <h4>Misi</h4>
              <p>1. Menyelenggarakan pendidikan dan pengajaran yang berkualitas dalam bidangpendidikan IPA yang
                berorientasi pada
                nilai-nilai Islam Nusantara dan pengembangan media pembelajaran berbasis Teknologi Tepat Guna.
                <br>
                2. Menyelenggarakan penelitian dalam bidangpendidikan IPA yang berorientasi pada nilai-nilai Islam
                Nusantara dan pengembangan media pembelajaran berbasisTeknologi Tepat Guna.
                <br>
                3. Menyelenggarakan pengabdian masyarakat dalam bidang pendidikan IPA yang berorientasi pada nilai-nilai
                Islam Nusantara dan pengembangan media pembelajaran berbasis Teknologi Tepat Guna.</p>
              <hr>
              <h4>Tujuan</h4>
              <p>Pada tahun 2020, menjadi program studi pencetak Sarjana yang unggul dalam bidang pendidikan Ilmu
                Pengetahuan Alam
                berorientasi nilai-nilai Islam Nusantara dan pengembangan media pembelajaran berbasis Teknologi Tepat
                Guna</p>
              <hr>
            </div>

          </div>
        </div>

      </div>
    </section>

    <!-- Akhir About Us Section -->

    <!-- ======= Struktur Organisasi Section ======= -->
    <section id="organization" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Struktur Pengurus</h2>
          <p>Struktur Pengurus Harian Organisasi HMPS Vektor Tadris IPA IAIN Jember Periode 2020-2021</p>
        </div>
        <div class="row">

        <?php
        $k=mysqli_query($koneksi,"SELECT * FROM pengurus WHERE ID_P='P0001'");
        $for_k=mysqli_fetch_array($k);
        ?>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="assets/img/team/<?php echo $for_k['FOTO_P']?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4><?php echo $for_k['NAMA_P']?></h4>
                <span><?php echo $for_k['JABATAN_P']?></span>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-1 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          </div>

        <?php
        $wk=mysqli_query($koneksi,"SELECT * FROM pengurus WHERE ID_P='P0002'");
        $for_wk=mysqli_fetch_array($wk);
        ?>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="assets/img/team/<?php echo $for_wk['FOTO_P']?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4><?php echo $for_wk['NAMA_P']?></h4>
                <span><?php echo $for_wk['JABATAN_P']?></span>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
          </div>

        </div>

        <div class="row">

          <div class="col-xl-1 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          </div>

          <?php
          $s=mysqli_query($koneksi,"SELECT * FROM pengurus WHERE ID_P='P0003'");
          $for_s=mysqli_fetch_array($s);
          ?>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="assets/img/team/<?php echo $for_s['FOTO_P']?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4><?php echo $for_s['NAMA_P']?></h4>
                <span><?php echo $for_s['JABATAN_P']?></span>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-1 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          </div>

          <?php
          $ws=mysqli_query($koneksi,"SELECT * FROM pengurus WHERE ID_P='P0004'");
          $for_ws=mysqli_fetch_array($ws);
          ?>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="assets/img/team/<?php echo $for_ws['FOTO_P']?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4><?php echo $for_ws['NAMA_P']?></h4>
                <span><?php echo $for_ws['JABATAN_P']?></span>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-1 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          </div>

          <?php
          $b=mysqli_query($koneksi,"SELECT * FROM pengurus WHERE ID_P='P0005'");
          $for_b=mysqli_fetch_array($b);
          ?>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="assets/img/team/<?php echo $for_b['FOTO_P']?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4><?php echo $for_b['NAMA_P']?></h4>
                <span><?php echo $for_b['JABATAN_P']?></span>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>



        </div>


      </div>

      </div>


    </section>
    <!-- Akhir struktur organisasi Section -->

    <!-- Akhir About Us Section -->

    <!-- ======= About Lists Section ======= -->
    <!-- <section class="about-lists">
      <div class="container">

        <div class="row no-gutters">

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up">
            <span>01</span>
            <h4>Lorem Ipsum</h4>
            <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="100">
            <span>02</span>
            <h4>Repellat Nihil</h4>
            <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire leno para dest
            </p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="200">
            <span>03</span>
            <h4> Ad ad velit qui</h4>
            <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="300">
            <span>04</span>
            <h4>Repellendus molestiae</h4>
            <p>Inventore quo sint a sint rerum. Distinctio blanditiis deserunt quod soluta quod nam mider lando casa</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="400">
            <span>05</span>
            <h4>Sapiente Magnam</h4>
            <p>Vitae dolorem in deleniti ipsum omnis tempore voluptatem. Qui possimus est repellendus est quibusdam</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="500">
            <span>06</span>
            <h4>Facilis Impedit</h4>
            <p>Quis eum numquam veniam ea voluptatibus voluptas. Excepturi aut nostrum repudiandae voluptatibus corporis
              sequi</p>
          </div>

        </div>

      </div>
    </section> -->
    <!-- Akhir About Lists Section -->

    <!-- ======= Countdown Section ======= -->
    <!-- <section class="counts section-bg">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
            <div class="count-box">
              <i class="icofont-simple-smile" style="color: #20b38e;"></i>
              <span data-toggle="counter-up">12</span>
              <h2>Hari</h2>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="count-box">
              <i class="icofont-document-folder" style="color: #c042ff;"></i>
              <span data-toggle="counter-up">16</span>
              <h2>Jam</h2>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
            <div class="count-box">
              <i class="icofont-live-support" style="color: #46d1ff;"></i>
              <span data-toggle="counter-up">23</span>
              <h2>Menit</h2>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
            <div class="count-box">
              <i class="icofont-users-alt-5" style="color: #ffb459;"></i>
              <span data-toggle="counter-up">16</span>
              <h2>Detik</h2>
            </div>
          </div>

        </div>

      </div>
    </section> -->
    <!-- Akhir Countdown Section -->

    <!-- ======= Info Lomba Section ======= -->
    <section id="services" class="services">
    <?php
    $jl=mysqli_query($koneksi,"SELECT * FROM jenis_lomba");
    ?>
      <div class="container">
        <div class="section-title">
          <h2>Galaksi 2020</h2>
        </div>

        <div class="row">
          <?php
          $counter5=1;
          while($for_jl=mysqli_fetch_array($jl)){
          ?>
          <div class="col-lg-6 col-md-6 icon-box shadow p-5 <?php if($counter5 <=1){ echo " active ";} ?>" data-aos="fade-up">
            <div class="icon"><i class="icofont-tasks-alt"></i></div>
            <h4 class="title"><a href=""><?php echo $for_jl['NAMA_LOMBA']?></a></h4>
            <p class="description"><?php echo $for_jl['KET_LOMBA']?></p>
            <a href="pendaftaran_saya.php" class="btn btn-info">Daftar Sekarang</a>
            <br>
            <br>
          </div>
          <?php
            $counter5++;
          }
          ?>
        </div>

      </div>
    </section>
    <!-- Akhir info lomba Section -->


    <!-- ======= Portofolio Section ======= -->
    <!-- <section id="portfolio" class="portfolio section-bg" data-aos="fade-up" data-aos-delay="100">
      <div class="container">

        <div class="section-title">
          <h2>Portofolio</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
            consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit
            in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Semua</li>
              <li data-filter=".filter-card">Galery Panitia</li>
              <li data-filter=".filter-web">Galery Pemenang</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-1.jpg" data-gall="portfolioGallery" class="venobox"
                    title="App 1"><i class="icofont-eye"></i></a>
                  <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-2.jpg" data-gall="portfolioGallery" class="venobox"
                    title="Web 3"><i class="icofont-eye"></i></a>
                  <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-3.jpg" data-gall="portfolioGallery" class="venobox"
                    title="App 2"><i class="icofont-eye"></i></a>
                  <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-4.jpg" data-gall="portfolioGallery" class="venobox"
                    title="Card 2"><i class="icofont-eye"></i></a>
                  <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 2</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-5.jpg" data-gall="portfolioGallery" class="venobox"
                    title="Web 2"><i class="icofont-eye"></i></a>
                  <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-6.jpg" data-gall="portfolioGallery" class="venobox"
                    title="App 3"><i class="icofont-eye"></i></a>
                  <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-7.jpg" data-gall="portfolioGallery" class="venobox"
                    title="Card 1"><i class="icofont-eye"></i></a>
                  <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-8.jpg" data-gall="portfolioGallery" class="venobox"
                    title="Card 3"><i class="icofont-eye"></i></a>
                  <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-9.jpg" data-gall="portfolioGallery" class="venobox"
                    title="Web 3"><i class="icofont-eye"></i></a>
                  <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>-->
    <!-- Akhir Portfolio Section -->

    <!-- ======= Pengurus Section ======= -->
    <!-- <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Pengurus</h2>
          <p>Pengurus HMPS Vektor Tadris IPA IAIN Jember Periode 2020-2021</p>
        </div>

        <div class="row">

          <div class="col-xl-3"></div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Ketua HMPS</span>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Waka HMPS</span>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3"></div>

        </div>

        <a href="#" class="btn btn-info">Selengkapnya</a>

      </div>

      </div>


    </section> -->
    <!-- Akhir Pengurus Section -->

    <!-- ======= Pertanyaan Umum Section ======= -->
    <!-- <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Berita dan Pengumuman</h2>
        </div>

        <div class="row  d-flex align-items-stretch">

          <div class="col-lg-6 faq-item" data-aos="fade-up">
            <h4>Pengumuman 1</h4>
            <p>
              Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida.
              Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="100">
            <h4>Pengumuman 2</h4>
            <p>
              Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec
              ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit
              ullamcorper dignissim.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="200">
            <h4>Pengumuman 3</h4>
            <p>
              Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum
              integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt.
              Lectus urna duis convallis convallis tellus.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="300">
            <h4>Pengumuman 4</h4>
            <p>
              Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec
              ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit
              ullamcorper dignissim.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="400">
            <h4>Pengumuman 5</h4>
            <p>
              Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel
              risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida
              quis blandit turpis cursus in
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="500">
            <h4>Pengumuman 6</h4>
            <p>
              Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc
              vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in
              metus vulputate eu scelerisque.
            </p>
          </div>

        </div>

      </div>
    </section> -->
    <!-- Akhir Pertanyaan Umum Section -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact2">
      <div class="container">

        <div class="section-title">
          <h2>Contact Us</h2>
        </div>

        <div class="row">

          <div class="col-lg-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="info-box2">
              <h3>Alamat Kami</h3>
              <!-- <script>
                  // fungsi initialize untuk mempersiapkan peta
                  function initialize() {
                  var propertiPeta = {
                    center:new google.maps.LatLng(-8.1945357,113.6569286),
                    zoom:15,
                    mapTypeId:google.maps.MapTypeId.ROADMAP
                  };
                  
                  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
                  
                }

                  // event jendela di-load  
                  google.maps.event.addDomListener(window, 'load', initialize);
              </script> -->
                  <!-- Elemen yang akan menjadi kontainer peta -->
                  <!-- <div id="googleMap" style="width:100%;height:100%; min-height:350px;"></div> -->
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.0816455202835!2d113.65473991437115!3d-8.194530384448452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7adbce9924331%3A0x3154e897b0f07094!2sInstitut%20Agama%20Islam%20Negeri%20Jember!5e0!3m2!1sid!2sid!4v1581995267907!5m2!1sid!2sid" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
          </div>

          <?php
          $kontak=mysqli_query($koneksi, "SELECT * FROM kontak ORDER BY ID_K");
          ?>
          <div class="col-lg-6 d-flex align-items-stretch<?php if($counter <=1){ echo " active ";} ?>" data-aos="fade-up" data-aos-delay="200">
            <div class="info-box2">
              <h3>Kontak Person</h3>
              <hr>
              <?php
              $counter6=1;
              while($for_kontak=mysqli_fetch_array($kontak)){
              ?>
              <p>Rayon <?php echo $for_kontak['RAYON']?> : <?php echo $for_kontak['HP']?> <?php echo  $for_kontak['NAMA']?></p>
              <hr>
              <?php
            $counter6++;
          }
          ?>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- Akhir Contact Us Section -->

  </main><!-- End #main -->

<?php
include 'includes/footer.php';
?>