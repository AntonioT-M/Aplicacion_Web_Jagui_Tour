<?php 
require_once ('../admin/class/ViajesG.php');
$viajeG = ViajesG::recuperarTodos();
?>

<section class="no_sidebar_2column_area">
		<div class="container">
	<div class="two_column_product">
      <div class="row">
      	<?php if(count($viajeG)){ foreach($viajeG as $item){ if($item['fechaSG'] < date('Y-m-d', strtotime('- 5 days'))){ }else{?>
			<div class="col-lg-3 col-sm-6">
			<div class="l_product_item">
				<div class="l_p_img">
					<img class="img-fluid" style="height: 150px; width: 300px; size: cover;" src="admin/destinos/<?php echo $item['urlDestino']?>">
				</div>
                    <div class="l_p_text">
                        <ul>
                        <!--<li><button class="add_cart_btn" id="myBtn" style="text-decoration: none; outline: none; color: grey;"><i class="">Detalles</i></button></li>-->
                        <input type="hidden" name="idViajeG" value="">
                        <li><button class="add_cart_btn" onclick="abrirViaje(<?php echo $item['idViajeG']?>)">Adquirir</button></li>
                        </ul>
                        <h4><?php echo $item['destino']?></h4>
                        <h5><del></del></h5>
                    </div>
				</div>
			</div>
			<?php }}?>
			<?php }else{?>
			<?php echo '<p class="alert alert-warning">No hay viajes en este momento</p>';}?>
		</div>
	</div>
</div>
</section>