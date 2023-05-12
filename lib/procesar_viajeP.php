<?php
	require_once '../admin/class/viajesP.php';
	require_once '../admin/class/Clientes.php';
	require_once '../admin/class/transportes.php';
	require_once '../admin/class/Destinos.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			//$idViajeP = (isset($_POST['idViajeP'])) ? $_POST['idViajeP'] : null;
			$destinoP = (isset($_POST['destinoP'])) ? $_POST['destinoP'] : null;
			$lugarP = (isset($_POST['lugarP'])) ? $_POST['lugarP'] : null;
			/*$des = Destinos::buscarPorId($destino);
			$destinoP = $des->getDestino();*/
			$hotelP = (isset($_POST['hotelP'])) ? $_POST['hotelP']: null;
			$transporteP = (isset($_POST['transporteP'])) ? $_POST['transporteP'] : null;
			$adultos = (isset($_POST['adultos'])) ? $_POST['adultos'] : 0;
			$infantes = (isset($_POST['infantes'])) ? $_POST['infantes'] : 0;
			$nombresApVP="n/a";
			$edadesVP="n/a";
			if(isset($_POST['nombres']) && isset($_POST['apellidos'])  && isset($_POST['edadesVP'])){
			$nombres=(isset($_POST['nombres'])) ? $_POST['nombres'] : null;
			$apellidos=(isset($_POST['apellidos'])) ? $_POST['apellidos'] : null;
			$edades = (isset($_POST['edadesVP'])) ? $_POST['edadesVP'] : null;
			$edadesVP = implode(",", $edades);
			$nombresP = implode(",", $nombres);
			$apellidosP = implode(",", $apellidos);
			$nombresApellidos = array_combine($nombres, $apellidos);
			$nombresApVP="";
			foreach ($nombresApellidos as $key => $value) {
				$nombresApVP.= $key." ".$value.",";
			}
			$nombresApVP = trim($nombresApVP,",");
			}
			$infoVP = (isset($_POST['infoVP'])) ? $_POST['infoVP'] : "n/a";
			$precioT = (isset($_POST['precioT'])) ? $_POST['precioT'] : 0;
			$fechaSP = (isset($_POST['fechaSP'])) ? $_POST['fechaSP'] : null;
			$fechaRP = (isset($_POST['fechaRP'])) ? $_POST['fechaRP'] : null;
			$estado = (isset($_POST['estado'])) ? $_POST['estado'] : 2;
			$idCliente = (isset($_POST['idCliente'])) ? $_POST['idCliente'] : null;
			$viajesP = new viajesP($destinoP, $lugarP, $fechaSP, $fechaRP, $hotelP, $transporteP, $adultos, $infantes, $nombresApVP, $edadesVP, $infoVP, $precioT, $estado, $idCliente);
			$viajesP->guardar();
			echo '<script> alert("El viaje se creo con exito, por favor verifique en su panel el estatus del viaje"); window.location.href="../viajes.php"; </script>';
	}else{
		echo "No llego";
	}
?>