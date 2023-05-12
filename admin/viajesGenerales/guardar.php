<?php
	require_once '../class/viajesG.php';
	require_once '../class/transportes.php';
	require_once '../class/Destinos.php';
	include('../template/header.php');

	$idViajeG = (isset($_REQUEST['idViajeG'])) ? $_REQUEST['idViajeG'] : null;
	$transporte = Transportes::recuperarTodos();
	$destino = Destinos::recuperarTodos();
	if($idViajeG){
		$viajeG = viajesG::buscarPorId($idViajeG);
	}else{
		$viajeG = new viajesG();
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$idViajeG = (isset($_POST['idViajeG'])) ? $_POST['idViajeG'] : null;
			$idDestino = (isset($_POST['idDestino'])) ? $_POST['idDestino'] : null;
			$lugarG = (isset($_POST['lugarG'])) ? $_POST['lugarG'] : null;
			$idHotel = (isset($_POST['hotel'])) ? $_POST['hotel']: null;
			$idTransporte = (isset($_POST['idTransporte'])) ? $_POST['idTransporte'] : null;
			$nPersonas = (isset($_POST['nPersonasAdd'])) ? $_POST['nPersonasAdd'] : null;
			$precioA = (isset($_POST['precioA'])) ? $_POST['precioA'] : null;
			$precioN = (isset($_POST['precioN'])) ? $_POST['precioN'] : null;
			$infoVG = (isset($_POST['infoVG'])) ? $_POST['infoVG'] : null;
			$fechaSG = (isset($_POST['fechaSG'])) ? $_POST['fechaSG'] : null;
			$fechaRG = (isset($_POST['fechaRG'])) ? $_POST['fechaRG'] : null;
			$viajesG = new viajesG($idViajeG, $idDestino, $lugarG, $idHotel, $idTransporte, $nPersonas, $precioA, $precioN, $infoVG, $fechaSG, $fechaRG);
			//var_dump($viajesG);
			$viajesG->guardar();
			echo '<script> window.location.href="index.php"; </script>';
	}else{
?>
<script type="text/javascript">$(document).ready(function(){ asignarH();})</script>		
  <section id="main-content">
    <section class="wrapper">
     <div class="row mt">
        <div class="col-sm-12 main-chart">
        	<div class="col-sm-12">
			<h1><?php if(isset($_REQUEST['idViajeG'])){ echo 'Editar Viaje Grupal';}else{ echo 'Nuevo Viaje Grupal';}?></h1>
			</div>
		<form method="POST" action="guardar.php" enctype="multipart/form-data">
		<?php if ($viajeG->getIdViajeG()): ?>
			<input type="hidden" name="idViajeG" id="idViajeG" value="<?php echo $viajeG->getIdViajeG() ?>" />
		<?php endif; ?>
		<div class="form-group col-sm-4">
		<label class="control-label">Destino</label>
			<select name="idDestino" id="seleccionH" onchange="asignarH();" class="form-control" required>
				<option value="">Selecciona</option>
				<?php $selectD = $viajeG->getIdDestino(); if($destino >0){ foreach($destino as $item){ ?>
				<option value="<?php echo $item['idDestino']?>"<?php if($selectD == $item['idDestino']){ echo "selected";}?>><?php echo $item['destino']?></option>
				<?php }}?>
			</select>
		</div>
		<div class="col-sm-4">
			<label class="control-label">Lugar</label>
			<div id="mostrarLugares"></div>
		</div>
		<div class="form-group col-sm-4">
			<label class="control-label">Hotel</label>
			<div id="mostrar"></div>
		</div>
		<div class="form-group col-sm-4">
			<label class="control-label">Transporte</label>
			<select name="idTransporte" class="form-control" required>
				<option value="">Selecciona</option>
				<?php $selectT = $viajeG->getIdTransporte(); if($transporte >0){ foreach($transporte as $item){?>
				<option value="<?php echo $item['idTransporte']?>"<?php if($selectT == $item['idTransporte']){ echo "selected";}?>><?php echo $item['nombreT']?></option>
				<?php }}?>
			</select>
		</div>
		<div class="form-group col-sm-4">
			<label class="control-label">Fecha Salida</label>
			<input class="form-control" type="date" name="fechaSG" value="<?php echo $viajeG->getFechaSG()?>" required>
		</div>
		<div class="form-group col-sm-4">
			<label class="control-label">Fecha Regreso</label>
			<input class="form-control" type="date" name="fechaRG" value="<?php echo $viajeG->getFechaRG()?>" required>
		</div>
		<div class="form-group col-sm-4">
			<label class="control-label">Cantidad de personas</label>
				<input class="form-control" type="number" name="nPersonasAdd" min="1" value="<?php echo $viajeG->getNPersonasAdd()?>" required>
		</div>
		<div class="form-group col-sm-4">
			<label class="control-label">Precio Adultos</label>
			<input class="form-control" type="text" name="precioA" pattern="[0-9]+" value="<?php echo $viajeG->getPrecioA()?>" required>
		</div>
		<div class="form-group col-sm-4">
			<label class="control-label">Precio infantes</label>
			<input class="form-control" type="text" name="precioN" pattern="[0-9]+" value="<?php echo $viajeG->getPrecioN()?>" required>
		</div>		
		<div class="form-group col-sm-12">	
		<label class="control-label">Información</label>
			<textarea name="infoVG" cols="50" id="validar" onchange="validarEspacio()" pattern="[A-Za-zÁáÉéÍíÓóÚúÑn ]+" rows="5" class="form-control" required><?php echo $viajeG->getInfoVG()?></textarea>
		</div>
		<div class="form-group col-sm-12">
		<button class="btn btn-success pull-right">Guardar</button>
		<a href="index.php"><button class="btn btn-danger pull-right">Cancelar</button></a>
		</div>
	</form>	
	<?php }?>
</div>
</div>
</section>
</section>
<?php
include('../template/footer.php');
?>