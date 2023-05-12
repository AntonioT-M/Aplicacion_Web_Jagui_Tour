<?php
require_once ('../class/GaleriaPU.php');
$galeriaPU = GaleriaPU::recuperarTodos();
?>
<script type="text/javascript">
	function confirmar() {
		var respuesta = confirm("¿Estás seguro de eliminar este elemento?");
		if (respuesta == true) {
			return true;

		}else{
			return false;
		}
		
	}
</script>
					<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
						<thead>
						<?php if(count($galeriaPU) > 0): ?>
						<tr>
							<td>Imagen</td>
							<td>Nombre</td>
							<td>descripcion</td>
							<td></td>
							<td></td>
						</tr>
						</thead>
						<tbody>
						<?php foreach($galeriaPU as $item): ?>
						<tr>
							<td><img src="<?php echo $item['ubicacion']?>" width="100" height="auto"></td>
							<td><?php echo $item['nombre']?></td>
							<td><?php echo $item['descripcion']?></td>
							<td>
								<form action="eliminarGaleriaPU.php" method="POST">
									<input type="hidden" name="idImagen" value="<?php echo $item['idImagen']?>">
									<button class="btn btn-danger" onclick="return confirmar()">Eliminar</button>
								</form>
							</td>
							<td>
								<a href="guardarGaleriaPU.php?idImagen=<?php echo $item['idImagen'] ?>"><button class="btn btn-primary">Actualizar</button></a>
								
							</td>
						</tr>
						<?php endforeach;?>
						</tbody>	
					</table>
			</div>
		</section>
		<?php else:?>
			<div class="col-xs-12"><p class="centered" style="font-size: 17px; border-left: 10px solid red; border-right: 10px solid red;">No hay imagenes agregados</p></div>
		<?php endif;?>
