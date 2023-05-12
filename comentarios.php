<?php
include_once ('template/header.php');
require_once 'admin/class/Comentarios.php';
$coment = Comentarios::recuperarTodos();
?>
<section class="login_area p_100">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
            	<div class="login_title">
                	<h2>Dejanos tu comentario</h2>
                	<p>Es importante para nosotros saber lo que nuestros usuarios piensan.</p>
            	</div>			
				<form class="login_form row" action="lib/procesar_comentario.php" method="POST">
					<div class="row">
					<div class="col-lg-3"></div>
					<div class="col-lg-6 form-group">
						<input class="form-control" placeholder="Nombre" id="nombre" onchange="validarEspacioE()" required type="text" name="nombre" <?php if(isset($_SESSION['Nombre'])){?> value="<?php echo $_SESSION['nombre']?>" readonly <?php }?>> 
					</div>
					<div class="col-lg-3"></div>
					</div>

					<div class="row">
					<div class="col-lg-3"></div>
					<div class="col-lg-6 form-group">
						<input class="form-control" placeholder="Email" id="email" onchange="validarEspacioE()" required type="email" name="emailComentario" <?php if(isset($_SESSION['email'])){?> value="<?php echo $_SESSION['email']?>" readonly <?php }?>> 
					</div>
					<div class="col-lg-3"></div>
					</div>

					<div class="row">
					<div class="col-lg-3"></div>
					<div class="col-lg-6 form-group">
						<textarea class="form-control" placeholder="Mensaje" pattern="[A-Za-zÁáÉéÍíÓóÚúÑn0-9]+" id="textA"  name="mensaje" cols="20" rows="4"></textarea>
					</div>

					<div class="col-lg-3"></div>
					</div>


					<div class="col-lg-6"></div>
						<input class="form-control" readonly="readonly" type="hidden" name="fecha" value="<?php echo date('d-m-Y') ?>">
						<input type="hidden" name="estatus" value="0"><br>
					</div>
					<center><div class="col-lg-12 form-group">
						<button type="submit" value="submit" class="btn btn-primary">Enviar comentario</button>
					</div></center>
				</form>
			
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-xs-11">
				
				<br>
				<div style="overflow-x:auto">
				<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
						<thead>
							<tr>
							<td><center><b>Email</b></center></td>
							<td><center><b>Mensaje</b></center></td>							
									</tr>
						</thead>
						<?php 
						if(count($coment)>0):

							foreach($coment as $mostrar): 
							
								if($mostrar['estatus'] != 0):?>

										
									<tbody>
									<tr>
										<td><?php echo $mostrar['emailComentario']?></td>
										<td><?php echo $mostrar['mensaje']?></td>	
									</tr>
									</tbody>	

						<?php endif; endforeach;?>
						<?php else:?>
						<p>Aun no hay comentarios que mostrar</p>
					<?php endif;?>
				</table>
				</div>

			</div>
			<div class="col-xs-1"></div>
		</div>
	</div>
</section>
<?php
include('template/footer.php');
?>