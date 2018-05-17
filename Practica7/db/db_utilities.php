<?php 
include_once 'classes.php';
include_once 'conexion.php';

// Metodo para agregar un nuevo producto a la base de datos
function newProducto($producto)
{
	$con = getDBConnection();
	$stmt = $con->prepare("INSERT INTO productos (nombre, descripcion, precio) VALUES (:nombre, :descripcion, :precio)");
	$stmt->bindParam(':nombre', $producto->nombre);
	$stmt->bindParam(':descripcion', $producto->descripcion);
	$stmt->bindParam(':precio', $producto->precio);
	$stmt->execute();
}

// Metodo para modificar el registro de un producto de la base de datos
function editProducto($producto)
{
		$con = getDBConnection();
		$sql = "UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio WHERE id = :id";
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':id', $producto->id);
		$stmt->bindParam(':nombre', $producto->nombre);
		$stmt->bindParam(':descripcion', $producto->descripcion);
		$stmt->bindParam(':precio', $producto->precio);
		$stmt->execute();
}

// Metodo para eliminar producto de la base de datos
// Recibe el id como parametro requerido
function deleteProducto($id)
{
	$con = getDBConnection();
	$sql = "DELETE FROM productos WHERE id = :id";
	$stmt = $con->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();
}

// Metodo para agregar un nuevo usuario a la base de datos
function newUsuario($usuario)
{
	$con = getDBConnection();
	$stmt = $con->prepare("INSERT INTO usuarios (nombre, apellidos, user_name, password, email) VALUES (:nombre, :apellidos, :user_name, :password, :email)");
	$stmt->bindParam(':nombre', $usuario->nombre);
	$stmt->bindParam(':apellidos', $usuario->apellidos);
	$stmt->bindParam(':user_name', $usuario->user_name);
	$stmt->bindParam(':password', $usuario->password);
	$stmt->bindParam(':email', $usuario->email);
	$stmt->execute();
}

// Metodo para modificar el registro de un usuario de la base de datos
function editUsuario($usuario)
{
		$con = getDBConnection();
		$sql = "UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, user_name = :user_name, password = :password, email = :email WHERE id = :id";
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':id', $usuario->id);
		$stmt->bindParam(':nombre', $usuario->nombre);
		$stmt->bindParam(':apellidos', $usuario->apellidos);
		$stmt->bindParam(':user_name', $usuario->user_name);
		$stmt->bindParam(':password', $usuario->password);
		$stmt->bindParam(':email', $usuario->email);
		$stmt->execute();
}

// Metodo para eliminar usuario de la base de datos
// Recibe la id como parametro requerido
function deleteUsuario($id)
{
	$con = getDBConnection();
	$sql = "DELETE FROM usuarios WHERE id = :id";
	$stmt = $con->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();
}

// Funcion para devolver todos los usuarios de la base de datos
function getUsuarios()
{
	$con = getDBConnection();
	$sql = "SELECT * FROM usuarios";
	$stmt = $con->prepare($sql);
	$stmt->execute();
	$usuarios = null;
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$usuario = new Usuario();
		$usuario->setID($row['id']);
		$usuario->set($row['nombre'],$row['apellidos'],$row['user_name'],$row['password'],$row['email']);
		$usuarios[] = $usuario;
	}
	return $usuarios;
}

// Funcion para devolver todos los productos de la base de datos
function getProductos()
{
	$con = getDBConnection();
	$sql = "SELECT * FROM productos";
	$stmt = $con->prepare($sql);
	$stmt->execute();
	$productos = null;
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$producto = new Producto();
		$producto->setID($row['id']);
		$producto->set($row['nombre'],$row['descripcion'],$row['precio']);
		$productos[] = $producto;
	}
	return $productos;
}

