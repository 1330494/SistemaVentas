<?php
// Obtenemos las utilidades de la pagina
include_once('utilities.php');
$id = isset( $_GET['id'] ) ? $_GET['id'] : '';
if( !array_key_exists($id, $ventas) )
{
  die('No existe dicha venta.');
}

// Extraemos el numero de empleado para eliminar registro
$folio = $ventas[$id]->folio;
$tipo = 'V'; // Establecemos que a eliminar es venta: V

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Eliminando venta...</title>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
</head>
<body>
<form action="" method="POST">
	<input type="hidden" id="folio" name="folio" value="<?php echo $folio; ?>">
	<input type="hidden" id="tipo" name="tipo" value="<?php echo $tipo; ?>">
</form>
<script type="text/javascript">
	// JQuery y JavaScript para confirmar eliminacion del venta
	var folio = document.getElementById('folio');
	var tipo = document.getElementById('tipo');
	var c = confirm('Deseas eliminar venta?');
	if (c) {
		eliminar(folio.value,tipo.value);
		window.location.href = 'index.php';
	}else{
		window.location.href = 'index.php';
	}

	function eliminar(folio, tipo) {
    	$.post('eliminar.php', {postId:folio, postType:tipo},
    		function(data){
        		alert('Se eliminó venta correctamente.');
    		}
    	);
	}
</script>
</body>
</html>