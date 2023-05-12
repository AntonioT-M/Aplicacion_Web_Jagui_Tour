<?php
require_once ('../class/Usuarios.php');
$usuario = Usuarios::recuperarTodos();
?>

					<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
						<thead>
						<?php if(count($usuario) > 0): ?>
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
						<?php foreach($usuario as $item): ?>
						<tr>
							<td><img height="50" width="50" src="<?php echo $item['urlAvatarUser']?>"></td>
							<td><?php echo $item['nombreUser']?></td>
							<td><?php echo $item['apellidosUser']?></td>
							<td><?php echo $item['emailUser']?></td>							
							<td>
								<form action="javascript: eliminar(<?php echo $item['idUsuario']?>);" method="POST">
									<input type="hidden" name="" value="">
									<button class="btn btn-danger">Eliminar</button>
								</form>
							</td>
							<td>
								<form action="guardar.php" method="GET">
									<input type="hidden" name="idUsuario" value="<?php echo $item['idUsuario']?>">
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
			<div class="col-xs-12"><p class="centered" style="font-size: 17px; border-left: 10px solid red; border-right: 10px solid red;">No hay usuarios agregados</p></div>
		<?php endif;?>