<?php
	require_once '../class/Hoteles.php';
	require_once '../class/Destinos.php';
	include('../template/header.php');

	$idHotel = (isset($_REQUEST['idHotel'])) ? $_REQUEST['idHotel'] : null;
	$destino = Destinos::recuperarTodos();
	if($idHotel){
		$hotel = Hoteles::buscarPorId($idHotel);
	}else{
		$hotel = new Hoteles();
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$idHotel = (isset($_POST['idHotel'])) ? $_POST['idHotel'] : null;
			$nombreHotel = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
			$estrellas = (isset($_POST['estrellas'])) ? $_POST['estrellas'] : null;
			$infoH = (isset($_POST['infoH'])) ? $_POST['infoH'] : null;
			$idDestino = (isset($_POST['idDestino'])) ? $_POST['idDestino'] : null;
			if($_FILES['urlHotel']['type'] == 'image/jpeg' || $_FILES['urlHotel']['type'] == 'image/png' || $_FILES['urlHotel']['type'] == 'image/jpg'){
				$rutaServidor = 'uploads';
				$nombreImg = $_FILES['urlHotel']['name'];
				$rutaTmp = $_FILES['urlHotel']['tmp_name'];
				$rutaDestino = $rutaServidor."/".$nombreImg;
				move_uploaded_file($rutaTmp, $rutaDestino);
			if(isset($_REQUEST['idHotel'])){
				$hotel = unlink($hotel->getUrlHotel());
			}
			}else{
				$rutaDestino = $hotel->getUrlHotel();
			}
			$hotel = new Hoteles($idHotel, $rutaDestino, $nombreHotel, $estrellas, $infoH, $idDestino);
			$hotel->guardar();
			echo '<script> window.location.href="index.php"; </script>';
	}else{
?>		
  <section id="main-content">
    <section class="wrapper">
     <div class="row mt">
        <div class="col-sm-12 main-chart">
        	<div class="col-sm-12">
			<h1><?php if(isset($_REQUEST['idHotel'])){ echo 'Editar Hotel';}else{ echo 'Nuevo Hotel';}?></h1>
			</div>
		<form method="POST" action="guardar.php" enctype="multipart/form-data">
		<?php if ($hotel->getIdHotel()): ?>
			<input type="hidden" name="idHotel" value="<?php echo $hotel->getIdHotel() ?>" />
		<?php endif; ?>
		<div class="form-group col-sm-12">
		<label class="control-label col-sm-4">Imagen</label>
            <div class="col-md-12">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-preview thumbnail" style="max-width: 220px; max-height: 220px; line-height: 20px;"><img width="220" height="220" src="<?php echo $hotel->getUrlHotel() ?>" alt="" /><!--<input type="file" name="url" value="<?php //echo $producto->getUrl() ?>">-->
                    </div>
                <div>
                <span class="">
                    <input type="file" name="urlHotel" class="btn btn-primary" value="<?php echo $hotel->getUrlHotel() ?>"/>
                </span>
                </div>
                </div>
            </div>
        </div>
		<div class="form-group col-sm-4">
		<label>Nombre</label>
			<input type="text" name="nombre" class="form-control" pattern="[A-Za-zÁáÉéÍíÓóÚúÑn ]+" id="validar" onchange="validarEspacio()" placeholder="Nombre" value="<?php echo $hotel->getHotel() ?>" required/>
		</div>
		<div class="form-group col-sm-4">
			<label>Estrellas</label>
			<input type="number" name="estrellas" max="5" min="1" class="form-control" value="<?php echo $hotel->getEstrellas() ?>" required/>
		</div>
		<div class="form-group col-sm-4">
			<label>Destino</label>
			<select class="form-control" name="idDestino" required>
				<option value="">Selecciona</option>
				<?php $select = $hotel->getIdDestino(); if($destino >0){ foreach($destino as $item){?>
				<option value="<?php echo $item['idDestino']?>"<?php if($select == $item['idDestino']){ echo "selected";}?>><?php echo $item['destino']?></option>
				<?php }}?>
			</select>
		</div>
		<div class="col-sm-12"><label class="control-label">El hotel permite</label></div>
		<div class="form-group col-sm-12">
		<div class="form-group col-sm-1">
			<label class="control-label">Myr</label>
			<input class="cajas" type="checkbox" name="" id="myr" value="myr" onchange="precioPersonasH();">
		</div>
		<div class="form-group col-sm-1">
			<label class="control-label">Mnr</label>
			<input class="cajas" type="checkbox" name="" id="mnr" value="mnr" onchange="precioPersonasH();">
		</div>
		<div class="form-group col-sm-1">
			<label class="control-label">Inf</label>
			<input class="cajas" type="checkbox" name="" id="inf" value="inf" onchange="precioPersonasH();">
		</div>
		<div class="form-group col-sm-1">
			<label class="control-label">Jnr</label>
			<input class="cajas" type="checkbox" name="" id="jnr" value="jnr" onchange="precioPersonasH();">
		</div>
		</div>
		<div  id="mostrarPrec"></div>
		<div class="form-group col-sm-12">	
		<label>Información</label>
			<textarea name="infoH" cols="50" id="validar" onchange="validarEspacio()" pattern="[A-Za-zÁáÉéÍíÓóÚúÑn ]+" rows="5" class="form-control" required><?php echo $hotel->getInfoH()?></textarea>
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