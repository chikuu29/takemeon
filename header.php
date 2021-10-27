<?php
session_start();
require_once('google-config.php');
$cockie_user_email="";
$cockie_user_password="";

if(isset($_COOKIE['user_email']) && isset($_COOKIE['user_psw'])){
       $cockie_user_email=$_COOKIE['user_email'];
       $cockie_user_password=$_COOKIE['user_psw'];
      
      
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/urllogo.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <meta name="google-site-verification" content="8HYODm8ytFY-6iUp2jOMPCMT_OVnipxZ3_caY01fLXU" />
    <!-- font awosome icon javascript -->
    <script src="https://kit.fontawesome.com/267324de9d.js" crossorigin="anonymous"></script>
    <!-- font awosome icon javascript -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login-signup.css">
    <link rel="stylesheet" href="css/responsive-login.css">
    <link rel="stylesheet" href="css/container.css">  
    <link rel="stylesheet" href="css/content-holder.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3815605117884326"
     crossorigin="anonymous"></script>

 



   