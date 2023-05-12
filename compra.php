<?php
	require_once 'admin/class/viajesG.php';
	require_once 'admin/class/ViajerosG.php';
	require_once 'admin/class/Clientes.php';
	require_once 'admin/class/transportes.php';
	require_once 'admin/class/Destinos.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$idViajeG = (isset($_POST['idViajeG'])) ? $_POST['idViajeG'] : null;
			$viajeG = ViajesG::buscarPorId($idViajeG);
			$viaje = Destinos::buscarPorId($viajeG->getIdDestino());
			//$destinoG = (isset($_POST['destinoG'])) ? $_POST['destinoG'] : null;
			//$lugarP = (isset($_POST['lugarG'])) ? $_POST['lugarG'] : null;
			//$des = Destinos::buscarPorId($destino);
			//$destinoP = $des->getDestino();
			//$hotelG = (isset($_POST['hotelG'])) ? $_POST['hotelG']: null;
			//$transporteP = (isset($_POST['transporteG'])) ? $_POST['transporteG'] : null;
			$adultos = (isset($_POST['adultos'])) ? $_POST['adultos'] : 0;
			$infantes = (isset($_POST['infantes'])) ? $_POST['infantes'] : 0;
			$cantPersonas = $adultos + $infantes + 1;
			$v = viajesG::buscarPorId($idViajeG);
			//$resultado = $v->getNPersonasAdd() - $restar;
			//$v->setNPersonasAdd($resultado);
			//$v->guardar();
			$nombresApVG="n/a";
			$edadesVG="n/a";
			if(isset($_POST['nombres']) && isset($_POST['apellidos'])  && isset($_POST['edadesVP'])){
			$nombres=(isset($_POST['nombres'])) ? $_POST['nombres'] : null;
			$apellidos=(isset($_POST['apellidos'])) ? $_POST['apellidos'] : null;
			$edades = (isset($_POST['edadesVP'])) ? $_POST['edadesVP'] : null;
			$edadesVG = implode(",", $edades);
			$nombresP = implode(",", $nombres);
			$apellidosP = implode(",", $apellidos);
			$nombresApellidos = array_combine($nombres, $apellidos);
			$nombresApVG="";
			foreach ($nombresApellidos as $key => $value) {
				$nombresApVG.= $key." ".$value.",";
			}
			$nombresApVG = trim($nombresApVG,",");
			}
			//$infoVP = (isset($_POST['infoVP'])) ? $_POST['infoVP'] : "n/a";
			$precioT = (isset($_POST['precioT'])) ? $_POST['precioT'] : null;
			$fechaSG = (isset($_POST['fechaSG'])) ? $_POST['fechaSG'] : null;
			$fechaRG = (isset($_POST['fechaRG'])) ? $_POST['fechaRG'] : null;
			$estadoVG = (isset($_POST['estado'])) ? $_POST['estado'] : 2;
			$idCliente = (isset($_POST['idCliente'])) ? $_POST['idCliente'] : null;
			$cliente = Clientes::buscarPorId($idCliente);
			$datosDVG = array('adultos'=>$adultos, 'infantes'=>$infantes, 'nombresApVG'=>$nombresApVG, 'edadesVG'=>$edadesVG, 'estadoVG'=>$edadesVG, 'precioT'=>$precioT, 'idCliente'=>$idCliente, 'idViajeG'=>$idViajeG);
		}

?>

