<?php
	session_start();
	require_once '../admin/class/transportes.php';
	require_once '../admin/class/Destinos.php';
	require_once '../admin/class/Clientes.php';
	$transporte = Transportes::recuperarTodos();
	$destino = Destinos::recuperarTodos();
	if(isset($_SESSION['id'])){
		$cliente = Clientes::buscarPorId($_SESSION['id']);
	}
?>
<link rel="stylesheet" type="text/css" href="../template/css/style2.css">
<link rel="stylesheet" type="text/css" href="../template/css/bootstrap.min.css">
<html lang="es" style="width: 100%; height: 100%;">
<script type="text/javascript">$(document).ready(function(){ asignarH();})</script>
<div class="container">
	<div class="col-sm-12" style="">
		<div class="row">
			<!--<div class="col-sm-12" style="">
				<h2 class="tituloCrearViaje" style="position: relative; top: 200%; z-index: 2;">Dirigite tu destino</h2>
			</div>
			<div class="col-sm-12">
				<img class="imgDestinos" src="exclusive.jpg">
			</div>-->
			<div class="col-sm-12" style="border: 1px solid black; box-shadow: 0px 0px 8px grey;">
			<form action="lib/procesar_viajeP.php" method="POST" class="parteFormulario" id="formViajeP">
			<div class="row">
				<div class="col-sm-12" style="background-color: grey;">
					<img class="img-circle" src="admin/template/img/jagui_tour.png" width="35" height="35"><b style="color: white; text-shadow: 0px 0px 0px black">JAGUI<span style="color: #44b918; text-shadow: 0px 0px 0px black"> TOUR</span></b>
				</div>
				<div class="col-sm-12" style="margin-top: 40px;">
					<p style="background-color: yellow; opacity: 0.5; text-align: center; color: black;" >Datos del viaje</p>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">¿A donde te gustaria viajar?</label>
					<select name="destinoP" id="seleccionH" onchange="asignarH();" class="form-control" required>
						<option value="">Selecciona</option>
						<?php if($destino >0){ foreach($destino as $item){ ?>
						<option value="<?php echo $item['idDestino']?>"><?php echo $item['destino']?></option>
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
					<label class="control-label">¿Donde te gustaria hospedarte?</label>
					<div id="mostrar"></div>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Transporte</label>
					<select class="form-control" name="transporteP">
						<option>Selecciona</option>
						<?php if($transporte >0){ foreach($transporte as $item){?>
						<option value="<?php echo $item['nombreT']?>"><?php echo $item['nombreT']?></option>
						<?php }}?>
					</select>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Fecha de salida</label>
					<input class="form-control" type="date" name="fechaSP">
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Fecha de regreso</label>
					<input class="form-control" type="date" name="fechaRP">
				</div>
				<div class="col-sm-12">
					<p style="background-color: yellow; opacity: 0.5; text-align: center; color: black;" >Mis datos</p>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Nombre</label>
					<input type="hidden" name="idCliente" value="<?php echo $cliente->getIdCliente()?>">
					<input class="form-control" type="text" name="" value="<?php if(isset($_SESSION['id'])){ echo $cliente->getNombreC(); }?>" <?php if(isset($_SESSION['id'])){ echo "readOnly";}?>>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Apellidos</label>
					<input class="form-control" type="text" name="" value="<?php if(isset($_SESSION['id'])){ echo $cliente->getApellidosC(); }?>" <?php if(isset($_SESSION['id'])){ echo "readOnly";}?>>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Edad</label>
					<input class="form-control" type="number" name="" value="<?php if(isset($_SESSION['id'])){ echo $cliente->getEdadC(); }?>" <?php if(isset($_SESSION['id'])){ echo "readOnly";}?>>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Numero de telefono</label>
					<input class="form-control" type="tel" name="telefono" pattern="[0-9]{15}" maxlength="15" value="<?php if(isset($_SESSION['id'])){ echo $cliente->getNumTelefono(); }?>" <?php //if(isset($_SESSION['id'])){ echo "readOnly";;}?>>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Email</label>
					<input class="form-control" type="email" name="" value="<?php if(isset($_SESSION['id'])){ echo $cliente->getEmailC(); }?>" <?php //if(isset($_SESSION['id'])){ echo "readOnly";}?>>
				</div>
				<div class="col-sm-12">
					<p style="background-color: yellow; opacity: 0.5; text-align: center; color: black;" >Informacion de acompañantes</p>
				</div>
				<div class="col-sm-12">
					<label class="control-label">¿Cuenta con acompañantes?</label>
					<label>Si <input onchange="traerAsignacion()" id="checkUno" type="radio" name="check" value="si" required></label>
					<label>No <input onchange="traerAsignacion()" id="checkDos" type="radio" name="check" value="no" required></label>
				</div>
				<div class="col-sm-12">
				<div class="row" id="showInputs"></div>
				</div>
				<div class="col-sm-12">
				<div  class="row" id="masPersonas"></div>
				</div>
				<div class="col-sm-12" style="background-color: grey; margin-bottom: 40px;">
					<p style="background-color: grey; opacity: 1; text-align: center; color: white;" >JAGUI TOUR</p>
				</div>
				<div class="form-group col-sm-12" style="display: none;"><button id="guardar"></button></div>
			</div>
			</form>
			<div class="form-group col-sm-12">
				<button class="btn btn-danger" onclick="buscarV()">Cancelar</button>
				<button class="btn btn-success" onclick="guardarViajeP()">Listo!</button>
			</div>			
		</div>
		</div>
	</div>
</div>
</html>