<?php
require_once ('../class/Transportes.php');
$transporte = Transportes::recuperarTodos();
?>

					<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
						<thead>
						<?php if(count($transporte) > 0): ?>
						<tr>
							<td>Nombre</td>
							<td>Tipo</td>
							<td></td>
							<td></td>
						</tr>
						</thead>
						<tbody>
						<?php foreach($transporte as $item): ?>
						<tr>
							<td><?php echo $item['nombreT']?></td>
							<td><?php echo $item['tipoT']?></td>
							<td>
								<form action="javascript: eliminar(<?php echo $item['idTransporte']?>);" method="POST">
									<input type="hidden" name="" value="">
									<button class="btn btn-danger">Eliminar</button>
								</form>
							</td>
							<td>
								<form action="guardar.php" method="GET">
									<input type="hidden" name="idTransporte" value="<?php echo $item['idTransporte']?>">
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
			<div class="col-xs-12"><p class="centered" style="font-size: 17px; border-left: 10px solid red; border-right: 10px solid red;">No hay transportes agregados</p></div>
		<?php endif;?>
