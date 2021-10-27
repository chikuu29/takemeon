<?php

session_start();

if(!isset($_SESSION['admin_user_id']) && !isset($_SESSION['email']) && !isset($_SESSION['password']) ){
    
    header('location:index.php');
}


?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="img/urllogo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/267324de9d.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <script src="https://cdn.tiny.cloud/1/0vakyenbkzugr5jmcj92nkwmrfna5wpdvup6u6z96kc4qzii/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->

<style>
    /* dash board card  */
/*.c-card{
    box-shadow: 0px 1px 11px white;
}*/
</style>
  

</head>

<body>
  <div id="fetch-animation"></div>

