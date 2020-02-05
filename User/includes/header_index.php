<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simba | Sistem aplikasi Lomba</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="img/favicon-16x16.png" sizes="16x16" />

    <!--  Bootstrap css file  -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!--  font awesome icons  -->
    <link rel="stylesheet" href="./css/all.min.css">


    <!--  Magnific Popup css file  -->
    <link rel="stylesheet" href="./vendor/Magnific-Popup/dist/magnific-popup.css">


    <!--  Owl-carousel css file  -->
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">


    <!--  custom css file  -->
    <link rel="stylesheet" href="./css/desain.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="faq.css">

    <!-- timeline -->
    <link rel="stylesheet" href="./css/timeline.min.css">

    <!--  Responsive css file  -->
    <link rel="stylesheet" href="./css/responsive.css">

</head>

<body>
    <div class="container-all">
        <div class="whatsapp">
            <script src="https://apps.elfsight.com/p/platform.js" defer></script>
            <div class="elfsight-app-ec15fd56-42ea-44ef-8639-3c509bdb529e"></div>
        </div>


        <!--  ======================= Start Header Area ============================== -->

        <header class="header_area">
            <div class="main-menu">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.php"><img src="./img/logo1.png" width="100px" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <div class="justify-content-center"></div>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tutorial">Tutorial</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="daftar.php">Pendaftraan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Tentang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="faq.php">Bantuan</a>
                            </li>
                        </ul>
                        <div class="button-place mr-auto">
                            <ul class="navbar-nav">
                                <?php
                                error_reporting(0);
                                session_start();
                                if ($_SESSION['status'] == 'login') {
                                ?>
                                    <li class="nav-item">
                                        <div class="dropdown">
                                            <button class="pt-2 btn dropdown-toggle" type="button" id="menu-profile" data-toggle="dropdown">
                                                <img class="mt-1 rounded-circle img-circle" src="./img/avatar.png" width="50px">
                                                <span class="caret"></span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right text-right">
                                                <a class="dropdown-item" href="ubah_profile.php">Setting Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="logout.php">Logout</a>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                } elseif ($_SESSION['status'] != 'login') {
                                    // header("location:../index.php?=belum login");
                                    echo
                                        '<li class="nav-item">
                                    <button class="nav-link text-white btn btn-ungu js-scroll-trigger mr-2" data-target="#login_user" data-toggle="modal">MASUK</button>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white btn btn-oranye js-scroll-trigger ml-2" href="register.php">DAFTAR</a>
                                </li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!--  ======================= End Header Area ============================== -->

        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == 'gagal') {
                echo '<div id="alert-login" class="text-center alert alert-danger alert-dismissible fade show position-fixed alert-login mx-auto" role="alert">
                        Login anda <strong>Gagal!</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
            } else if ($_GET['pesan'] == 'logout') {
                echo '<div id="alert-login" class="text-center alert alert-success alert-dismissible fade show position-fixed alert-login mx-auto" role="alert">
                      Anda <strong>Berhasil!</strong> melakukan logout!.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
            } else if ($_GET['pesan'] == 'loginberhasil') {
                $_SESSION['status'] = 'login';
                echo '<div id="alert-login" class="text-center alert alert-success alert-dismissible fade show position-fixed alert-login mx-auto" role="alert">
                        Login <strong>Berhasil!</strong> semoga harimu menyenangkan!.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
            }
        }
        ?>