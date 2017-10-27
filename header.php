<!doctype html>
<html lang="en">
  <head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
  </head>
  <body>
    <div class="ieo-page">
      <!-- cabecera -->
      <header class="containter-fluid ieo-header fixed-top">
        <nav class="container navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="#">
           <img src="<?php bloginfo('template_url'); ?>/img/logo-inexon2.png" height="30" alt="">
         </a>
          <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="zmdi zmdi-menu"></i>
          </button>

          <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0 ml-auto justify-content-center ieo-flex-grow mr-2">
              <div class="ieo-input-group ieo-flex-grow">
                <input class="form-control ieo-flex-grow  ieo-input-control ieo-input-text --tras-white" type="search" placeholder="Que quieres aprender?" aria-label="Search">
                <button class="ieo-input-control ieo-flex-grow-0 ieo-btn --green" type="submit">
                  <i class="zmdi zmdi-search"></i>
                </button>
              </div>
            </form>
            <!-- <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <div class="dropdown-wrapper">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
              </li>
            </ul> -->
            <?php
            wp_nav_menu(array(
              'theme_location' => 'superior',
              'container' => 'div',
              'container_class' => ' ',
              'container_id' => ' ',
              'items_wrap' => '<ul class="navbar-nav ml-auto text-center">%3$s</ul>',
              'menu_class' => 'nav-item'
            ));

            
             ?>


          </div>


        </nav>
      </header>
