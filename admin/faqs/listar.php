<?php
require_once ('../class/faq.php');
$faq = Faq::recuperarTodos();
?>

					<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
						<thead>
						<?php if(count($faq) > 0): ?>
						<tr>
							<td>Nombre</td>
							<td>Pregunta</td>
							<td>Respuesta</td>
							<td></td>
							<td></td>							
						</tr>
						</thead>
						<tbody>
						<?php foreach($faq as $item): ?>
						<tr>
							<td><?php echo $item['nombre']?></td>
							<td><?php echo $item['pregunta']?></td>
							<td><?php echo $item['respuesta']?></td>							
							<td>
								<form action="eliminar.php" method="POST">
									<input type="hidden" name="idFaqs" value="<?php echo $item['idFaqs']?>">
									<button class="btn btn-danger">Eliminar</button>
								</form>
							</td>
							<td>
								<a href="guardarFaq.php?idFaqs=<?php echo $item['idFaqs'] ?>"><button class="btn btn-primary">Actualizar</button></a>
								
							</td>
						</tr>
						<?php endforeach;?>
						</tbody>	
					</table>
			</div>
		</section>
		<?php else:?>
			<div class="col-xs-12"><p class="centered" style="font-size: 17px; border-left: 10px solid red; border-right: 10px solid red;">No hay Preguntas</p></div>
		<?php endif;?>