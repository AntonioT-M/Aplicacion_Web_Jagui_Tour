<?php
include_once "../admin/class/Clientes.php";
session_start();
  if(!isset($_SESSION['privilegios'])){

    header('Location: ../index.php');

  } else if($_SESSION['privilegios'] != 1 && $_SESSION['privilegios'] != 2){

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
  <link href="template/img/jagui_tour.png" rel="icon">
  <link href="template/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="template/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="template/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="template/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="template/lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="template/css/style.css" rel="stylesheet">
  <link href="template/css/style-responsive.css" rel="stylesheet">
  <script src="template/lib/chart-master/Chart.js"></script>
    <!--Mis importaciones-->
  <script src="template/js/jquery.min.js"></script>
  <script src="template/js/popper.min.js"></script>
  <script src="template/js/bootstrap.min.js"></script>
  <script src="template/js/bootstrap-confirmation.js"></script>

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
      <a href="" class="logo"><img class="img-circle" src="template/img/jagui_tour.png" width="50" height="50"><b>JAGUI<span> TOUR</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">

      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="../logout.php">Logout</a></li>
        </ul>
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="../index.php" style="background-color: blue;">Ver la pagina</a></li>
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
          <p class="centered"><a href="usuarios/miPerfil.php"><img src="usuarios/<?php if(isset($_SESSION['urlAvatar'])){ echo $_SESSION['urlAvatar'];}?>" class="img-circle" width="80"></a></p>
          <h5 class="centered" style="color: black;"><?php if(isset($_SESSION['nombre'])){ echo $_SESSION['nombre'];}?></h5>
          <li class="mt">
            <a class="active" href="../index.php">
              <i class="fa fa-dashboard"></i>
              <span>Escritorio</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="usuarios/index.php">
              <i class="fa fa-user"></i>
              <span>Usuarios</span>
              </a>
            <!--<ul class="sub">
              <li><a href="general.html">General</a></li>
              <li><a href="buttons.html">Buttons</a></li>
              <li><a href="panels.html">Panels</a></li>
              <li><a href="font_awesome.html">Font Awesome</a></li>
            </ul>-->
          </li>
          <li class="sub-menu">
            <a href="clientes/index.php">
              <i class="fa fa-group"></i>
              <span>Clientes</span>
              </a>
            <li class="sub-menu">
              <a href="transportes/index.php">
                <i class="fa fa-fighter-jet"></i>
                <span>Transportes</span>
                </a>
            </li>
            <!--<ul class="sub">
              <li><a href="grids.html">Grids</a></li>
              <li><a href="calendar.html">Calendar</a></li>
              <li><a href="gallery.html">Gallery</a></li>
              <li><a href="todo_list.html">Todo List</a></li>
              <li><a href="dropzone.html">Dropzone File Upload</a></li>
              <li><a href="inline_editor.html">Inline Editor</a></li>
              <li><a href="file_upload.html">Multiple File Upload</a></li>
            </ul>-->
          </li>
          <li class="sub-menu">
            <a href="hoteles/index.php">
              <i class="fa fa-building-o"></i>
              <span>Hoteles</span>
              </a>
            <!--<ul class="sub">
              <li><a href="blank.html">Blank Page</a></li>
              <li><a href="login.html">Login</a></li>
              <li><a href="lock_screen.html">Lock Screen</a></li>
              <li><a href="profile.html">Profile</a></li>
              <li><a href="invoice.html">Invoice</a></li>
              <li><a href="pricing_table.html">Pricing Table</a></li>
              <li><a href="faq.html">FAQ</a></li>
              <li><a href="404.html">404 Error</a></li>
              <li><a href="500.html">500 Error</a></li>
            </ul>-->
          </li>
          <li class="sub-menu">
            <a href="destinos/index.php">
              <i class="fa fa-book"></i>
              <span>Destinos</span>
              </a>
            <!--<ul class="sub">
              <li><a href="form_component.html">Form Components</a></li>
              <li><a href="advanced_form_components.html">Advanced Components</a></li>
              <li><a href="form_validation.html">Form Validation</a></li>
              <li><a href="contactform.html">Contact Form</a></li>
            </ul>-->
          </li>
          <li class="sub-menu">
            <a href="viajesGenerales/index.php">
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
            <a href="viajesPersonalizados/index.php">
              <i class="fa fa-folder-open"></i>
              <span>Viajes personalizados</span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li>
          <li>
            <a href="contacto/index.php">
              <i class="fa fa-envelope"></i>
              <span>Contactos</span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li>
          <li>
            <a href="comentarios/index.php">
              <i class="fa fa-comments-o"></i>
              <span>Comentarios</span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="galeria/index.php">
              <i class="fa fa-envelope"></i>
              <span>Galeria Playa</span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li>
         <li class="sub-menu">
            <a href="galeria2/index.php">
              <i class="fa fa-envelope"></i>
              <span>Galeria Pueblos Magicos</span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li>
         <li class="sub-menu">
            <a href="galeria3/index.php">
              <i class="fa fa-envelope"></i>
              <span>Galeria Internacionales</span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li>          
          <li>
            <a href="faqs/index.php">
              <i class="fa fa-question"></i>
              <span>Preguntas frecuentes</span>
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
    <section id="main-content">
      <section class="wrapper">
        <div class="row mt">
          <div class="col-sm-12 main-chart">
            <section>
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-sm-12"> 
                    <img class="img-circle"  style="opacity: 0.2; margin: auto; display: block; width: 100%; height: 100%; max-height: 450px; max-width: 450px; z-index: 1;" src="template/img/jagui_tour.png">
                  </div>
                  <div class="col-sm-12">
                    <h2 style="text-align: center; z-index: 3;">Bienvenido <?php if(isset($_SESSION['nombre'])){ echo $_SESSION['nombre']; }?></h2>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </section>
    </section>
        <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>JAGUI TOUR</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href=""><strong>FASTHARE</strong></a>
        </div>
        <a href="index.php" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="template/lib/jquery/jquery.min.js"></script>

  <script src="template/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="template/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="template/lib/jquery.scrollTo.min.js"></script>
  <script src="template/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="template/lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="template/lib/common-scripts.js"></script>
  <script type="text/javascript" src="template/lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="template/lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="template/lib/sparkline-chart.js"></script>
  <script src="template/lib/zabuto_calendar.js"></script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>