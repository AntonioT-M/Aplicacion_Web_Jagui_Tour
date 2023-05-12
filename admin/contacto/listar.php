<?php
require_once ('../class/Contacto.php');
$contacto = Contacto::recuperarTodos();
?>

					<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
						<thead>
						<?php if(count($contacto) > 0): ?>
						<tr>
							<td>Nombre</td>
							<td>Mensaje</td>
							<td></td>
							<td></td>							
						</tr>
						</thead>
						<tbody>
						<?php foreach($contacto as $item): ?>
						<tr>
							<td><?php echo $item['nombre']?></td>
							<td><?php echo $item['mensaje']?></td>						
							<td>
								<form action="javascript: eliminar(<?php echo $item['idContacto']?>);" method="POST">
									<input type="hidden" name="" value="">
									<button class="btn btn-danger">Eliminar</button>
								</form>
							</td>
							<!--<td>
								<form action="guardar.php" method="GET">
									<input type="hidden" name="idContacto" value="<?php //echo $item['idContacto']?>">
									<button class="btn btn-primary">Actualizar</button>
								</form>
							</td>-->
						</tr>
						<?php endforeach;?>
						</tbody>	
					</table>
			</div>
		</section>
		<?php else:?>
			<div class="col-xs-12"><p class="centered" style="font-size: 17px; border-left: 10px solid red; border-right: 10px solid red;">No hay comentarios</p></div>
		<?php endif;?>