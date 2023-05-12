<?php
//session_start();


//if ($_SESSION) {

//if ($_SESSION['privilegios'] == 1 OR $_SESSION['privilegios'] == 2) {

	include_once '../template/header.php';
	require_once '../class/Galeriai.php';


	$idImagen = (isset($_REQUEST['idImagen'])) ? $_REQUEST['idImagen'] : null;
	$imagen2 = (isset($_REQUEST['imagen2'])) ? $_REQUEST['imagen2'] : null;

if ($idImagen) {

		$galeriai = GaleriaI::buscarPorId($idImagen);
		

	}else{

		$galeriai = new GaleriaI();

	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$idImagen = (isset($_POST['idImagen'])) ? $_POST['idImagen'] : null;
			$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
			$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : null;
			$ubicacion = (isset($_POST['ubicacion'])) ? $_POST['ubicacion'] : null;

		if ($_FILES['ubicacion']['name'] != null){

			if ($_FILES['ubicacion']['type'] == 'image/jpg' || $_FILES['ubicacion']['type'] == 'image/jpeg' || $_FILES['ubicacion']['type'] == 'image/png') {
				
				$rutaServidor = 'uploads';
				$rutaTemporal = $_FILES['ubicacion']['tmp_name'];
				$nombre = $_FILES['ubicacion']['name'];
				$rutaDestino = $rutaServidor.'/'.$nombre;
				move_uploaded_file($rutaTemporal, $rutaDestino);

				
			}

		}else{
			$rutaDestino = $imagen2;
		}
		
		$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
		$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : null;
		$ubicacion = (isset($_POST['ubicacion'])) ? $_POST['ubicacion'] : null;
		$galeriai->setNombre($nombre);
		$galeriai->setDescripcion($descripcion);
		$galeriai->setUbicacion($rutaDestino);

		$galeriai->guardar();



			echo '<script> window.location.href="index.php"; </script>';
	}else{

		

	}
?>

<section id="main-content">
    <section class="wrapper">
     <div class="row mt">
	<div class="col-xs-12">
		<center><h1>Guardar Imagen</h1></center>
		<form method="post" action="guardarGaleriai.php" enctype="multipart/form-data">

			<?php if ($galeriai->getIdImagen()): ?>
				<input type="hidden" name="idImagen" value="<?php echo $galeriai->getIdImagen() ?>"/>
			<?php endif; ?>

			<div class="row" style="margin:10px;">

				<div class="col-xs-6">
					
					<div class="form-group">
					<label for="nombre">Nombre de la imagen</label>
					<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $galeriai->getNombre() ?>">
					</div>

					<div class="form-group">
					<label for="descripcion">Descripcion de la imagen</label>
					<input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $galeriai->getDescripcion() ?>">
					</div>

				</div>
				
				<div class="col-xs-6">

					<div class="form-group">
					<label for="imagen">Imagen</label>
					<br>
					<?php if ($galeriai->getIdImagen() != null) { ?>
						<img src="<?php echo $galeriai->getUbicacion() ?>"height="100" width="100">
					<?php } ?>
					<input type="file" id="imagen" class="form-control" name="ubicacion" value="<?php echo $galeriai->getUbicacion() ?>"/> 
					<input type="hidden" name="imagen2" value="<?php echo $galeriai->getUbicacion() ?>" />
					</div>
					
		      		</div>

	      		</div>

      		</div>
		
			<center><div>
			<input type="submit" value="Guardar" class="btn btn-success" />
			<a href="index.php" class="btn btn-danger">Cancelar</a>
			</div></center>
		</form>
	</div>
</div>
</section>
</section>
<?php 

	include_once '../template/footer.php';

//}

/*}else{
	echo '<script>
			window.location.href="../index.php";
		</script>';
}*/	
	?>