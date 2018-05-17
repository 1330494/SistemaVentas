<?php 
	// Añadimos el archivo para las utildades de la base de datos
	include_once 'utilities.php';

	// Obtenemos todos los valores de los input
	$id = filter_input(INPUT_POST, 'id');
	$nombre = filter_input(INPUT_POST, 'nombre');
	$descripcion = filter_input(INPUT_POST, 'descripcion');
	$precio = filter_input(INPUT_POST, 'precio');

	$producto = new Producto();
	$producto->set($nombre,$descripcion,$precio);
	$producto->setID($id);
	// Mandamos modificar registro a la base de datos
	editProducto($producto);
 ?>
 <script type="text/javascript">
 	alert('Se ha modificado el producto correctamente.');
 	window.location.href = 'index.php';
 </script>