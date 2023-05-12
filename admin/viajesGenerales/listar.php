<?php
require_once ('../class/ViajesG.php');
$viajeG = ViajesG::recuperarTodos();
?>

					<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
						<thead>
						<?php if(count($viajeG) > 0): ?>
						<tr>
							<td>Destino</td>
							<td>Lugar</td>
							<td>Transporte</td>
							<td>Espacio</td>
							<td>Salida</td>
							<td>Regreso</td>
							<td></td>
							<td></td>
							<td></td>							
						</tr>
						</thead>
						<tbody>
						<?php foreach($viajeG as $item): ?>
						<tr>
							<td><img height="50" width="50" src="../destinos/<?php echo $item['urlDestino']?>"></td>
							<td><?php echo $item['lugarG']?></td>
							<td><?php echo $item['nombreT']?></td>
							<td><?php echo $item['nPersonasAdd']?></td>
							<td><?php echo date('d-m-Y', strtotime($item['fechaSG']))?></td>
							<td><?php echo date('d-m-Y', strtotime($item['fechaRG']))?></td>														
							<td>
								<form action="javascript: eliminarV(<?php echo $item['idViajeG']?>);" method="POST">
									<input type="hidden" name="" value="">
									<button class="btn btn-danger">Eliminar</button>
								</form>
							</td>
							<td>
								<form action="guardar.php" method="GET">
									<input type="hidden" name="idViajeG" value="<?php echo $item['idViajeG']?>">
									<button class="btn btn-primary">Actualizar</button>
								</form>
							</td>
							<td>
								<form action="viajeros.php" method="GET">
									<input type="hidden" name="idViajeG" value="<?php echo $item['idViajeG']?>">
									<button class="btn btn-primary">Viajeros</button>
								</form>
							</td>
						</tr>
						<?php endforeach;?>
						</tbody>	
					</table>
			</div>
		</section>
		<?php else:?>
			<div class="col-xs-12"><p class="centered" style="font-size: 17px; border-left: 10px solid red; border-right: 10px solid red;">No hay viajes grupales agregados</p></div>
		<?php endif;?>