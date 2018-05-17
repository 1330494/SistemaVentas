<?php
// Obtenemos las utilidades de la pagina
include_once('utilities.php');
$id = isset( $_GET['id'] ) ? $_GET['id'] : '';
if( !array_key_exists($id, $usuarios) )
{
  die('No existe dicho usuario.');
}

// Extraemos el numero de empleado para eliminar registro
$id = $usuarios[$id]->id;
$tipo = 'U'; // Establecemos que el usuario a eliminar es usuario: B

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Eliminando usuario...</title>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
</head>
<body>
<form action="" method="POST">
	<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
	<input type="hidden" id="tipo" name="tipo" value="<?php echo $tipo; ?>">
</form>
<script type="text/javascript">
	// JQuery y JavaScript para confirmar eliminacion del usuario
	var id = document.getElementById('id');
	var tipo = document.getElementById('tipo');
	var c = confirm('Deseas eliminar usuario?');
	if (c) {

		eliminar(id.value,tipo.value);
		window.location.href = 'index.php';
	}else{
		window.location.href = 'index.php';
	}

	function eliminar(id, tipo) {
    	$.post('eliminar.php', {postId:id, postType:tipo},
    		function(data){
        		alert('Se elimino usuario correctamente.');
    		}
    	);
	}
</script>
</body>
</html>