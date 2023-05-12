<?php
require_once ('../class/ViajesP.php');
$viajeP = ViajesP::recuperarTodos();
?>

					<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
						<thead>
						<?php if(count($viajeP) > 0): ?>
						<tr>
							<td>Destino</td>
							<td>Lugar</td>
							<td>Salida</td>
							<td>Regreso</td>
							<td>Cliente</td>
							<td>Estado</td>
							<td></td>
							<td></td>							
						</tr>
						</thead>
						<tbody>
						<?php foreach($viajeP as $item): ?>
						<tr>
							<td><?php echo $item['destino']?></td>
							<td><?php echo $item['lugarP']?></td>
							<td><?php echo date('d-m-Y', strtotime($item['fechaSP']))?></td>
							<td><?php echo date('d-m-Y', strtotime($item['fechaRP']))?></td>
							<td><?php echo $item['nombreC']." ".$item['apellidosC']?></td>
							<td><?php if($item['estado'] == 2){ echo "En revisión"; }else{ echo "Revisado";} ?></td>										
							<td>
								<form action="javascript: eliminarV(<?php echo $item['idViajeP']?>);" method="POST">
									<input type="hidden" name="" value="">
									<button class="btn btn-danger">Eliminar</button>
								</form>
							</td>
							<td>
								<form action="guardar.php" method="GET">
									<input type="hidden" name="idViajeP" value="<?php echo $item['idViajeP']?>">
									<button class="btn btn-primary">Gestionar</button>
								</form>
							</td>
						</tr>
						<?php endforeach;?>
						</tbody>	
					</table>
			</div>
		</section>
		<?php else:?>
			<div class="col-xs-12"><p class="centered" style="font-size: 17px; border-left: 10px solid red; border-right: 10px solid red;">No hay viajes personalizados</p></div>
		<?php endif;?>