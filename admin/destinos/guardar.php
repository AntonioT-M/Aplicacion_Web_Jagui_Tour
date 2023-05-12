<?php
	require_once '../class/Destinos.php';
	include('../template/header.php');

	$idDestino = (isset($_REQUEST['idDestino'])) ? $_REQUEST['idDestino'] : null;
	if($idDestino){
		$destino = Destinos::buscarPorId($idDestino);
	}else{
		$destino = new Destinos();
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$idDestino = (isset($_POST['idDestino'])) ? $_POST['idDestino'] : null;
			$nombreDestino = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
			$lugar = (isset($_POST['lugar'])) ? $_POST['lugar'] : null;
			$infoD = (isset($_POST['infoD'])) ? $_POST['infoD'] : null;
			if($_FILES['urlDestino']['type'] == 'image/jpeg' || $_FILES['urlDestino']['type'] == 'image/png' || $_FILES['urlDestino']['type'] == 'image/jpg'){
				$rutaServidor = 'uploads';
				$nombreImg = $_FILES['urlDestino']['name'];
				$rutaTmp = $_FILES['urlDestino']['tmp_name'];
				$rutaDestino = $rutaServidor."/".$nombreImg;
				move_uploaded_file($rutaTmp, $rutaDestino);
			if(isset($_REQUEST['idDestino'])){
				$destino = unlink($destino->getUrlDestino());
			}
			}else{
				$rutaDestino = $destino->getUrlDestino();
			}
			$destino = new Destinos($idDestino, $rutaDestino, $nombreDestino, $lugar, $infoD);
			$destino->guardar();
			echo '<script> window.location.href="index.php"; </script>';
	}else{
?>		
  <section id="main-content">
    <section class="wrapper">
     <div class="row mt">
        <div class="col-sm-12 main-chart">
        	<div class="col-sm-12">
			<h1><?php if(isset($_REQUEST['idDestino'])){ echo 'Editar Destino';}else{ echo 'Nuevo Destino';}?></h1>
			</div>
		<form method="POST" action="guardar.php" enctype="multipart/form-data">
		<?php if ($destino->getIdDestino()): ?>
			<input type="hidden" name="idDestino" value="<?php echo $destino->getIdDestino() ?>" />
		<?php endif; ?>
		<div class="form-group col-sm-12">
		<label class="control-label col-sm-4">Imagen</label>
            <div class="col-md-12">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-preview thumbnail" style="max-width: 220px; max-height: 220px; line-height: 20px;"><img width="220" height="220" src="<?php echo $destino->getUrlDestino() ?>" alt="" /><!--<input type="file" name="url" value="<?php //echo $producto->getUrl() ?>">-->
                    </div>
                <div>
                <span class="">
                    <input type="file" name="urlDestino" class="btn btn-primary" value="<?php echo $destino->getUrlDestino() ?>"/>
                </span>
                </div>
                </div>
            </div>
        </div>
		<div class="form-group col-sm-4">
		<label class="control-label">Destino</label>
			<input type="text" name="nombre" class="form-control" pattern="[A-Za-zÁáÉéÍíÓóÚúÑn ]+" id="validar" onchange="validarEspacio()" placeholder="Nombre" value="<?php echo $destino->getDestino() ?>" required/>
		</div>
		<div class="form-group col-sm-4">
			<label class="control-label">Lugar</label>
			<input type="text" name="lugar" class="form-control" pattern="[A-Za-zÁáÉéÍíÓóÚúÑn ]+" id="validar" onchange="validarEspacio()" placeholder="Nombre" value="<?php echo $destino->getLugar() ?>" required/>
		</div>
		<div class="form-group col-sm-12">	
		<label class="control-label">Información</label>
			<textarea name="infoD" cols="50" id="validar" onchange="validarEspacio()" pattern="[A-Za-zÁáÉéÍíÓóÚúÑn ]+" rows="5" class="form-control" required><?php echo $destino->getInfoD()?></textarea>
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