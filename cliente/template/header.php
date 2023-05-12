<?php
session_start();
  if(!isset($_SESSION['privilegios'])){

    header('Location: ../index.php');

  } else if($_SESSION['privilegios'] != 3){

    header('Location: ../index.php');
        exit;

  }
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>JAGUI TOUR CPANEL</title>

  <!-- Favicons -->
  <link href="../template/img/jagui_tour.png" rel="icon">
  <link href="../template/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../template/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../template/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../template/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../template/lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="../template/css/style.css" rel="stylesheet">
  <link href="../template/css/style-responsive.css" rel="stylesheet">
  <script src="../template/lib/chart-master/Chart.js"></script>
    <!--Mis importaciones-->
  <script src="../template/js/jquery.min.js"></script>
  <script src="../template/js/popper.min.js"></script>
  <script src="../template/js/bootstrap.min.js"></script>
  <script src="../template/js/bootstrap-confirmation.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Barra de navegación"></div>
      </div>
      <!--logo start-->
      <a href="" class="logo"><img class="img-circle" src="../template/img/jagui_tour.png" width="50" height="50"><b>JAGUI<span> TOUR</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">

      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="../../logout.php" style="background-color: red;">Logout</a></li>
        </ul>
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="../../index.php" style="background-color: blue;">Ver la pagina</a></li>
        </ul>        
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="guardar.php"><img src="../../admin/clientes/<?php if(isset($_SESSION['urlAvatar'])){ echo $_SESSION['urlAvatar'];}?>" class="img-circle" width="80"></a></p>
          <h5 class="centered" style="color: black;"><?php if(isset($_SESSION['nombre'])){ echo $_SESSION['nombre'];}?></h5>
          <li class="mt">
            <a class="active" href="../index.php">
              <i class="fa fa-dashboard"></i>
              <span>Escritorio</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="guardar.php">
              <i class="fa fa-user"></i>
              <span>Mi cuenta</span>
              </a>
            <!--<ul class="sub">
              <li><a href="general.html">General</a></li>
              <li><a href="buttons.html">Buttons</a></li>
              <li><a href="panels.html">Panels</a></li>
              <li><a href="font_awesome.html">Font Awesome</a></li>
            </ul>-->
          </li>
          <li class="sub-menu">
            <a href="../viajesGenerales/index.php">
              <i class="fa fa-comments-o"></i>
              <span>viajes grupales</span>
              </a>
            <!--<ul class="sub">
              <li><a href="basic_table.html">Basic Table</a></li>
              <li><a href="responsive_table.html">Responsive Table</a></li>
              <li><a href="advanced_table.html">Advanced Table</a></li>
            </ul>-->
          </li>
          <li>
            <a href="../contacto/index.php">
              <i class="fa fa-folder-open"></i>
              <span>Mis viajes personalizados</span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li>
          <!--<li class="sub-menu">
            <a href="javascript:;">
              <i class=" fa fa-bar-chart-o"></i>
              <span>Charts</span>
              </a>
            <ul class="sub">
              <li><a href="morris.html">Morris</a></li>
              <li><a href="chartjs.html">Chartjs</a></li>
              <li><a href="flot_chart.html">Flot Charts</a></li>
              <li><a href="xchart.html">xChart</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-comments-o"></i>
              <span>Chat Room</span>
              </a>
            <ul class="sub">
              <li><a href="lobby.html">Lobby</a></li>
              <li><a href="chat_room.html"> Chat Room</a></li>
            </ul>
          </li>
          <li>
            <a href="google_maps.html">
              <i class="fa fa-map-marker"></i>
              <span>Google Maps </span>
              </a>
          </li>-->
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>