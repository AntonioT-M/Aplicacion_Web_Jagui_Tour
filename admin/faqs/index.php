<?php
include('../template/header.php');
?>
<section id="main-content">
	<section class="wrapper">
		<div class="row mt">
			<div class="col-xs-12 main-chart">
				<div class="border-head">
					<h3>FAQS</h3>
				</div>
				<section>
					<form action="guardarFaq.php">
						<button class="btn btn-success">Nueva FAQ</button>
					</form>
					<div class="content-panel table table-responsive">
						<div class="form-group col-xs-12">
						<form class="form-horizontal" action="" method="POST" name="search_form" id="search_form">
							<div class="form-group col-xs-12">
							<label class="control-label col-xs-1" for="search">Buscar: </label>
							<div class="col-xs-10">
							<input class="form-control" size="50" type="search" name="search" id="search" placeholder="Ingrese su busqueda" onkeyup="buscar();">
							</div>
							</div>
						</form>
						</div>
					<div>
						<?php include_once 'listar.php'; ?>
					</div>
				</div>
			</div>
	</section>
</section>
