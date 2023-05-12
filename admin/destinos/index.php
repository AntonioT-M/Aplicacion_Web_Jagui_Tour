<?php
include('../template/header.php');
?>
<section id="main-content">
	<section class="wrapper">
		<div class="row mt">
			<div class="col-sm-12 main-chart">
				<div class="border-head">
					<h3>Destinos</h3>
				</div>
				<section>
					<form action="guardar.php">
						<button class="btn btn-success">Nuevo destino</button>
					</form>
					<div class="content-panel table table-responsive">
						<div class="form-group col-sm-12">
						<form class="form-horizontal" action="" method="POST" name="search_form" id="search_form">
							<div class="form-group col-sm-12">
							<label class="control-label col-sm-1" for="search">Buscar: </label>
							<div class="col-sm-10">
							<input class="form-control" size="50" type="search" name="search" id="search" placeholder="Ingrese su busqueda" onkeyup="buscar();">
							</div>
							</div>
						</form>
						</div>
					<div id="en_lista"></div>
				</div>
			</div>
	</section>
</section>
<?php
include('../template/footer.php');
?>