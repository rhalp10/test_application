<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="developer" content="Rhalp Darren R. Cabrera">
    <meta name="generator" content="Jekyll v3.8.5">
    <title><?php $page_title?></title>

    <link rel="icon" href="<?php echo base_url(); ?>assets/img/logo/primary_logo.ico" type="image/x-icon">
    <!-- Bootstrap core CSS -->
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">




    <style>
      body {
      background: url('<?php echo base_url(); ?>assets/img/background/bg-image1.jpg') no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      background-size: cover;
      -o-background-size: cover;
    }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/floating-labels.css" rel="stylesheet">

  <!-- include the style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/alertifyjs/css/alertify.min.css" />
  <!-- include a theme -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/alertifyjs/css/themes/default.min.css" />
  <!-- include a extra css -->
  <?php 
  if(isset($link_css)){
      foreach($link_css as $extra_css){
        echo $extra_css;
      }
  }
  ?>

  </head>
  <body>