<!DOCTYPE html>
<html lang="es-MX">

	<head>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="template/js/scripts.js"></script>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">

		<title>JAGUI TOUR</title>

	</head>	

	<body style="background-image: url(cielo.png); background-position: center center; background-attachment: fixed;">
	<div class="container">	
		<div class="shadow p-3 mb-5 bg-white rounded" class="jumbotron ">	
				<div class="container" style="color: #00ACEE" >
				    <h1 class="display-4">Resumen de viaje</h1>
				    <p class="lead">Estos son los detalles del viaje a contratar</p>
				</div>
		</div>
		<div class="container transparent">
			<center>
			<div class="shadow p-3 mb-5 bg-transparent rounded">
			<br>	
				<div class="row">
					<div class="col-sm-2"></div>
			 		 <div class="col-sm-2" >
				    	<div class="alert alert-success" >
				    		<h5>Nombre:</h5>
				    	</div>
				    </div>
				    <div class="col-sm-5">
				     	<div class="alert alert-warning">
				    		<h5><?php echo $cliente->getNombreC()." ".$cliente->getApellidosC(); ?></h5>
				    	</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2"></div>
				    <div class="col-sm-2" >
				    	<div class="alert alert-success">
				    		<h5>Destino:</h5>
				    	</div>
				    </div>
				    <div class="col-sm-5">
				     	<div class="alert alert-warning">
				    		<h5><?php echo $viaje->getLugar(); ?></h5>
				    	</div>
					</div>
			  	</div>
				<div class="row">
					<div class="col-sm-2"></div>
				    <div class="col-sm-2" >
				    	<div class="alert alert-success">
				    		<h5>Fecha de salida:</h5>
				    	</div>
				    </div>
				    <div class="col-sm-5">
				     	<div class="alert alert-warning">
				    		<h5><?php echo $fechaSG; ?></h5>
				    	</div>
					</div>
			  	</div>
				<div class="row">
					<div class="col-sm-2"></div>
				    <div class="col-sm-2" >
				    	<div class="alert alert-success">
				    		<h5>Fecha de llegada:</h5>
				    	</div>
				    </div>
				    <div class="col-sm-5">
				     	<div class="alert alert-warning">
				    		<h5><?php echo $fechaRG; ?></h5>
				    	</div>
					</div>
			  	</div>			  				  	
			  	<hr>
			  	<div class="row">
			  		<div class="col-sm-2"></div>
				    <div class="col-sm-4" >
				    	<div class="alert alert-success">
				    		<h5>Cantidad de personas:</h5>
				    	</div>
				    </div>
				    <div class="col-sm-2">
				     	<div class="alert alert-warning">
				    		<h5><?php echo $cantPersonas ?></h5>
				    	</div>
					</div>
			  	</div>
			  	<div class="row">
			  		<div class="col-sm-2"></div>
				    <div class="col-sm-4" >
				    	<div class="alert alert-success">
				    		<h5>Metodo de pago:</h5>
				    	</div>
				    </div>
				<div class="col-sm-2">
			<form action="https:/www.sandbox.paypal.com/cgi-bin/webscr" method="POST">
			<legend class="prod"><input type="image" src="https://www.paypalobjects.com/webstatic/es_MX/mktg/logos-buttons/redesign/btn_13.png" alt="PayPal Credit" width="140" height="50"></legend>
			<input type="hidden" name="shipping" value="<?php echo $precioT;?>">
			<input type="hidden" name="cbt" value="Presione aquí para volver a www.JAGUITOUR.com >">
			<input type="hidden" name="cmd" value="_xclick">
			<input type="hidden" name="rm" value="2">
			<input type="hidden" name="bn" value="JAGUI TOUR">
			<input type="hidden" name="business" value="sb-ijds952650@business.example.com">
			<input type="hidden" name="item_name" value="<?php echo $viaje->getLugar(); ?>">
			<input type="hidden" name="item_number" value="<?php echo $viaje->getLugar(); ?>">
			<input type="hidden" name="amount" value="<?php echo $precioT; ?>">
			<input type="hidden" name="custom" value="<?php echo $adultos.','.$infantes.','.$nombresApVG.','.$edadesVG.','.$edadesVG.','.$precioT.','. $idCliente.','.$idViajeG ?>">
			<input type="hidden" name="currency_code" value="MXN">
			<input type="hidden" name="image_url" value="admin/template/jagui_tour.png">
			<input type="hidden" name="return" value="http://localhost/jagui_tour/lib/procesar_viajeG_correo.php">
			<input type="hidden" name="cancel_return" value="http://localhost/jagui_tour/viajes.php">
			<input type="hidden" name="no_shipping" value="0">
			<input type="hidden" name="no_note" value="0">
				<div style="display: none;">
					<button class="btn btn-success pull-right" id="comprar">Guardar</button>
				</div>
			</form>
					</div>
					<div class="col-sm-1" ></div>
					<div class="col-sm-2">
				     	<div class="alert alert-warning">
				    		<h5>Total: <span style="color: green; font-size: 150%;">$<?php echo $precioT; ?></span></h5>
				    	</div>
					</div>
			  	</div>
			 </div> 	
			</center>  		
	</div>	
	<div style="background-color: rgba(45,76,55,0.5);" >
		<br>
			<div class="row"> <!--incio de la fila (pie)-->
				<div class="col-sm-12">
						<center>
							<p class="text2"> 
							    "Todos los derechos reservados"
								<br>
							     2019 </p>
						</center>
				</div>
			</div><!--Fin del pie-->	
		 <!--Fin del contenedor-->
	</div>
	</div>
	</body>
</html>

<!-- Nombre del destino
		nombre de la persona
			Precio total
				Cantidad de personas 
					Metodo de pago PAYPAL -->