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
	asignarLugar();
}

function asignarLugar(){
	var lugar = $("#seleccionH").val();
	var idViajeP = $("#idViajeG").val();
	$.ajax({url:'buscar.php', data:{ lugar: lugar, idViajeP: idViajeP}, type: "POST", success: function(data){ $("#mostrarLugares").html(data);}});
}

function actualizarViajeros(id){
	if(confirm("¿Deseas actualizar este registro?")){$.ajax({url: 'actualizarViajeros.php', data:{ idViajeros: id, estadoVG:+$("#estadoVG").val()}, type: "POST", success: function(data){ if(data != ''){ alert("Actualizacion exitosa"); $("#muestra").html(data); }else{ alert("No se logro actualizar"); $("#muestra").html(data);}}})}
}

function abrirModal(){
	var act = $("#actualizar").val();
		$.ajax({url:'busqueda.php', data: 'id='+id, type: "POST", success: function(){ $("#myModal").modal({backdrop: 'static'})}});
}

function precioPersonasH(){
	if($('input:checkbox[class=cajas]').is(':checked')){
		var myr, mnr, inf, jnr;
		$('input:checkbox[class=cajas]:checked').each( function(){ 
			if($(this).val() == "myr"){ myr = $(this).val();
			}else if($(this).val() == "mnr"){ mnr = $(this).val();;
			}else if($(this).val() == "inf"){ inf = $(this).val();
			}else if($(this).val() == "jnr"){ jnr = $(this).val();}});
		$.ajax({url:'buscar.php', data:{ myr:myr, mnr:mnr, inf:inf, jnr:jnr}, type: 'POST', success: function(data){ $("#mostrarPrec").html(data);}});	
	}else{
		$("#mostrarPrec").html("");
	}
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
    var caja = document.getElementsByClassName("validar").value.trim();
    for(var i = 0; i < caja.length(); i++){
    if(caja[i] == ""){
    	document.getElementById("guardar").setAttribute("disabled", true);
        alert("No se permiten espacios en blanco");
    }else{
    	document.getElementById("guardar").removeAttribute("disabled", false);
    }
	}
}
