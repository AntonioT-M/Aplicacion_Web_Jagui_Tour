<?php
	require_once '../admin/class/viajesG.php';
	require_once '../admin/class/ViajerosG.php';
	require_once '../admin/class/Clientes.php';
	require_once '../admin/class/transportes.php';
	require_once '../admin/class/Destinos.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		/*echo '<pre>';
			print_r($_POST);
		echo '</pre>';*/
		$datosDVG = $_POST['custom'];
		$datos = explode(',', $datosDVG);
		$adultos = $datos[0];
		$infantes = $datos[1];
		$nombresApVG = $datos[2];
		$edadesVG = $datos[3];
		$estadoVG = 1;
		$precioT = $datos[5];
		$idCliente = $datos[6];
		$idViajeG = $datos[7];
			/*$idViajeG = (isset($_POST['idViajeG'])) ? $_POST['idViajeG'] : null;
			//$destinoG = (isset($_POST['destinoG'])) ? $_POST['destinoG'] : null;
			//$lugarP = (isset($_POST['lugarG'])) ? $_POST['lugarG'] : null;
			//$des = Destinos::buscarPorId($destino);
			//$destinoP = $des->getDestino();
			//$hotelG = (isset($_POST['hotelG'])) ? $_POST['hotelG']: null;
			//$transporteP = (isset($_POST['transporteG'])) ? $_POST['transporteG'] : null;
			$adultos = (isset($_POST['adultos'])) ? $_POST['adultos'] : 0;
			$infantes = (isset($_POST['infantes'])) ? $_POST['infantes'] : 0;*/
			$restar = $adultos + $infantes + 1;
			$v = viajesG::buscarPorId($idViajeG);
			$resultado = $v->getNPersonasAdd() - $restar;
			$v->setNPersonasAdd($resultado);
			$v->guardar();
			/*$nombresApVG="n/a";
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
			//$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
			//$apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : null;
			//$email = (isset($_POST['email'])) ? $_POST['email'] : null;
			
			//var_dump($adultos, $infantes, $nombresApVG, $edadesVG, $estadoVG, $precioT ,$idCliente, $idViajeG, $restar, $resultado, $v);*/

			$viajerosG = new viajerosG($adultos, $infantes, $nombresApVG, $edadesVG, $estadoVG, $precioT ,$idCliente, $idViajeG);
			$viajerosG->guardar();
			echo '<script>alert("El viaje ha sido comprado exitosamente"); window.location.href="../viajes.php"; </script>';


/*$html = '
<html>
<head>
<title>Detalle de la compra</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
<style type=\"text/css\">
<!--
.tit {
font-family: Verdana, Arial, Helvetica, sans-serif;
font-size: 9px;
color: #FFFFFF;
}
.prod {
font-family: Verdana, Arial, Helvetica, sans-serif;
font-size: 9px;
color: #333333;
}
h1 {
font-family: Verdana, Arial, Helvetica, sans-serif;
font-size: 20px;
color: #990000;
}
-->
</style>
</head>
<body>
<div class="container">
	<div class="col-sm-12" style="">
		<div class="row">
			<div class="col-sm-12" style="border: 1px solid black; box-shadow: 0px 0px 8px grey;">
			<div class="row">
				<div class="col-sm-12" style="background-color: grey;">
					<img class="img-circle" src="admin/template/img/jagui_tour.png" width="35" height="35"><b style="color: white; text-shadow: 0px 0px 0px black">JAGUI<span style="color: #44b918; text-shadow: 0px 0px 0px black"> TOUR</span></b>
				</div>
				<div class="col-sm-12" style="margin-top: 40px;">
					<p style="background-color: yellow; opacity: 0.5; text-align: center; color: black;" >Datos del viaje</p>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Destino</label>
					<p>'.$destinoP.'</p>
				</div>
				<div class="col-sm-4">
					<label class="control-label">Lugar</label>
					<p>'.$lugarP.'</p>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Hotel</label>
					<p>'.$hotelG.'</p>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Fecha de salida</label>
					<p>'.$fechaSG.'</p>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Fecha de regreso</label>
					<p>'.$fechaRG.'</p>
				</div>
				<div class="col-sm-12">
					<p style="background-color: yellow; opacity: 0.5; text-align: center; color: black;" >Mis datos</p>
				</div>
				<div class="col-sm-12">
					<label class="control-label">Cliente</label>
					<p>Nombre y apellidos:'.$nombre.' '.$apellidos.'</p>
				</div>
				<div class="col-sm-2">
					<p>Precio por la compra<span style="color: green; font-size:150%; ">$'.$precioT.'</span></p>
				</div>
				<div class="col-sm-12" style="background-color: grey; margin-bottom: 40px;">
					<p style="background-color: grey; opacity: 1; text-align: center; color: white;" >JAGUI TOUR</p>
				</div>
				</div>
		</div>
	</div>
</div>
</html>';

$html.='';
$html .='';
//Como queremos enviar el
//mensaje en formato html,
//colocamos las 2 cabeceras
//que nos permitirán hacerlo
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset= iso-8859-1\r\n";
//Las siguientes 2 cabeceras,
//permitirán que el destinatario
//sepa a quién responder y
//quién le ha enviado el
//mensaje
$headers .= "Reply-To: atmimparting1@hotmail.com\r\n";
$headers .= "From: Nombre del Remitente<atmimparting1@hotmail.com>\r\n";
//En este ejemplo suponemos
//que el mail del destinatario
//lo hemos enviado desde un
//formulario con el método post,
//pero es indistinto desde donde
//se lo obtenga (consulta a la
//base de datos, almacenado en
//una variable de sesión,
//enviado por get,etc.)
mail($email,"Detalle de su compra en JAGUI TOUR",$html,$headers);*/

	}else{
		echo "No llego";
	}
?>