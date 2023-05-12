<?php
require_once 'admin/class/faq.php';
$faq = Faq::recuperarTodos();
include('template/header.php');

?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
	<h1>Preguntas frecuentes</h1><br>
		<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
						<thead>
						<?php if(count($faq) > 0): ?>
						<tr>
							<td><center><b>Pregunta</b></center></td>
							<td><center><b>Respuesta</b></center></td>						
						</tr>
						</thead>
						<tbody>
						<?php foreach($faq as $item): ?>
						<tr>
							<td><?php echo $item['pregunta']?></td>
							<td><?php echo $item['respuesta']?></td>							
						</tr>
						<?php endforeach;?>
						</tbody>	
					</table>
	</div>
	</div>
	</div>	
<?php else:?>
	<p>Aun no hay preguntas frecuentes</p>
<?php endif;
include('template/footer.php');
?>