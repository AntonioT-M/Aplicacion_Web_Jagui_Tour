<?php
require_once ('../class/Destinos.php');
$destino = Destinos::recuperarTodos();
?>

					<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
						<thead>
						<?php if(count($destino) > 0): ?>
						<tr>
							<td>Imagen</td>
							<td>Destino</td>
							<td>Lugar</td>
							<td></td>
							<td></td>
						</tr>
						</thead>
						<tbody>
						<?php foreach($destino as $item): ?>
						<tr>
							<td><img height="50" width="50" src="<?php echo $item['urlDestino']?>"></td>
							<td><?php echo $item['destino']?></td>
							<td><?php echo $item['lugar']?></td>
							<td>
								<form action="javascript: eliminar(<?php echo $item['idDestino']?>);" method="POST">
									<input type="hidden" name="" value="">
									<button class="btn btn-danger">Eliminar</button>
								</form>
							</td>
							<td>
								<form action="guardar.php" method="GET">
									<input type="hidden" name="idDestino" value="<?php echo $item['idDestino']?>">
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
			<div class="col-xs-12"><p class="centered" style="font-size: 17px; border-left: 10px solid red; border-right: 10px solid red;">No hay destinos agregados</p></div>
		<?php endif;?>