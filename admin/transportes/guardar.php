<?php
	require_once '../class/Transportes.php';
	include('../template/header.php');

	$idTransporte = (isset($_REQUEST['idTransporte'])) ? $_REQUEST['idTransporte'] : null;
	if($idTransporte){
		$transporte = Transportes::buscarPorId($idTransporte);
	}else{
		$transporte = new Transportes();
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$idTransporte = (isset($_POST['idTransporte'])) ? $_POST['idTransporte'] : null;
			$nombreT = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
			$tipoT = (isset($_POST['tipoT'])) ? $_POST['tipoT'] : null;
			$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : null;
			$transporte = new Transportes($idTransporte, $nombreT, $tipoT, $descripcion);
			$transporte->guardar();
			echo '<script> window.location.href="index.php"; </script>';
	}else{
?>		
  <section id="main-content">
    <section class="wrapper">
     <div class="row mt">
        <div class="col-sm-12 main-chart">
        	<div class="col-sm-12">
			<h1><?php if(isset($_REQUEST['idTransporte'])){ echo 'Editar transporte';}else{ echo 'Nuevo transporte';}?></h1>
			</div>
		<form method="POST" action="guardar.php" enctype="multipart/form-data">
		<?php if ($transporte->getidTransporte()): ?>
			<input type="hidden" name="idTransporte" value="<?php echo $transporte->getidTransporte() ?>" />
		<?php endif; ?>
		<div class="form-group col-sm-4">
		<label>Nombre Transporte</label>
			<input type="text" name="nombre" class="form-control" pattern="[A-Za-zÁáÉéÍíÓóÚúÑn ]+" id="validar" onchange="validarEspacio()" placeholder="Nombre" value="<?php echo $transporte->getNombreT() ?>" required/>
		</div>
		<div class="form-group col-sm-4">
			<label>Tipo Transporte</label>
				<select name="tipoT" class="form-control" required>
					<?php $tipo = $transporte->getTipoT()?>
					<option value="">Selecciona</option>
					<option value="Autobus" <?php if($tipo == 'Autobus'){ echo "Selected";}?>>Autobus</option>
					<option value="Avion" <?php if($tipo == 'Avion'){ echo "Selected";}?>>Avión</option>
					<option value="Combi" <?php if($tipo == 'Combi'){ echo "Selected";}?>>Combi</option>
				</select>
		</div>
		<div class="form-group col-sm-12">	
		<label>Descripción</label>
			<textarea name="descripcion" cols="50" id="validar" onchange="validarEspacio()" pattern="[A-Za-zÁáÉéÍíÓóÚúÑn ]+" rows="5" class="form-control" required><?php echo $transporte->getDescripcionT()?></textarea>
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