function m_producto(idProducto){
	$('#mProduct').load('m_producto.php', {idProducto:idProducto}, function(){ $.blockUI({message: $('#mProduct')});});
}

function fn_cerrar(){
	$.unblockUI({ onUnblock: function(){ $('#mProduct').html("");}});
}