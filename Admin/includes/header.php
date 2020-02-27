<?php
if (isset($_SESSION['admin_login'])) {
$NAMA_ADMIN = $_SESSION['NAMA_ADMIN'];
$data = mysqli_query($koneksi, "SELECT * FROM admin WHERE NAMA_ADMIN = '$NAMA_ADMIN'");
$data_admin = mysqli_fetch_assoc($data);
$ID_ADMIN = $data_admin['ID_ADMIN'];
}
?> 
    
    
    <!DOCTYPE html>
    <html lang="en">

    <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Tables</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>

    </head>

    <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="index.php">Start Bootstrap</a>

        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
        </button>

         <!-- Navbar Admin -->
         <div class="input-group">
            
            <i class="fas fa-user-circle fa-fw"><label><?= $NAMA_ADMIN?></label></i>
                
            </div>
    

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
        
            
            <a class="navbar-brand mr-2" href="logout_admin.php" data-toggle="modal" data-target="#logoutModal">Logout</a>
        
       
        </ul>

    </nav>

