<?php
session_start();
include 'php/db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Tourist - Share Your Story</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Bootstrap Icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
    rel="stylesheet" type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
  <link href="css/custom-styles.css" rel="stylesheet" />
  <!-- jQuery-->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-2 mb-5" id="mainNav">
    <div class="container px-4 px-lg-5">
      <a class="navbar-brand" href="#page-top">Tourist</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto my-2 my-lg-0">
          <?php 
            include('php/nav_links.php')
          ?>
        </ul>
      </div>
    </div>
  </nav>