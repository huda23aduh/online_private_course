<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LES PRIVAT ONLINE</title>

    <!-- Bootstrap core CSS -->
    <!-- public_url() locate on config/autoload.php -->
    <link href=<?php echo public_url()."vendor/bootstrap/css/bootstrap.min.css"; ?> rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href=<?php echo public_url(). "css/scrolling-nav.css"; ?> rel="stylesheet">


    <style type="text/css">
      
      .img-one {
        background-image: url("https://png.pngtree.com/thumb_back/fw800/back_pic/05/07/15/525973077d5eca5.jpg");
        /*background-repeat: no-repeat;*/

        width: 1400px;
        height: 620px;
        position: relative;
        background-size: 100%;
        
        cursor: pointer;
      }
      .img-one .hidden-content {
        position: absolute;
        opacity: 0.2;
        transition: all 0.4s;
        left: calc(35% - 10px);
        width: 65%;
        height: 100%;
        background: rgba(200, 200, 200, 0.4);
        border-left: 10px solid white;
      }
      .img-one:hover .hidden-content {
        opacity: 1;
      }
      .hidden-content h1 {
        margin-left: 5%;
      }
      .hidden-content p {
        width: 35%;
        margin-left: 5%;
      }

    </style>

  </head>

  <body >

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <div class="container" >
        <!-- <a class="navbar-brand js-scroll-trigger" href="#page-top">Start Bootstrap</a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href=<?php echo base_url() ?> > <img style="height: 30px;width:30px;" src=<?php echo public_url()."images/home.png" ?> /> Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href=<?php echo base_url().'admin/login' ?> > <img style="height: 30px;width:30px;" src=<?php echo public_url()."images/admin_logo.png" ?> /> Admin</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#venue">Venue</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#comment">Komentar</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#help" > <img style="height: 30px;width:30px;" src=<?php echo public_url()."images/help_logo.png" ?> /> Bantuan</a>
            </li>

            <!-- <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>

    