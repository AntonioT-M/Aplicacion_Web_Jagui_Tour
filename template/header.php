<?php

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-sacel=1">
 	<title>JAGUI TOUR</title>
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="letras">
    <link rel="stylesheet" type="text/css" href="css/demo.css">
    <link rel="stylesheet" type="text/css" href="template/css/style5.css">
    <link rel="stylesheet" type="text/css" href="template/css/style_common.css">
    <link rel="stylesheet" type="text/css" href="template/css/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="template/css/estiloSlide.css">

 	<script type="text/javascript" src="template/js/scripts.js"></script>
 	<script src="js/js/jquery.js"></script>
 	<script src="js/js/bootstrap.js"></script>
 	<script src="js/scripts.js"></script>
 	<script src="js/jquery.min.js"></script>
 	<script src="js/popper.min.js"></script>
 </head>
 <!--

 -->
 <body style="background-image: url(images/fondo.jpg);">

 
 	<div style="background-color: #FFFFFF" class="container">

    <div class="row">
      <div class="col-xs-12">
        <center><div class="slide-container">
      <input type="radio" id="1" name="image-slide" hidden/>
      <input type="radio" id="2" name="image-slide" hidden/>
      <input type="radio" id="3" name="image-slide" hidden/>
      <div class="slide">
        <div class="item-slide">
          <img src="images/playa1.2.jpg">
        </div>
        <div class="item-slide">
          <img src="images/Presentacion.jpg">
        </div>
        <div class="item-slide">
          <img src="images/Presentacion2.jpg">
        </div>    
      </div>
    </div></center>

    </div>
  </div>

 		

 

 	<!--<div class="row" style="background-color: #03B894">
 			<div class="col-xs-6">
 				<img src="images/auto.jpg" style="width: 50%;">
 			</div>
            <div class="col-xs-6">
                <h1>JAGUI TOUR</h1>           
                 </div>
 		</div>-->
 		
 		<!--<div class ="row">
	<div class="col-xs-12">
		 <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/playa1.2.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/presentacion2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/presentacion.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	</div>
</div>-->



 			<!--nav-->
<header>
<div class="row" >
            <div class="col-xs-12">

                <nav class="navbar" role="navigation" style="background-color: #e3f2fd;">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Desplegar navegación</span>
                            <span class="icon-bar"  style="background-color: #070DB0"></span>
                            <span class="icon-bar" style="background-color: #070DB0"></span>
                            <span class="icon-bar" style="background-color: #070DB0"></span>
                        </button>
                 
                    </div>

                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php"><img src="images/jaguitour_logo2.png" width="50" height="50"> </a>
                            </li>
       
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="Quienes_somos.php" style="font-size: 23px; font-family:'Baking Lion';">¿Quiénes somos?
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="sobre_mi.php"><p style="font-size: 18PX">Sobre Nosotros</p></a></li>
          <li><a href="filosofia.php"><p style="font-size: 18PX">Filosofía</p></a></li>
        </ul>
      </li>
                            <li class="nav-item">
                                <a class="nav-link" href="viajes.php" style="font-size: 23px; font-family:'Baking Lion';">Paquetes</a>
                            </li>
                            <!--<li class="nav-item">
                                <a class="nav-link" href="galeria.php">Galeria</a>
                            </li>-->
                             
       
                             <li class="dropdown">
                               <a class="dropdown-toggle" data-toggle="dropdown" href="galeria.php" style="font-size: 23px; font-family:'Baking Lion';">Galeria
                                <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                            <li><a href="playa.php"><p style="font-size: 18px">Playa</p></a></li>
                            <li><a href="Pueblos.php"><p style="font-size: 18px">Pueblos magicos</p></a></li>
                            <li><a href="internacionales.php"><p style="font-size: 18px">Internacionales</p></a></li>
                            </ul>
                          </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contactanos.php" style="font-size: 23px; font-family:'Baking Lion';'Baking Lion';">Contáctanos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php" style="font-size: 23px; font-family:'Baking Lion';">Inicio de sesión</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="comentarios.php" style="font-size: 23px; font-family:'Baking Lion';">Comentarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="faqs.php" style="font-size: 23px; font-family:'Baking Lion';">FAQs</a>
                            </li>
                        </ul>
                    </div>  
                </nav>
                
            </div>
        </div>

</header>
