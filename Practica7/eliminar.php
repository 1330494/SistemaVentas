<?php 
include_once 'utilities.php';

// Obtenemos el id y el tipo de jugador a eliminar
$id = filter_input(INPUT_POST, 'postId');
$tipo = filter_input(INPUT_POST, 'postType');

// En caso de producto 'P'
if ($tipo==='P') {
	deleteProducto($id); // Eliminamos
} 
if ($tipo==='U') { // Si es usuario 'U'
	deleteUsuario($id); // Eliminamos
}
if ($tipo==='V') { // Si es venta 'V'
	deleteVenta($id); // Eliminamos
}


?>