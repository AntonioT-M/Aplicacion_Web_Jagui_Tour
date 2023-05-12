<?php 


include_once '../template/header.php';
require_once '../class/GaleriaI.php';

$galeriaI = Galeriai::recuperarTodos();
?>
<section id="main-content">
	<section class="wrapper">
		<div class="row mt">
			<div class="col-xs-12 main-chart">
				<div class="border-head">
					<h3>Galeria</h3>
				</div>
				<section>
					<form action="guardarGaleriai.php">
						<button class="btn btn-success">Nueva imagen de galeria Internacionales</button>
					</form>
					<div class="content-panel table table-responsive">
						<div class="form-group col-xs-12">
						<form class="form-horizontal" action="" method="POST" name="search_form" id="search_form">
							<div class="form-group col-xs-12">
							<label class="control-label col-xs-1" for="search">Buscar: </label>
							<div class="col-xs-10">
							<input class="form-control" size="50" type="search" name="search" id="search" placeholder="Ingrese su busqueda" onkeyup="buscar();">
							</div>
							</div>
						</form>
						</div>
					</div>
						<?php include_once 'listar.php'; ?>
					</div>
				</div>
	</section>
</section>


<!--<?php
//if (count($galeriaP) > 0): 
?>
<div style="overflow-x:auto; margin: 10px;">
	<table class="table table-bordered">
		
		<tr>
			<td>Nombre de Imagen</td>
			<td>Imagen</td>
			<td> </td>
			<td> </td>
		</tr>

		<?php  
//		foreach ($galeriaP as $item):
		?>
		<tr>
			<td> <?php //echo $item['nombre']; ?> </td>
			<td> <img src="<?php //echo $item['imagen'];?>" width="200" height="auto" ></td>
			<td> <a href="guardarGaleria.php?idImagen=<?php// echo $item['idImagen'] ?>"><button class="btn btn-warning">Actualizar</button></a> </td>
			<td> <form action="eliminarGaleria.php" method="POST">
                <input type="hidden" name="idImagen" value="<?php //echo $item['idImagen']?>">
                    <button class="btn btn-danger" data-toggle="confirmation" data-placement="left">Eliminar</button>
                  </form></td>
			</tr>
			<?php //endforeach;  ?>

		</table>
	</div>


	<?php //else: ?>
		<p> No hay imágenes registrados </p>
	<?php// endif; 

	//include_once '../template/footer.php';

//}

//}else{
//	echo '<script>
//			window.location.href="../index.php";
//		</script>';
//}	
	?>-->

<?php
include('../template/footer.php');
?>