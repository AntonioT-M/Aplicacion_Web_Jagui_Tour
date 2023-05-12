<?php
require_once ('../class/Hoteles.php');
$hotel = Hoteles::recuperarTodos();
?>

					<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
						<thead>
						<?php if(count($hotel) > 0): ?>
						<tr>
							<td>Imagen</td>
							<td>Nombre</td>
							<td>Estrellas</td>
							<td></td>
							<td></td>
						</tr>
						</thead>
						<tbody>
						<?php foreach($hotel as $item): ?>
						<tr>
							<td><img height="50" width="50" src="<?php echo $item['urlHotel']?>"></td>
							<td><?php echo $item['nombreHotel']?></td>
							<td><?php echo $item['estrellas']?></td>
							<td>
								<form action="javascript: eliminar(<?php echo $item['idHotel']?>);" method="POST">
									<input type="hidden" name="" value="">
									<button class="btn btn-danger">Eliminar</button>
								</form>
							</td>
							<td>
								<form action="guardar.php" method="GET">
									<input type="hidden" name="idHotel" value="<?php echo $item['idHotel']?>">
									<button class="btn btn-primary">Actualizar</button>
								</form>
							</td>
						</tr>
						<?php endforeach;?>
						</tbody>	
					</table>
			</div>
		</section>
		<?php else:?>
			<div class="col-xs-12"><p class="centered" style="font-size: 17px; border-left: 10px solid red; border-right: 10px solid red;">No hay hoteles agregados</p></div>
		<?php endif;?>
