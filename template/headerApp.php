<?php
session_start();
?>
<html lang="es">
<head>
        <!--Header-->

        <!-- Icon css link -->
        <link href="template/css/font-awesome.min.css" rel="stylesheet">
        <link href="template/vendors/line-icon/css/simple-line-icons.css" rel="stylesheet">
        <link href="template/vendors/elegant-icon/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="template/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="template/vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="template/vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="template/vendors/revolution/css/navigation.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="template/vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="template/vendors/bootstrap-selector/css/bootstrap-select.min.css" rel="stylesheet">
        
        <link href="template/css/style.css" rel="stylesheet">
        <link href="template/css/responsive.css" rel="stylesheet">
        <script src="template/js/bootstrap.js"></script>
        <script src="template/js/js/jquery.js"></script>
        <script src="template/js/js/jquery.blockUI.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
                

<link rel="stylesheet" type="text/css" href="template/css/style.css">
<link rel="stylesheet" type="text/css" href="template/css/style2.css">
<link rel="stylesheet" type="text/css" href="template/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="template/css/style-responsive.css">
<link href="template/css/font-awesome.css" rel="stylesheet" />
</head>
<body>
        <div class="container">
        <div class="headerPaquetes">
                <div class="col-sm-12">
                <div class="row">
                <div class="col-sm-1 arribaLogo">
                <a href="" class="logo"><img class="img-circle" src="admin/template/img/jagui_tour.png" width="35" height="35"><b>JAGUI<span> TOUR</span></b></a>
                </div>
                <div class="col-sm-1 tituloSgD"><h2 class="tituloSg">Viajes</h2></div>
                </div>
                <div class="col-sm-12">
                        <div class="row">
                                <div class="col-sm-1 regresarP">
                                        <a href="index.php"><button class="btn btn-warning fa fa-mail-reply">Regresar al sitio</button></a>
                                </div>
                        </div>
                </div>
                <div class="barraAbajo" onclick="ocultar_mostrar_bar()" id="flecha" style=""><i id="flech" class="fa fa-chevron-up fa-2x" style="color: white;"></i></div>
                </div>
        </div>
        <div class="headerBusqueda" id="menu">
                        <div class="col-sm-12">
                                <div class="row">
                                        <div class="col-sm-0">
                                        <label class="control-label">Buscar: </label>
                                        </div>
                                        <div class="col-sm-4">
                                                <input class="form-control" type="search" name="search" id="search" onkeyup="buscarV();">
                                        </div>
                                        <div class="col-sm-0">
                                                <label class="control-label">Salida: </label>
                                        </div>
                                        <div class="col-sm-2">
                                                <input class="form-control" type="date" name="date1" id="date1" onchange="buscarV();">
                                        </div>
                                        <div class="col-sm-0">
                                                <label class="control-label">Llegada: </label>
                                        </div>
                                        <div class="col-sm-2">
                                                <input class="form-control" type="date" name="date2" id="date2" onchange="buscarV();">
                                        </div>
                                        <div class="col-sm-1 btnCrear">
                                                <button onclick="traerFormVP()" class="btn btn-primary">Crear viaje</button>
                                        </div>
                                </div>
                        </div>
                </div>