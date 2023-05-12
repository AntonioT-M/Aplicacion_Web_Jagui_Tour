<?php
require_once ('../class/Comentarios.php');
$comentario = Comentarios::recuperarTodos();
?>

					<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
						<thead>
						<?php if(count($comentario) > 0): ?>
						<tr>
							<td>Nombre</td>
							<td>Email</td>
							<td>Mensaje</td>
							<td>Fecha</td>
							<td>Estatus</td>
							<td></td>
							<td></td>							
						</tr>
						</thead>
						<tbody>
						<?php foreach($comentario as $item): ?>
						<tr>
							<td><?php echo $item['nombre']?></td>
							<td><?php echo $item['emailComentario']?></td>
							<td><?php echo $item['mensaje']?></td>
							<td><?php echo $item['fecha']?></td>
							<?php 
								$icon ="";
								if ($item['estatus'] != 1){$icon="-slash";}
							?>
							<td><i class="fa fa-eye<?=$icon;?>"></i></td>							
							<td>
								<form action="javascript: eliminar(<?php echo $item['idComentario']?>);" method="POST">
									<input type="hidden" name="" value="">
									<button class="btn btn-danger">Eliminar</button>
								</form>
							</td>
							<td>
								<form action="javascript: gestionComent(<?php echo $item['idComentario']?>);" method="POST">
									<input type="hidden" name="" value="">
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
			<div class="col-xs-12"><p class="centered" style="font-size: 17px; border-left: 10px solid red; border-right: 10px solid red;">No hay comentarios</p></div>
		<?php endif;?>