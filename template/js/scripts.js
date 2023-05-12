$(document).ready(function(){ mostrar();});
        
function mostrar(){
    $.ajax({url: 'lib/listarPaquetes.php', type: 'POST', success: function(data){ $('#verPaquetes').html(data);}});
}

function buscarV(){
    var search = $("#search").val();
    var s = $("#date1").val();
    var r = $("#date2").val();
    if(search != "" || s != "" || r != ""){
    $.ajax({url:'lib/buscar.php', data: {search: search, s: s, r: r}, type:'POST', success: function(data){ $('#verPaquetes').html(data);}});
    }else{
        mostrar();
    }
}

function mostrarBar(){
    document.getElementById("menu").style.display = "block";
}

function ocultarBar(){
    document.getElementById("menu").style.display = "none";
}

function ocultar_mostrar_bar(){
    var caja = document.getElementById("menu");
    var ventana = window.outerWidth;
    if(ventana > 758){
    if(caja.style.display == "none"){
        mostrarBar();
        document.getElementById("flecha").style.top = 89;
        document.getElementById("flech").className = "fa fa-chevron-up fa-2x"; 
        document.getElementById("contenedor").style.paddingTop = "14%";
        document.getElementById("contenedor").style.transition = "0.5s";
    }else{
        ocultarBar();
        document.getElementById("flecha").style.top = 24;
        document.getElementById("flech").className = "fa fa-chevron-down fa-2x"; 
        document.getElementById("contenedor").style.paddingTop = "10%";
        document.getElementById("contenedor").style.transition = "0.5s";
    }
    }else if(ventana < 758){
    if(caja.style.display == "none"){
        mostrarBar();
        document.getElementById("flecha").style.top = 305;
        document.getElementById("flech").className = "fa fa-chevron-up fa-2x"; 
        document.getElementById("contenedor").style.paddingTop = "14%";
        document.getElementById("contenedor").style.transition = "0.5s";
    }else{
        ocultarBar();
        document.getElementById("flecha").style.top = 24;
        document.getElementById("flech").className = "fa fa-chevron-down fa-2x"; 
        document.getElementById("contenedor").style.paddingTop = "10%";
        document.getElementById("contenedor").style.transition = "0.5s";
        }
    }
    }

function abrirModal(){
     $("#myModal").modal({ backdrop: 'static'});
}

function abrirViaje(id){
    $.ajax({url: 'lib/adquirirViaje.php', data: 'id='+id, type:'POST', success: function(data){ $('#verPaquetes').html(data);}});
}

function obtenerViaje(id){
    $.ajax({url: 'lib/obtenerViaje.php', data: 'id='+id, type:'POST', success: function(data){ $('#verPaquetes').html(data);}});
}

function traerFormVP(){
    $.ajax({url: 'lib/crearViaje.php', success: function(data){ $('#verPaquetes').html(data);}});
}

function asignarH(){
    var destino = $("#seleccionH").val();
    $.ajax({url:'lib/buscar.php', data: 'destino='+destino, type: "POST", success: function(data){ $("#mostrar").html(data);}});
    asignarLugar();
}

function asignarLugar(){
    var lugar = $("#seleccionH").val();
    var idViajeP = $("#idViajeG").val();
    $.ajax({url:'lib/buscar.php', data:{ lugar: lugar, idViajeP: idViajeP}, type: "POST", success: function(data){ $("#mostrarLugares").html(data);}});
}

function traerAsignacion(){
    if($('input:radio[name=check]:checked').val() == "si"){
        $.ajax({url: 'lib/buscar.php', data: 'respuestaNewVP='+$("#checkUno").val(), type: "POST", success: function(data){ $("#showInputs").html(data)}});
    }else{
        $("#showInputs").html("");
        $("#masPersonas").html("");
        sumaRestaD()
    }
}

function asignarPersonas(){
    $.ajax({url: 'lib/buscar.php', data: { adultos: $("#cantAdultos").val(), peques: $("#cantPeques").val()}, type: "POST", success: function(data){ $("#masPersonas").html(data)}});
    sumaRestaD();
}

function guardarViajeP(){
    if(confirm("Todos los datos son correctos?")){ $("#guardar").click();}
}

function guardarViajeG(){
    if(confirm("Todo listo?")){ $("#guardar").click();}
}

function sumaRestaD(){
    $.ajax({url: 'lib/buscar.php', data:{ idViaje: $("#idV").val(), cliente: 1, cantA: $("#cantAdultos").val(), cantN: $("#cantPeques").val()}, type: "POST", success: function(data){ $("#precioTotal").html(data);}});
}

function comprarVG(){
    if(confirm("Todo listo?")){ $("#guardar").click(); $("#comprar").click();}
}

function viajes(){
    $.ajax({url: 'viajes.php', type: 'POST', success: function(data){ $("#viajes").html(data);}});
}