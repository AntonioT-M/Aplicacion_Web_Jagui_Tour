<?php
include('../template/header.php');
?>
<section id="main-content">
	<section class="wrapper">
		<div class="row mt">
			<div class="col-sm-12 main-chart">
				<div class="border-head">
					<h3>Viajes personalizados</h3>
				</div>
				<section>
					<div class="content-panel table table-responsive">
						<div class="form-group col-sm-12">
						<form class="form-horizontal" action="" method="POST" name="search_form" id="search_form">
							<div class="form-group col-sm-12">
							<label class="control-label col-sm-1" for="search">Buscar: </label>
							<div class="col-sm-10">
							<input class="form-control" size="50" type="search" name="search" id="search" placeholder="Ingrese su busqueda" onkeyup="buscarV();">
							</div>
							</div>
								<div class="col-sm-1">
									<label class="control-label">Salida: </label>
								</div>
								<div class="col-sm-2">
									<input class="form-control" type="date" name="date1" id="date1" onchange="buscarV();">
								</div>
								<div class="col-sm-1">
									<label class="control-label">Llegada: </label>									
								</div>
								<div class="col-sm-2">
									<input class="form-control" type="date" name="date2" id="date2" onchange="buscarV();">
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