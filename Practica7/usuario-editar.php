<?php 
	// Añadimos el archivo para las utildades de la base de datos
	include_once 'utilities.php';

	// Obtenemos todos los valores de los input
	$id = filter_input(INPUT_POST, 'id');
	$nombre = filter_input(INPUT_POST, 'nombre');
	$apellidos = filter_input(INPUT_POST, 'apellidos');
	$username = filter_input(INPUT_POST, 'username');
	$password = filter_input(INPUT_POST, 'password');
	$email = filter_input(INPUT_POST, 'email');

	$usuario = new Usuario();
	$usuario->setID($id);
	$usuario->set($nombre,$apellidos,$username,$password,$email);
	// Mandamos modificar registro a la base de datos
	editUsuario($usuario);
	
 ?>
 <script type="text/javascript">
 	alert('Se ha modificado correctamente.');
 	window.location.href = 'index.php';
 </script>