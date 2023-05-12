<?php
include_once('template/header.php');
require_once('admin/class/GaleriaPU.php');
$GaleriaPU = GaleriaPU::recuperarTodos();
?>
<br>
<center>
<div class="row">
	<div class="col-xs-12">
	<br>
	<h1>Conoce los diferentes paraisos</h1>
	<br>
	</div>

	<?php  
	if(count($GaleriaPU)>0):

		foreach ($GaleriaPU as $item):
	?>
	

 	<div class="col-xs-12 col-sm-4">
 		<div class="main">
 		<div class="view view-fifth">
                    <img src="admin/galeria2/<?php echo $item['ubicacion']?>" style="width:100%; height:100%;" class="center-block">                    <div class="mask">
                    	<br>
                        <h3 class="text-center"> <?php echo $item['nombre']; ?> </h3>
                        <br>
                        <p class="text-center" style="color: #000000"><?php echo $item['descripcion']; ?></p>
                        
                    </div>
                </div>
            </div>

 		
 		

 		

 		

 		

 	</div>

 	<?php 

 		endforeach;

 	else:

 		echo '<p class="alert alert-warning">No hay imagenes</p>';
 	endif;
 	?>

 </div>
</center>

<?php 
include_once('template/footer.php');
?>