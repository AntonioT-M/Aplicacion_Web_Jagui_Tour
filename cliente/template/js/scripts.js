$(document).ready(function(){ listar();});



function listar(){
	$.ajax({url:'listar.php', type:'POST', success: function(data){ $('#en_lista').html(data);}});
}

function buscar(){
	var search = $("#search").val();
	if(search != ""){
	$.ajax({url:'buscar.php', data: "search="+search, type:'POST', success: function(data){ $('#en_lista').html(data);}});
	}else{
		listar();
	}
}

function buscarV(){
	var search = $("#search").val();
	var s = $("#date1").val();
	var r = $("#date2").val();
	if(search != "" || s != "" || r != ""){
	$.ajax({url:'buscar.php', data: {search: search, s: s, r: r}, type:'POST', success: function(data){ $('#en_lista').html(data);}});
	}else{
		listar();
	}
}

function eliminar(id){
	var respuesta = confirm("Realmente deseas eliminar"); if(respuesta){ $.ajax({ url:'eliminar.php', data: 'id='+id, type:"POST", success: function(data){ buscar(); }})}
}

function eliminarV(id){
	var respuesta = confirm("Realmente deseas eliminar"); if(respuesta){ $.ajax({ url:'eliminar.php', data: 'id='+id, type:"POST", success: function(data){ buscarV(); }})}
}

function gestionComent(id){
	$.ajax({url:'gestionComentario.php', data: 'id='+id, type: "POST", success: function(data){ buscar();}});
}

function asignarH(){
	var destino = $("#seleccionH").val();
	var idViajeG = $("#idViajeG").val();
	$.ajax({url:'buscar.php', data:{ destino: destino, idViajeG: idViajeG}, type: "POST", success: function(data){ $("#mostrar").html(data);}});
}

function abrirModal(){
	var act = $("#actualizar").val();
		$.ajax({url:'busqueda.php', data: 'id='+id, type: "POST", success: function(){ $("#myModal").modal({backdrop: 'static'})}});
}


/*function fn_mostrar_form(){
	$('#div_oculto').load('frm_guardar.php', function(){ $.blockUI({ message: $('#div_oculto')});}); 
}

function fn_guardar(){
	var str = $('#form_guardar').serialize(); $.ajax({ url:'guardar.php', data: str, type: 'POST', success: function(data){ if(data != ''){ alert("Registrado exitosamente");} fn_cerrar(), fn_lista();}});
}

function fn_cerrar(){
	$.unblockUI({ onUnblock: function(){ $('#div_oculto').html("");}});
}

function fn_mostrar_form_editar(id){
	$('#div_oculto').load('frm_guardar.php', {id:id}, function(){ $.blockUI({message: $('#div_oculto')})});
}

function fn_eliminar(id){
	var respuesta = confirm("Realmente deseas eliminar"); if(respuesta){ $.ajax({ url:'eliminar.php', data: 'id='+id, type:"POST", success: function(data){ fn_lista(); }})}
}*/

function validarEspacio(){
    var caja = document.getElementById("validar").value.trim();
    if(caja == ""){
        alert("No se permiten espacios en blanco");
    }
}

function editar(){
	if(confirm("¿Estas seguro que deseas editar tus datos?")){
		if($('.lectura').is('[readonly]')){
			$('.lectura').attr("readOnly", false);
			$('.selectores').attr("disabled", false);
			$('#imagen').attr("type", "file");
			$('#editar').removeClass('btn btn-primary pull-right');
			$('#editar').addClass('btn btn-success pull-right');
			$('button#editar').text("Terminar");
			$('button#editar').attr("onclick", "guardarForm()");
		}
	}
}

function guardarForm(){
	if(confirm("¿Deseas guardar los cambios?")){
		$('#guardar').click();
	}else{
		location.reload();
	}
}
