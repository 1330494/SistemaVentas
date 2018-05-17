<?php  
include_once 'utilities.php';

// Creamos variables temporales
$nombre = $descripcion = $precio = '';
$nombreErr = $descripcionErr = $precioErr = '';

// Si se ejecuta el submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validamos precio
	if (empty($_POST["precio"])) { // Si no existe precio
        $precioErr = "El precio es requerido."; // Mandamos error
    } else {
        // Si el precio es igual a 0
        if ($_POST['precio'] == 0) {
            // Cremos error de precio
            $precioErr = "Precio debe ser mayor a $0.0";
        }else{            
            // Sino se asigna a la variable precio.
            $precio = $_POST["precio"];
        }
    }

    // Validamos Nombre
    if (empty($_POST["nombre"])) { //Si no hay nombre
        $nombreErr = "Nombre es requerido."; // Creamos error
    } else {
        // Si el nombre no contiene solo letras y espacios
        if (!preg_match("/^[a-zA-Z ]*$/",clean_input($_POST["nombre"]))) {
        	// Cremos error de nombre
            $nombreErr = "Solo letras y espacios permitidos.";
        }else{
        	// Sino se asigna a la variable nombre.
        	$nombre = clean_input($_POST["nombre"]);
        }
    }

    // Validamos la descripcion
    if (empty($_POST["descripcion"])) {
        $descripcionErr = "La descripcion es requerida.";
    } else {
        // Sino se asigna a la variable descripcion.
        $descripcion = $_POST["descripcion"];
    }

    // Comprobamos que todos los campos esten completos
    if ($nombre!='' && $descripcion!='' && $precio!='') 
    {
    	// Se crea una variable llamada producto con todos los datos
    	$producto = new Producto();
        $producto->set($nombre,$descripcion,$precio);
        // Se manda guardar producto a la base de datos
        guardar($producto);
        header('Location: productos.php'); // Redireccionamos al inicio
    }
}
?>

    <?php require_once('header.php'); ?>
    <div class="row">
        <div class="large-6 columns">
            <h1><img src="./img/product.png"/></h1>
        </div>
    	<div class="large-6 columns">
    		<h3>Nuevo Producto</h3>
    		<section class="section">
    			<div class="content" data-slug="panel1">
    				<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		              
		                Nombre: <input type="text" name="nombre" value="<?php echo $nombre;?>">
		                <span class="error">* <?php echo $nombreErr;?></span>
		                
		                Descripcion:
                        <textarea name="descripcion" id="descripcion"><?php echo $descripcion;?></textarea>
		                <span class="error">* <?php echo $descripcionErr;?></span>	              
		                
		                Precio: <input type="number" step="any" name="precio" value="<?php echo $precio;?>">
		                <span class="error">* <?php echo $precioErr;?></span>
		                
		                <br>
		                <center><input style="border-radius: 15px;" type="submit" class="button" name="submit" value="Guardar"></center>
		            </form>
    			</div>
    		</section>
    	</div>
    </div>
    <?php require_once('footer.php'); ?>