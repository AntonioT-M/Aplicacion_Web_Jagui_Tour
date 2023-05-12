<?php
require_once ('../admin/class/ViajesG.php');
require_once ('../admin/class/Destinos.php');
require_once ('../admin/class/Hoteles.php');
$idViajeG = (isset($_REQUEST['id'])) ? $_REQUEST['id']: null;
if($idViajeG){
	$viajeG = viajesG::buscarPorId($idViajeG);
	$destino = destinos::buscarPorId($viajeG->getIdDestino());
	$hotel = hoteles::buscarPorId($viajeG->getIdHotel());
}else{
	echo '<script> buscarV();</script>';
}
?>
<link rel="stylesheet" type="text/css" href="../template/css/style2.css">
<link rel="stylesheet" type="text/css" href="../template/css/bootstrap.min.css">
<html style="width: 100%, height: 100%;">
<div class="container">
<div class="col-sm-12" style="">
	<div class="row">
		<div class="col-sm-12">
		<h2 class="nombreDestino" style="position: relative; top: 200%; z-index: 2;"><?php echo $destino->getLugar() ?></h2>
		</div>
		<div class="col-sm-12" style="">
			<img class="imagenDestino" src="admin/destinos/<?php echo $destino->getUrlDestino()?>" style="">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6 parteUno">
		<div class="row">
		<div class="col-sm-12 tituloss">
			<h3>Informaci&oacute;n</h3>
		</div>
		<div class="col-sm-12 textoInfo">
			<p style=""><?php echo $destino->getInfoD();?></p>
		</div>
		</div>
		</div>
		<div class="col-sm-6 parteDos" style="">
		<div class="row">
		<div class="col-sm-12 titulossFechas">
			<h3>Fechas</h3>
		</div>
		<div class="col-sm-6 titulosDos" style="float: left;">
			<h4>Salida</h4>
		</div>
		<div class="col-sm-6 titulosTres">
			<h4>Regreso</h4>
		</div>
		<div class="col-sm-6 fechaSalida">
			<h5><?php echo date('d-m-Y', strtotime($viajeG->getFechaSG())); ?></h5>
		</div>
		<div class="col-sm-6 fechaRegreso">
			<h5><?php echo date('d-m-Y', strtotime($viajeG->getFechaRG())); ?></h5>
		</div>
		<div class="col-sm-10 titulossPrecio">
			<h3 style="text-align: center;">Precios</h3>
		</div>
		<div class="col-sm-2 titulossCupo">
			<h3 style="text-align: center;">Cupo</h3>
		</div>
		<div class="col-sm-5 precioAdultos">
			<p>Adultos: <span>$<?php echo $viajeG->getPrecioA() ?></span></p>
		</div>
		<div class="col-sm-5 precioInfantes">
			<p>Niños/as: <span>$<?php echo $viajeG->getPrecioN()?> </span></p>
		</div>
		<div class="col-sm-2 cantPersonas">
			<h4><?php echo $viajeG->getNpersonasAdd() ?></h4>
		</div>
		</div>
		</div>
		<div class="col-sm-12 titulossHotel">
			<h3>Hotel</h3>
		</div>
		<div class="col-sm-5 divImgHotel">
			<img class="imgHotel" src="admin/hoteles/<?php echo $hotel->getUrlHotel()?>" style="">
		</div>
		<div class="col-sm-7 textoHotel">
			<h4><?php echo $hotel->getHotel()?></h4>
			<p><?php echo $hotel->getInfoH() ?></p>
		</div>
		<div class="col-sm-12 divBotones">
		<button style="margin-right: 4%;" class="btn btn-danger" onclick="buscarV()">Cancelar</button>
		<button class="btn btn-primary" onclick="obtenerViaje(<?php echo $viajeG->getIdViajeG() ?>)">Adquirir</button>
		</div>
	</div>
</div>
<footer style="background-color: blue; opacity: 0.4;">
	
</footer>
</div>
</html>