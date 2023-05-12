<?php
	session_start();
	require_once '../admin/class/ViajesG.php';
	require_once '../admin/class/transportes.php';
	require_once '../admin/class/Hoteles.php';
	require_once '../admin/class/Destinos.php';
	require_once '../admin/class/Clientes.php';

	if(isset($_POST['id'])){
	$idViajeG = (isset($_POST['id'])) ? $_POST['id'] : null; 
	$viajeG = viajesG::buscarPorId($idViajeG);
	$destino = destinos::buscarPorId($viajeG->getIdDestino());
	$hotel = hoteles::buscarPorId($viajeG->getIdHotel());	
	$transporte = Transportes::buscarPorId($viajeG->getIdTransporte());
		if(isset($_SESSION['id'])){
			$cliente = Clientes::buscarPorId($_SESSION['id']);
		}
	}
?>
<link rel="stylesheet" type="text/css" href="../template/css/style2.css">
<link rel="stylesheet" type="text/css" href="../template/css/bootstrap.min.css">
<html lang="es" style="width: 100%; height: 100%;">
<script type="text/javascript">$(document).ready(function(){ sumaRestaD();})</script>
<div class="container">
	<div class="col-sm-12" style="">
		<div class="row">
			<div class="col-sm-12" style="border: 1px solid black; box-shadow: 0px 0px 8px grey;">
			<form class="parteFormulario" id="formViajeG" action="compra.php" method="POST">
			<div class="row">
				<div class="col-sm-12" style="background-color: grey;">
					<img class="img-circle" src="admin/template/img/jagui_tour.png" width="35" height="35"><b style="color: white; text-shadow: 0px 0px 0px black">JAGUI<span style="color: #44b918; text-shadow: 0px 0px 0px black"> TOUR</span></b>
				</div>
				<div class="col-sm-12" style="margin-top: 40px;">
					<p style="background-color: yellow; opacity: 0.5; text-align: center; color: black;" >Datos del viaje</p>
					<input type="hidden" id="idV" name="idViajeG" value="<?php echo $viajeG->getIdViajeG() ?>" >
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Destino</label>
					<select name="destinoG" class="form-control" readOnly required>
						<option value="<?php echo $destino->getDestino()?>"><?php echo $destino->getDestino()?></option>
					</select>
				</div>
				<div class="col-sm-4">
					<label class="control-label">Lugar</label>
					<select class="form-control" name="lugarG" readOnly required>
						<option value="<?php echo $destino->getLugar() ?>"><?php echo $destino->getLugar()?></option>
					</select>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">¿Donde te gustaria hospedarte?</label>
					<select name="hotelG" class="form-control" required readOnly>
						<option value="<?php echo $hotel->getHotel()?>"><?php echo $hotel->getHotel()?></option>
					</select>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Transporte</label>
					<select name="transporteG" class="form-control" required readOnly>
						<option value="<?php echo $transporte->getNombreT()?>"><?php echo $transporte->getNombreT() ?></option>
					</select>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Fecha de salida</label>
					<input class="form-control" type="date" name="fechaSG" value="<?php echo $viajeG->getFechaSG() ?>" readOnly required>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Fecha de regreso</label>
					<input class="form-control" type="date" name="fechaRG" value="<?php echo $viajeG->getFechaRG() ?>" readOnly required>
				</div>
				<div class="col-sm-12">
					<p style="background-color: yellow; opacity: 0.5; text-align: center; color: black;" >Mis datos</p>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Nombre</label>
					<input type="hidden" name="idCliente" value="<?php echo $cliente->getIdCliente()?>">
					<input class="form-control" type="text" name="nombre" value="<?php if(isset($_SESSION['id'])){ echo $cliente->getNombreC(); }?>" <?php if(isset($_SESSION['id'])){ echo "readOnly";}?>>
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Apellidos</label>
					<input class="form-control" type="text" name="apellidos" value="<?php if(isset($_SESSION['id'])){ echo $cliente->getApellidosC(); }?>" <?php if(isset($_SESSION['id'])){ echo "readOnly";}?>>
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
					<input class="form-control" type="email" name="email" value="<?php if(isset($_SESSION['id'])){ echo $cliente->getEmailC(); }?>" <?php //if(isset($_SESSION['id'])){ echo "readOnly";}?>>
				</div>
				<div class="col-sm-12">
					<p style="background-color: yellow; opacity: 0.5; text-align: center; color: black;" >Informacion de acompañantes</p>
				</div>
				<div class="col-sm-4">
					<label class="control-label">¿Cuenta con acompañantes?</label>
					<label>Si <input onchange="traerAsignacion()" id="checkUno" type="radio" name="check" value="si" required></label>
					<label>No <input onchange="traerAsignacion()" id="checkDos" type="radio" name="check" value="no" required></label>
				</div>
				<div class="col-sm-2">
					<p>Precio por adulto <span style="color: green; font-size:150%; ">$<?php echo $viajeG->getPrecioA() ?></span></p>
				</div>
				<div class="col-sm-2">
					<p>Precio por menor <span style="color: green; font-size:150%; ">$<?php echo $viajeG->getPrecioN() ?></span></p>
				</div>
				<div class="col-sm-4">
					<div id="precioTotal"></div>	
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
				<div class="form-group col-sm-12" style="display: none;">
					<button class="btn btn-success pull-right" id="guardar">Guardar</button>
				</div>
			</div>
			</form>
			<div class="form-group col-sm-12">
				<button class="btn btn-danger" onclick="buscarV()">Cancelar</button>
				<button class="btn btn-success" onclick="guardarViajeG()">Listo!</button>
			</div>			
		</div>
		</div>
	</div>
</div>
</html>