<?php
session_start();
require 'function.php';
if (isset($_POST["signup_submit"])){

 if (daftar($_POST) > 0){
   echo "<script>
         alert ('admin berhasil ditambah');
       </script>";
       header("Location: login_admin.php");
 }else{
   echo mysqli_error($koneksi);}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Register Admin</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link rel="stylesheet" href="style.css">



  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/animate/animate.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header">
    
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
      <form action="" method="post" enctype="multipart/form-data" >
        <div id="login-box">
          <div class="left">
          <span class="ketsignup"> DAFTAR</span>
          
          <input type="text" name="username" placeholder="Username" required autocomplete="off" autofocus/>
          <input type="password" name="password" placeholder="Password" required autocomplete="off"/>
          <input type="password" name="password2" placeholder="Ulagi Password" required autocomplete="off"/>
         <input type="submit" name="signup_submit" value="Daftar" />
        
        
          </div>
          
          <div class="right">
            <span class="loginwith">Sudah ada akun?</span>
            <button class="social-signin facebook"  onclick="window.location.href = 'login_admin.php';">Masuk</button>
          </div>
        </section><!-- #hero -->
<br>
</body>
</html>
