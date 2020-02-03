<?php 
session_start();
$_SESSION['active_link']=['admin'];
include 'includes/connector.php'; 

if(isset($_SESSION['admin_login'])){
  include 'includes/header.php' ;
  include 'includes/sidebar.php' ;
  include 'includes/footer.php';
  }else{
  require 'login_admin.php';
  }
?>