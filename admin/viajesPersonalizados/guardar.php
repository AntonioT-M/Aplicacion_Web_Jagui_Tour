<?php
	require_once '../class/viajesP.php';
	require_once '../class/Clientes.php';
	require_once '../class/transportes.php';
	require_once '../class/Destinos.php';
	include('../template/header.php');

	$idViajeP = (isset($_REQUEST['idViajeP'])) ? $_REQUEST['idViajeP'] : null;
	if($idViajeP){
		$viajeP = viajesP::buscarPorId($idViajeP);
		$cliente = Clientes::buscarPorId($viajeP->getIdCliente());
		$transporte = Transportes::recuperarTodos();
		$destino = Destinos::recuperarTodos();
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$idViajeP = (isset($_POST['idViajeP'])) ? $_POST['idViajeP'] : null;
			$destinoP = (isset($_POST['destinoP'])) ? $_POST['destinoP'] : null;
			$lugarP = (isset($_POST['lugarP'])) ? $_POST['lugarP'] : null;
			$hotelP = (isset($_POST['hotelP'])) ? $_POST['hotelP']: null;
			$transporteP = (isset($_POST['transporteP'])) ? $_POST['transporteP'] : null;
			$adultos = (isset($_POST['adultos'])) ? $_POST['adultos'] : 0;
			$infantes = (isset($_POST['infantes'])) ? $_POST['infantes'] : 0;
			$nombresApVP = (isset($_POST['nombresApVP'])) ? $_POST['nombresApVP'] : null;
			$edadesVP = (isset($_POST['edadesVP'])) ? $_POST['edadesVP'] : null;
			$infoVP = (isset($_POST['infoVP'])) ? $_POST['infoVP'] : null;
			$precioT = (isset($_POST['precioT'])) ? $_POST['precioT'] : null;
			$fechaSP = (isset($_POST['fechaSP'])) ? $_POST['fechaSP'] : null;
			$fechaRP = (isset($_POST['fechaRP'])) ? $_POST['fechaRP'] : null;
			$estado = (isset($_POST['estado'])) ? $_POST['estado'] : null;
			$idCliente = $viajeP->getIdCliente();
			$nombresApVP = $viajeP->getNombresApVP();
			$edadesVP = $viajeP->getEdadesVP();
			$viajesP = new viajesP($destinoP, $lugarP, $fechaSP, $fechaRP, $hotelP, $transporteP, $adultos, $infantes, $nombresApVP, $edadesVP, $infoVP, $precioT, $estado, $idCliente, $idViajeP);
			$viajesP->guardar();
			echo '<script> window.location.href="index.php"; </script>';
	}else{
?>
<script type="text/javascript">$(document).ready(function(){ asignarH();})</script>		
  <section id="main-content">
    <section class="wrapper">
     <div class="row mt">
        <div class="col-sm-12 main-chart">
        	<div class="col-sm-12">
			<h1>Gestion del viaje</h1>
			</div>
		<form method="POST" action="guardar.php" enctype="multipart/form-data">
		<?php if ($viajeP->getIdViajeP()): ?>
			<input type="hidden" name="idViajeP" id="idViajeG" value="<?php echo $viajeP->getIdViajeP() ?>" />
		<?php endif; ?>
			<div class="row">
				<div class="col-sm-12" style="background-color: grey;">
					<img class="img-circle" src="../template/img/jagui_tour.png" width="35" height="35"><b style="color: white; text-shadow: 0px 0px 0px black">JAGUI<span style="color: #44b918; text-shadow: 0px 0px 0px black"> TOUR</span></b>
				</div>
				<div class="col-sm-12" style="margin-top: 40px;">
					<p style="background-color: yellow; opacity: 0.5; text-align: center; color: black;" >Datos del viaje</p>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Destino</label>
					<select class="form-control" name="destinoP" id="seleccionH" onchange="asignarH()" required>
						<option value="">Selecciona</option>
						<?php $seleccionaD = $viajeP->getDestinoP(); if($destino>0){ foreach($destino as $item){?>
						<option value="<?php echo $item['idDestino']?>"<?php if($seleccionaD == $item['idDestino']){ echo "selected";}?>><?php echo $item['destino']?></option>
						<?php }}?>
					</select>
				</div>
				<div class="col-sm-4">
					<label class="control-label">Lugar</label>
					<div id="mostrarLugares"></div>
				</div>
				<!--<div class="form-group col-sm-4">
					<label class="control-label">¿Cuantas estrellas?</label>
					<input class="form-control" type="number" id="numeroEstrellas" name="" max="5" min="1" required disabled>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Lugar</label>
					<select class="form-control">
						<option>Selecciona</option>
					</select>
				</div>-->
				<div class="form-group col-sm-4">
					<label class="control-label">Hospedaje</label>
					<div id="mostrar"></div>
				</div>
				<div class="form-group col-sm-4">
				<label class="control-label">Transporte</label>
				<select name="transporteP" class="form-control" required>
					<?php $seleccionaT = $viajeP->getTransporteP(); if($transporte >0){ foreach($transporte as $item){?>
					<option value="<?php echo $item['nombreT']?>"<?php if($item['nombreT']==$seleccionaT){ echo "selected";}?>><?php echo $item['nombreT']?></option>
					<?php }}?>
				</select>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Fecha de salida</label>
					<input class="form-control" type="date" name="fechaSP" value="<?php echo $viajeP->getFechaSP()?>">
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Fecha de regreso</label>
					<input class="form-control" type="date" name="fechaRP" value="<?php echo $viajeP->getFechaRP()?>">
				</div>
				<div class="col-sm-12">
					<p style="background-color: yellow; opacity: 0.5; text-align: center; color: black;" >Datos del cliente</p>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Nombre</label>
					<input class="form-control" type="text" name="" value="<?php echo $cliente->getNombreC()?>">
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Apellidos</label>
					<input class="form-control" type="text" name="" value="<?php echo $cliente->getApellidosC()?>">
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Edad</label>
					<input class="form-control" type="number" name="" value="<?php echo $cliente->getEdadC()?>">
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Numero de telefono</label>
					<input class="form-control" type="tel" name="telefono" pattern="[0-9]{15}" maxlength="15" value="<?php echo $cliente->getNumTelefono()?>">
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Email</label>
					<input class="form-control" type="email" name="" value="<?php echo $cliente->getEmailC()?>">
				</div>
				<?php if($viajeP->getAdultos() || $viajeP->getInfantes()){?>
				<div class="col-sm-12">
					<p style="background-color: yellow; opacity: 0.5; text-align: center; color: black;" >Informacion de acompañantes</p>
				</div>
				<div class="col-sm-12">
					<?php if($viajeP->getAdultos()){?>

						<div class="col-sm-1">
						<label class="control-label">Adultos</label>
						</div>
						<div class="col-sm-2">
						<input class="form-control" type="number" name="adultos" value="<?php echo $viajeP->getAdultos()?>">
						</div>

					<?php }; if($viajeP->getInfantes()){?>

						<div class="col-sm-1">
						<label class="control-label">Infantes</label>
						</div>
						<div class="col-sm-2">
						<input class="form-control" type="number" name="infantes" value="<?php echo $viajeP->getInfantes()?>">
						</div>

					<?php }; if($viajeP->getAdultos() || $viajeP->getInfantes()){?>

						<div class="col-sm-1">
							<label class="control-label">Total</label>
						</div>
						<div class="col-sm-2">
							<input class="form-control" type="number" name="" value="<?php echo $viajeP->getAdultos() + $viajeP->getInfantes();?>">
						</div>
					<?php }; if($viajeP->getNombresApVP() && $viajeP->getEdadesVP()){?>
					<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
						<thead style="background-color: white;">
							<?php?>
							<tr>
								<td>Nombre</td>
								<td>Edad</td>
							</tr>
						</thead>
						<tbody style="background-color: white;">
					<?php
						$delimiters = array(":",",");
						$replace = str_replace($delimiters, $delimiters[0], $viajeP->getNombresApVP());
						$array = explode($delimiters[0], $replace);
						$arrayI = explode(",", $viajeP->getEdadesVP()); 						
						$visualizar = array_combine($array, $arrayI);
					foreach($visualizar as $person => $edad){ ?>
						<tr>
							<td><?php echo $person ?></td>
							<td><?php echo $edad ?></td>
						</tr>
							<?php }?>
						</tbody>
					</table>
					<?php }?>
				</div>
				<?php }else{?>
				<div class="col-sm-12">
					<p style="background-color: red; opacity: 0.5; text-align: center; color: white;" >No cuenta con acompañantes</p>
				</div>
				<?php }?>
				<div class="col-sm-12">
					<p style="background-color: yellow; opacity: 0.5; text-align: center; color: black;" > Información para el viaje <span style="cursor: help;" title="Este apartado lo llena el administrador" class="fa fa-question-circle"></span></p>
				</div>
				<div class="col-sm-12">
					<textarea class="form-control" placeholder="Aqui va información sobre lo que ocurrira en el viaje" cols="50" rows="5" name="infoVP" required><?php echo $viajeP->getInfoVP(); ?></textarea>
				</div>
				<div class="col-sm-4">
					<label class="control-label">Costo total del viaje</label>
					<input class="form-control" type="number" name="precioT" min="0" value="<?php echo $viajeP->getPrecioT() ?>" required>
				</div>
				<div class="col-sm-4">
					<label class="control-label">Estado del viaje personalizado</label>
					<select name="estado" class="form-control" required>
						<option value="2"<?php if($viajeP->getEstado() == 2){ echo "selected";}?>>En revisión</option>
						<option value="1"<?php if($viajeP->getEstado() == 1){ echo "selected";}?>>Revisado</option>
					</select>
				</div>
				<div class="col-sm-12" style="background-color: grey; margin-bottom: 40px; margin-top: 20px;">
					<p style="background-color: grey; opacity: 1; text-align: center; color: white;" >JAGUI TOUR</p>
				</div>
				<div class="form-group col-sm-12">
					<button class="btn btn-success pull-right">Guardar</button>
					<a href="index.php"><button class="btn btn-danger pull-right">Cancelar</button></a>
				</div>
			</div>
		</form>
	<?php }?>
</div>
</div>
</section>
</section>
<script type="text/javascript">

</script>
<?php
include('../template/footer.php');
?>