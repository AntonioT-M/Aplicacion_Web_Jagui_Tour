<?php
include_once('template/header.php');
?>
	<section class="login_area p_100">
            <div class="container">
                <div class="login_inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-xs-3">
   <!-- <img src="images/ico.jpg" class="rounded-circle" alt="Cinque Terre"  width="50%" height="auto">-->
    <img src="images/person.png" width="50%" height="auto">
</div>
                           
                            <div class="login_title">
                                <h2>Inicia sesión en tu cuenta</h2>
                                
                            </div>
                            <form class="login_form row" action="lib/procesar_login.php" method="POST">
                               <div class="col-lg-3"></div>
                                 <div class="col-lg-6 form-group">
                                    <input class="form-control" type="email" name="email" placeholder="Correo">
                                </div>
                                <div class="col-lg-3"></div>
                                 </div>

                                 <div class="col-lg-3"></div>                                 <div class="col-lg-6 form-group">
                                    <input class="form-control" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="col-lg-3"></div>
                                    
                                </div>
                                <div class="col-lg-12 form-group">
                                    <div class="creat_account">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Mantenerme logueado</label>
                                        <div class="check"></div>
                                    </div>
                                    
                                </div>
                                <center><div class="col-lg-12 form-group">
                                    <button type="submit" value="submit" class="btn btn-primary">Iniciar</button>
                                </div></center>
                            </form>
                        </div>
                    </div>
                
 	</section>
<?php
include_once('template/footer.php');