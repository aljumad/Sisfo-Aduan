<?php
    include '../config/koneksi.php';
    session_start();
    
    if(!isset($_SESSION['user'])) {
        header("location: login.php");
    }   
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../css/Chart.min.css">
    <script type="text/javascript" src="../js/Chart.min.js"></script>
    <style>
      .list-group a:hover {
        background: #C10000;
        color: yellow;
      }
      .menu {
        background: black;
        color: yellow;
        border: 1px solid white;
      }
      .visible {
        visibility: visible;
      }
      .invisible {
        visibility: hidden;
      }
    </style>

    <title>ADMIN | SISTEM INFORMASI PENGADUAN HUKUM</title>
  </head>

  <body>
    <div class="container-fluid">
      <div class="row text-light text-center p-3" style="background: #C10000">
        <div class="col">
          <a href="index.php" class="text-light" style="text-decoration: none;"><h3>SISFO PENGADUAN HUKUM ONLINE</h3></a>
        </div>
      </div>
      <div class="row" >
      <div class="col p-0 m-0">
        
        <div class="col-sm-9 pt-2 w-100 float-sm-right bg-light" style="min-height: 510px;">