// Funcion para devolver todos los ventas de la base de datos
function getVentas()
{
	$con = getDBConnection();
	$sql = "SELECT * FROM ventas";
	$stmt = $con->prepare($sql);
	$stmt->execute();
	$ventas = null;
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$venta = new Venta();
		$venta->setFolio($row['folio']);
		$venta->set($row['fecha'],$row['monto'],$row['descripcion']);
		$ventas[] = $venta;
	}
	return $ventas;
}


// Metodo para eliminar venta de la base de datos
// Recibe el folio como parametro requerido
function deleteVenta($folio)
{
	$con = getDBConnection();
	$sql = "DELETE FROM ventas WHERE folio = :folio";
	$stmt = $con->prepare($sql);
	$stmt->bindParam(':folio', $folio);
	$stmt->execute();
}

// Funcion que permite guardar un nuevo registro a la base datos
function guardar($nuevo)
{ 
	// En caso de que sea tipo usuario
	if (get_class($nuevo)=='Usuario') {
		newUsuario($nuevo);
	}else if (get_class($nuevo)=='Producto') {
		// En caso de que sea tipo producto
		newProducto($nuevo);
	}else if (get_class($nuevo)=='Venta') {
		// En caso de que sea tipo venta
		newVenta($nuevo);
	}else{
		echo "<script type='javascript'>alert('Error al selecionar tipo.');<script>";
	}
}

// Metodo para obtener el concentrado del sistema
function getConcentrado()
{
	$concentrado = null;
	// Para Usuarios
	$db = getDBConnection(); // Obtenemos la conexion
  	$stmt = $db->prepare('SELECT COUNT(*) FROM usuarios'); // Preparamos la consulta para usuarios
  	$stmt->execute(); // Realizamos el query a la BD
  	$r = $stmt->fetch(PDO::FETCH_ASSOC); // Obtenemos el resultado en un array asociativo.
  	if ($r) {
  		$concentrado['USERS'] = $r['COUNT(*)']; // guardamos el total
  	}

  	// Para
  	$db = getDBConnection(); // Obtenemos la conexion
  	$stmt = $db->prepare('SELECT COUNT(*) FROM productos'); // Preparamos la consulta para productos
  	$stmt->execute(); // Realizamos el query a la BD
  	$r = $stmt->fetch(PDO::FETCH_ASSOC); // Obtenemos el resultado en un array asociativo.
  	if ($r) {
  		$concentrado['PRODUCTS'] = $r['COUNT(*)']; // guardamos el total
  	}

  	// Para Ventas
  	$db = getDBConnection(); // Obtenemos la conexion
  	$stmt = $db->prepare('SELECT COUNT(*) FROM ventas'); // Preparamos la consulta para ventas
  	$stmt->execute(); // Realizamos el query a la BD
  	$r = $stmt->fetch(PDO::FETCH_ASSOC); // Obtenemos el resultado en un array asociativo.
  	if ($r) {
  		$concentrado['SALES'] = $r['COUNT(*)']; // guardamos el total
  	}
	return $concentrado;
}

// Metodo para limpiar un string que contenga caracteres especiales
function clean_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Metodo para obtener la fecha actual de la base de datos
function fecha_actual()
{
	$db = getDBConnection();
  	$stmt = $db->prepare('SELECT CURDATE()');
  	$stmt->execute();
  	$r = $stmt->fetch(PDO::FETCH_ASSOC);
  	if ($r) {
  		return $r['CURDATE()'];
  	}else{
  		return false;
  	}
}

function getVentasFecha($fecha)
{
	$db = getDBConnection();
  	$stmt = $db->prepare('SELECT * FROM ventas WHERE fecha = :fecha');
  	$stmt->bindParam(':fecha', $fecha);
  	$stmt->execute();
  	$ventas = null;
  	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  		$venta = new Venta();
  		$venta->setFolio($row['folio']);
  		$venta->set($row['fecha'],$row['monto'],$row['descripcion']);
		$ventas[] = $venta;
  	}
	return $ventas;
}
 ?>