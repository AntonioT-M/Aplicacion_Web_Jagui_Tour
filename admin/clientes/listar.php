<?php
require_once ('../class/Clientes.php');
$cliente = Clientes::recuperarTodos();
?>

					<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
						<thead>
						<?php if(count($cliente) > 0): ?>
						<tr>
							<td>Avatar</td>
							<td>Nombre</td>
							<td>Apellidos</td>
							<td>Email</td>
							<td></td>
							<td></td>							
						</tr>
						</thead>
						<tbody>
						<?php foreach($cliente as $item): ?>
						<tr>
							<td><img height="50" width="50" src="<?php echo $item['urlAvatarC']?>"></td>
							<td><?php echo $item['nombreC']?></td>
							<td><?php echo $item['apellidosC']?></td>
							<td><?php echo $item['emailC']?></td>							
							<td>
								<form action="javascript: eliminar(<?php echo $item['idCliente']?>);" method="POST">
									<input type="hidden" name="" value="">
									<button class="btn btn-danger">Eliminar</button>
								</form>
							</td>
							<td>
								<form action="guardar.php" method="GET">
									<input type="hidden" name="idCliente" value="<?php echo $item['idCliente']?>">
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
			<div class="col-xs-12"><p class="centered" style="font-size: 17px; border-left: 10px solid red; border-right: 10px solid red;">No hay clientes agregados agregados</p></div>
		<?php endif;?>