<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HMPS Tadris IPA</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/ikon.jfif" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Huruf -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900"
    rel="stylesheet">

  <!-- Vendor File CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- style css -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- api google maps -->
  <script src="http://maps.googleapis.com/maps/api/js"></script>

</head>

<body>

<div style="position:fixed;right:12px;bottom:60px;width:40px;height:40px;z-index:99999;">
<a href="https://api.whatsapp.com/send?phone=+6285155214720&text=Halo">
<img src="https://web.whatsapp.com/img/favicon/2x/favicon.png"></a>
</div>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <h5>HMPS Vektor Tadris IPA IAIN Jember</h5>
      </div>
      <div class="social-links float-right">
        <i class="icofont-envelope"></i><a href="mailto:hmpstadrisipa@gmail.com">hmpstadrisipa@gmail.com</a>
        <i class="icofont-phone"></i> +62 815 5497 3376
        <a href="#" class="twitter"><i class="icofont-whatsapp"></i></a>
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <div class="logo float-left">
        <a href="index.html"><img src="assets/img/ikon.jfif" alt="logo" class="img-fluid"></a>
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li><a href="index.php">Home <i class="la la-angle-down"></i></a></li>
          <li class="drop-down"><a href="#">Profil</a>
            <ul>
              <li><a href="#">Sejarah</a></li>
              <li><a href="#">Visi & Misi</a></li>
              <li><a href="#">Struktur Pengurus</a></li>
              <li><a href="#">Profil Dosen</a></li>
            </ul>
          </li>
          <li><a href="#">Galaksi 2020</a></li>
          <li><a href="semua_a.php">Agenda</a></li>
          <li><a href="semua_b.php">Berita</a></li>
          <li class="drop-down"><a href="#">Karya Mahasiswa</a>
            <ul>
              <li><a href="#">Jurnal</a></li>
              <li><a href="#">Karya Ilmiah</a></li>
              <li><a href="#">Karya Fiksi</a></li>
              <li><a href="#">Lain-lain</a></li>
            </ul>
          </li>
          <li class="drop-down"><a href="#">Lembaga Semi Otonom</a>
            <ul>
              <li><a href="#">Benzea Club</a></li>
              <li><a href="#">PEPSIN Club</a></li>
              <li><a href="#">Buletin Atoms</a></li>
              <li><a href="#">Sanggar Tari Bimasakti</a></li>
              <li><a href="#">FC Clorida</a></li>
              <li><a href="#">Club Bulu Tangkis</a></li>
            </ul>
          </li>
          <li class="drop-down"><a href="#">Tentang Kami</a>
            <ul>
              <li><a href="#">Mahasiswa</a></li>
              <li><a href="#">Data Alumni</a></li>
              <li><a href="#">Admin</a></li>
              <li><a href="#" data-toggle="modal" data-target="#myModal">User</a></li>
              <li><a href="lo_user.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </nav>

    </div>
  </header>

  <div class="modal fade" id="myModal" >
                <div class="modal-dialog modal-md">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Login User</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                    <div class="container">


                          <form action="cl_user.php" method="post">
                            <div class="form-group" >
                              <div class="form-label-group">
                              <label for="inputEmail">Nama User</label>
                                <input type="text" id="inputEmail" name="NAMA_USER" class="form-control" placeholder="Nama" required="required" autofocus="autofocus">
                                
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="form-label-group">
                              <label for="inputPassword">Password</label>
                                <input type="password" id="inputPassword" name="PASSWORD_USER" class="form-control " placeholder="Password" required="required">
                                
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="remember-me">
                                  Remember Password
                                </label>
                              </div>
                            </div>

                            <div>
                            <input type="submit" class="btn btn-primary btn-block" name="login_user" value="Login">
                            </div>

                          </form>
                          <div class="text-center">
                            <a class="d-block small mt-3" href="register_user.php">Daftar Akun Baru</a>
                          </div>
                      </div>
                    </div>

                    </div>
                    
                </div>
                </div>
            </div>

  <?php
  include 'includes/connector.php';
  ?>