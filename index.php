<?php
include_once('template/header.php');
?>
		<br>
		<!--Adobe Edge Runtime-->
<center><h1> Bienvenido!!!</h1></center>  
<center><h3> Hecha un vistazo por nuestra página y conoce nuestras promociones y nuevos paquetes</h3></center>
<center><h2> "JAGUI TOUR" tu mejor opción </h2></center>
<!--Adobe Edge Runtime End-->
		<div class="container">
		<div class="col-lg-12">
		<center>
		<video src= "video/jagui_tour_Full-HD.mp4.mp4.mp4.mp4" width = "700" heigth="700"  controls><!--es para agregar video o musica y se cambia el tamaño-->
		</video>
		</center>
		<br>
		</div>
		<br>
				<center><h2>Disfruta de un paseo con toda tu familia al aire libre!!!</h2></center>
		<br>
		<div class="row">
			<div class="col-xs-12">
		<center><img src="images/areas verdes/area.jpg" style="width: 40%; height: 30%"></center>
 		<br>
 		</div>
 			</div>
			<br>

		<div class="row">
			<div class="col-xs-12">
				<!--Diseño personal-->
				<?php if(isset($_SESSION['email'])){?>
					<p>Bienvenido: <?php echo $_SESSION['email'];?></p>
				<?php } ?>
			</div>
		</div>
		</div>
<?php
include_once('template/footer.php');?>