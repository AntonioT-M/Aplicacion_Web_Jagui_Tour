<?php
	require_once '../class/viajesP.php';
	require_once '../class/ViajerosG.php';
	require_once '../class/Clientes.php';
	include('../template/header.php');

	$idViajeG = (isset($_REQUEST['idViajeG'])) ? $_REQUEST['idViajeG'] : null;
	if($idViajeG){
		$viajeros = ViajerosG::buscarViajeros($idViajeG);
		//$cliente = Clientes::buscarPorId($viajeros->getIdCliente());
	}else{
		//echo '<script> window.location.href="index.php"; </script>';
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			/*$idViajeP = (isset($_POST['idViajeP'])) ? $_POST['idViajeP'] : null;
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
			$idCliente = $viajeros->getIdCliente();
			$nombresApVP = $viajeros->getNombresApVP();
			$edadesVP = $viajeros->getEdadesVP();
			$viajesP = new viajesP($destinoP, $lugarP, $fechaSP, $fechaRP, $hotelP, $transporteP, $adultos, $infantes, $nombresApVP, $edadesVP, $infoVP, $precioT, $estado, $idCliente, $idViajeP);
			$viajesP->guardar();
			echo '<script> window.location.href="index.php"; </script>';*/
	}else{
?>
<script type="text/javascript">$(document).ready(function(){ asignarH();})</script>		
  <section id="main-content" style="background-color: white;">
    <section class="wrapper">
     <div class="row mt">
        <div class="col-sm-12 main-chart">
        	<div class="col-sm-12">
			<h1>Viajeros</h1>
			<a href="index.php"><button class="btn btn-primary">Dejar de gestionar</button></a>
			</div>
			<div id="muestra"></div>
			<?php if (count($viajeros)>0){ foreach($viajeros as $item){?>
		<form method="POST" action="guardar.php" enctype="multipart/form-data">
				<?php //if($viajeros->getAdultosG() || $viajeros->getInfantesG()){?>
				<div class="col-sm-12">
					<p style="background-color: yellow; opacity: 0.5; text-align: center; color: black;" >Datos del cliente</p>
				</div>
				<input type="hidden" id="idViajerosG" name="idViajerosG" value="<?php echo $item['idViajerosG']?>" readOnly>
				<input type="hidden" id="idViajeG" name="idViajeG" value="<?php echo $item['idViajeG']?>" readOnly>
				<input type="hidden" name="idCliente" value="<?php echo $item['idCliente']?>" readOnly>
				<div class="col-sm-4">
					<label class="control-label">Nombre</label>
					<input class="form-control" type="text" name="nombreC" value="<?php echo $item['nombreC']?>" readOnly>
				</div>
				<div class="col-sm-4">
					<label class="control-label">Apellidos</label>
					<input class="form-control" type="text" name="apellidosC" value="<?php echo $item['apellidosC']?>" readOnly>
				</div>
				<div class="col-sm-4">
					<label class="control-label">Edad</label>
					<input class="form-control" type="number" name="edadC" value="<?php echo $item['edadC']?>" readOnly>
				</div>
				<div class="col-sm-12">
					<p style="background-color: yellow; opacity: 0.5; text-align: center; color: black;" >Datos de contacto</p>
				</div>
				<div class="col-sm-4">
					<label class="control-label">Email</label>
					<input class="form-control" type="emailC" name="apellidosC" value="<?php echo $item['emailC']?>" readOnly>
				</div>
				<div class="col-sm-4">
					<label class="control-label">Numero de telefono</label>
					<input class="form-control" type="text" name="numTelefono" value="<?php echo $item['numTelefono']?>" readOnly>
				</div>				
				<div class="col-sm-12">
					<p style="background-color: yellow; opacity: 0.5; text-align: center; color: black;" >Informacion de acompañantes</p>
				</div>
				<div class="col-sm-12">
					<?php if($item['adultosG']>0){?>

						<div class="col-sm-1">
						<label class="control-label">Adultos</label>
						</div>
						<div class="col-sm-2">
						<input class="form-control" type="number" name="adultosG" value="<?php echo $item['adultosG']?>" readOnly>
						</div>

					<?php }; if($item['infantesG']>0){?>

						<div class="col-sm-1">
						<label class="control-label">Infantes</label>
						</div>
						<div class="col-sm-2">
						<input class="form-control" type="number" name="infantesG" value="<?php echo $item['infantesG']?>" readOnly>
						</div>

					<?php }; if($item['adultosG']>0 || $item['infantesG']>0){?>
						<div class="col-sm-1">
							<label class="control-label">Total</label>
						</div>
						<div class="col-sm-2">
							<input class="form-control" type="number" name="" value="<?php echo $item['adultosG'] + $item['infantesG']+1;?>" readOnly>
						</div>
					<?php }else{?>
						<div class="col-sm-1">
							<label class="control-label">Total</label>
						</div>
						<div class="col-sm-2">
							<input class="form-control" type="number" name="" value="<?php echo 1;?>" readOnly>
						</div>					
					<?php }; if($item['nombresApVG'] && $item['edadesVG']){?>
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
						$replace = str_replace($delimiters, $delimiters[0], $item['nombresApVG']);
						$array = explode($delimiters[0], $replace);
						$arrayI = explode(",", $item['edadesVG']); 						
						$visualizar = array_combine($array, $arrayI);
					foreach($visualizar as $person => $edad){?>
						<tr>
							<td><?php echo $person ?></td>
							<td><?php echo $edad ?></td>
						</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
				<?php }else{?>
				<div class="col-sm-12">
					<p style="background-color: red; opacity: 0.5; text-align: center; color: white;" >No cuenta con acompañantes</p>
				</div>
				<?php }?>
				<div class="col-sm-2">
					<h5>Pago total <span style="color: green; font-size:200%; ">$<?php echo $item['pagoTG'] ?></span></h5>
				</div>
				<div class="col-sm-4">
					<label class="control-label">Estado del pago</label>
					<select class="form-control" name="estadoVG" id="estadoVG" required>
						<option value="2"<?php if($item['estadoVG'] == 2){ echo "selected";}?>>En proceso</option>
						<option value="1"<?php if($item['estadoVG'] == 1){ echo "selected";}?>>Pagado</option>	
					</select>
				</div>
			</div>
		</form>
		<div class="form-group col-sm-12" style="margin-top: 5%; display: none;">
					<center>
						<button class="btn btn-success" onclick="actualizarViajeros(<?php echo $item['idViajerosG']?>)">Actualizar</button>
					</center>
				</div>
		<?php }?>
	<?php }?>
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