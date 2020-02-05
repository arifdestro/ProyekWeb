<?php
include 'includes/connector.php';
require 'includes/header.php';
?>
<!--  ======================= Start Main Area ================================ -->
<main class="site-main">
    <!--  ======================= Start Banner Area =======================  -->
    <section class="site-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 site-title">
                    <h3 class="title-text text-white">Welcome To</h3>
                    <h1 class="title-text text-uppercase">SIMBA</h1>
                    <h4 class="title-text text-uppercase text-white">Sistem Informasi Lomba</h4>
                    <div class="site-buttons">
                        <div class="d-flex flex-row flex-wrap">
                            <a href="register.php" class="btn button primary-button mr-4 text-uppercase">Register</a>
                            <a type="button" class="btn button secondary-button text-uppercase">Lebih
                                Lanjut</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 banner-image">
                    <img src="./img/banner/1.png" alt="banner-img" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!--  ======================= End Banner Area =======================  -->

    <!--  ====================== Start Services Area =============================  -->

    <section class="services-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center services-title">
                    <h1 class="text-uppercase title-text">Services SIMBA</h1>
                    <p class="para">
                        Beberapa keunggulan jika anda menggunakan aplikasi SIMBA
                    </p>
                </div>
            </div>
            <div class="container services-list">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="services">
                            <div class="sevices-img text-center py-4">
                                <img src="./img/services/s4.png" alt="Services-1">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title text-uppercase font-roboto">Cepat</h5>
                                <p class="card-text text-secondary">
                                    Aplikasi dapat anda terapkan secara mudah tanpa harus bingung.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="services">
                            <div class="sevices-img text-center py-4">
                                <img src="./img/services/s2.png" alt="Services-2">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title text-uppercase font-roboto">Mudah</h5>
                                <p class="card-text text-secondary">
                                    Pendafataran dapat anda lakukan dimana saja dan kapan saja.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="services">
                            <div class="sevices-img text-center py-4">
                                <img src="./img/services/s1.png" alt="Services-3">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title text-uppercase font-roboto">Aman</h5>
                                <p class="card-text text-secondary">
                                    Data yang anda masukkan akan aman tersimpan di database kami.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--  ====================== End Services Area =============================  -->

    <!--  ====================== Start Tutorial =============================  -->
    <section class="tutorial">
        <div class="container-tutorial">
            <div class="row">
                <div class="col-lg-12 text-center tutorial-title">
                    <h1 class="text-uppercase judul font-weight-bold">Tutorial Pendaftaran</h1>
                    <p class="para text-white">
                        Perhatikan Tutorial dibawah ini agar tidak terjadi kesalahpahaman.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-12 mr-2 shadow price">
                    <h3 style="color: #00A2E9;" class="text-center font-roboto font-weight-bold text-uppercase pt-5">Olimpiade Science</h3>
                    <div class="lomba">
                        <div class="lomba-img text-center py-4">
                            <img src="./img/lomba/os.png" alt="os">
                        </div>
                        <div class="card-body text-right rounded">
                            <p>
                                <button class="btn btn-secondary text-uppercase text-center d-flex" type="button">
                                    Deskripsi Lomba
                                </button>
                            </p>
                            <div class="card card-body">
                                <p class="text-justify">
                                    Olimpiade Science adalah lomba lewat media berupa tes tulis. Tes tersebut
                                    merupakan media menarik dan dapat melatih konsentrasi serta logika cepat
                                    berfikir.
                                </p>
                            </div>
                            <div class="tutorial-button mt-4 text-center">
                                <button class="btn btn-biru text-uppercase"> Video
                                    Tutorial</button>
                                <button class="btn btn-oranye text-uppercase">Teks
                                    Tutorial</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 ml-2 shadow price">
                    <h3 class="text-center font-roboto font-weight-bold text-uppercase pt-5 style=" style="color:#00A2E9">Science Product</h3>
                    <div class="lomba justify-content-center">
                        <div class="lomba-img text-center py-4">
                            <img src="./img/lomba/sp.png" alt="os">
                        </div>
                        <div class="card-body text-right rounded">
                            <p>
                                <button class="btn btn-secondary text-uppercase text-center d-flex" type="button">
                                    Deskripsi Lomba
                                </button>
                            </p>
                            <div class="card card-body">
                                <p class="text-justify">
                                    Science Product adalah lomba untuk manghasilkan sebuah karya. karya tersebut
                                    bersifat ilmiah dan menarik. Kreativitas akan menjadi penentu penting dalam
                                    lomba.
                                </p>
                            </div>
                            <div class="tutorial-button mt-4 text-center">
                                <button class="btn btn-biru text-uppercase">Video Tutorial</button>
                                <button class="btn btn-oranye text-uppercase">Teks Tutorial</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-footer text-white bg-secondary text-center rounded mb-5">
                    NB : Silahkan pilih tutorial sesuai kenyamanan anda.
                </div>
            </div>
        </div>
    </section>
    <!--  ====================== End Tutorial =============================  -->

    <!--  ======================= Start Timeline =============================  -->
    <section id="pricing" class="pricing-section mt-4 pt-90" style="background-color:#fff;padding-bottom:0!important">
        <div class="pricing-section-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading text-center" style="margin-bottom:25px!important">
                            <h3 class="mt-30 mb-70" style="font-size:30px;color:#00A2E9;font-weight:800;text-align:center">TIMELINES EVENT
                            </h3>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="timeline">
                        <div class="timeline__wrap" style="margin-bottom:10px">
                            <div class="timeline__items">
                                <div class="timeline__item">
                                    <div class="timeline__content">
                                        <h2 style="font-size:18px;color: #F08519;">22 April – 31 Mei 2020</h2>
                                        <p style="color:#00A2E9;font-size:25px;">
                                            Pendaftaran Early – Olimpiade, Esai, Poster</p>
                                    </div>
                                </div>
                                <div class="timeline__item">
                                    <div class="timeline__content">
                                        <h2 style="font-size:18px;color: #F08519;">1 Juni 2020</h2>
                                        <p style="color:#00A2E9;font-size:25px;font-family:Quicksand">
                                            Try Out 1 – Olimpiade</p>
                                    </div>
                                </div>
                                <div class="timeline__item">
                                    <div class="timeline__content">
                                        <h2 style="font-size:18px;color: #F08519;">1 Juni – 13 September 2020</h2>
                                        <p style="color:#00A2E9;font-size:25px;">
                                            Pendaftaran Regular – Olimpiade, Esai, Poster</p>
                                    </div>
                                </div>
                                <div class="timeline__item">
                                    <div class="timeline__content">
                                        <h2 style="font-size:18px;color: #F08519;">13 September 2020</h2>
                                        <p style="color:#00A2E9;font-size:25px;">
                                            Pengumpulan Karya Terakhir – Esai, Poster</p>
                                    </div>
                                </div>
                                <div class="timeline__item">
                                    <div class="timeline__content">
                                        <h2 style="font-size:18px;color: #F08519;">31 Agustus 2020</h2>
                                        <p style="color:#00A2E9;font-size:25px;font-family:Quicksand">
                                            Try Out 2 – Olimpiade</p>
                                    </div>
                                </div>
                                <div class="timeline__item">
                                    <div class="timeline__content">
                                        <h2 style="font-size:18px;color: #F08519;">31 Agustus – 28 September 2020
                                        </h2>
                                        <p style="color:#00A2E9;font-size:25px;font-family:Quicksand">
                                            Pendaftaran Late – Olimpiade</p>
                                    </div>
                                </div>
                                <div class="timeline__item">
                                    <div class="timeline__content">
                                        <h2 style="font: size 18px;color:#F08519;">13 Oktober 2020</h2>
                                        <p style="color:#00A2E9;font-size:25px;font-family:Quicksand">
                                            Penyisihan – Olimpiade</p>
                                    </div>
                                </div>
                                <div class="timeline__item">
                                    <div class="timeline__content">
                                        <h2 style="font-size:18px;color: #F08519;">13 Oktober 2020</h2>
                                        <p style="color:#00A2E9;font-size:25px;font-family:Quicksand">
                                            Pengumuman Finalis – Esai</p>
                                    </div>
                                </div>
                                <div class="timeline__item">
                                    <div class="timeline__content">
                                        <h2 style="font-size:18px;color: #F08519;">26 Oktober 2020</h2>
                                        <p style="color:#00A2E9;font-size:25px;font-family:Quicksand">
                                            Semifinal – Olimpiade</p>
                                    </div>
                                </div>
                                <div class="timeline__item">
                                    <div class="timeline__content">
                                        <h2 style="font-size:18px;color: #F08519;">27 Oktober 2020</h2>
                                        <p style="color:#00A2E9;font-size:25px;font-family:Quicksand">Final &
                                            Grand Final – Olimpiade</p>
                                    </div>
                                </div>
                                <div class="timeline__item">
                                    <div class="timeline__content">
                                        <h2 style="font-size:18px;color: #F08519;">27 Oktober 2020</h2>
                                        <p style="color:#00A2E9;font-size:25px;font-family:Quicksand">Pengumuman
                                            Pemenang – Esai, Poster, Olimpiade</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- <img src="img/shape2.png" alt="shape" class="img-responsive"> -->
    </section>

    <!--  ======================== End Timeline ==============================  -->

    <!--  ========================= About Area ==========================  -->

    <section class="about-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-image">
                        <img src="./img/about-us.png" alt="About us" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 about-title">
                    <h2 class="text-uppercase pt-5">
                        <span>Apa itu</span>
                        <span>Simba ?</span>
                    </h2>
                    <div class="paragraph py-4 w-75">
                        <p class="para">
                            SIMBA atau SISTEM INFORMASI LOMBA adalah sebuah
                            aplikasi yang digunakan untuk manajemen event
                            dari pendaftaran hingga rekap data berbasis web.
                        </p>
                        <p class="para">
                            Dengan menggunakan aplikasi ini anda dapat menggunakan aplikasi dimana saja dan kapan
                            saja.
                            aplikasi menggunakan desain yang cukup friendly user. dan menggunakan sistem keamanan
                            yang bagus.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--  ========================= End About Area ==========================  -->

    <!--  ======================== About Me Area ==============================  -->

    <section class="about-area">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <div class="about-title">
                        <h1 class="text-uppercase title-h1">Client yang bekerja sama dengan kami</h1>
                        <!-- <p class="para">
                                Berikut adalah client yang bekerja sama dengan kami
                            </p> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="container carousel py-lg-4">
            <div class="client row justify-content-center">
                <div class="col-md-3 client-img">
                    <img src="./img/testimonials/img.png" alt="img1" width="200px" class="img-fluid">
                </div>
                <div class="col-md-4 about-client">
                    <h4 class="text-uppercase">HMPS TADRIS IAIN JEMBER</h4>
                    <p class="para">HMPS TADRIS adalah sebuah himpunan mahasiswa yang terdapat di IAIN JEMBER.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!--  ======================== End About Me Area ==============================  -->

    <!--  ========================== Subscribe me Area ============================  -->
    <section class="subscribe-us-area">
        <div class="container subscribe">
            <div class="row">
                <div class="col-lg-12 text-center subscribe-title">
                    <h4 class="text-uppercase">Dapatkan Update dari mana saja</h4>
                    <p class="para">Dengan meng-klik subscribe artinya anda menyetujui layanan langganan ke website ini.</p>
                </div>
            </div>
            <div class="d-sm-flex justify-content-center">
                <form class="w-50">
                    <div class="row d-flex flex-row flex-wrap">
                        <div class="col input-textbox">
                            <input type="text" id="txtemail" class="form-control" placeholder="Email">
                        </div>
                        <div class="col">
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-success float-right">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--  ========================== End Subscribe me Area ============================  -->


</main>
<!--  ======================= End Main Area ================================ -->

<?php include 'includes/footer.php'; ?>