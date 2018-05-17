<?php  
// Obtenemos las utilidades para la pagina
include_once 'utilities.php';

// Creamos variables temporales
$nombre = $apellidos = $email = $username = $password = '';
$nombreErr = $apellidosErr = $emailErr = $usernameErr = $passwordErr = '';

// Si se ejecuta el submit
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Validamos password
    if (empty($_POST["password"])) { // Si no existe password
        $passwordErr = "La password es requerida."; // Mandamos error
    } else {
        // Sino se asigna a la variable password.
        $password = $_POST["password"];        
    }

    // Validamos username
    if (empty($_POST["username"])) { // Si no existe username
        $usernameErr = "El username es requerido."; // Mandamos error
    } else {
        // Si la username no contiene solo letras y espacios
        if (!preg_match("/^[a-zA-Z ]*$/",clean_input($_POST["username"]))) {
            // Cremos error de nombre
            $usernameErr = "Solo letras y espacios permitidos.";
        }else{            
            // Sino se asigna a la variable username.
            $username = $_POST["username"];
        }
    }

    // Validamos Nombre
    if (empty($_POST["nombre"])) { //Si no hay nombre
        $nombreErr = "El nombre es requerido."; // Creamos error
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

    // Validamos la apellidos
    if (empty($_POST["apellidos"])) {
        $apellidosErr = "Los apellidos son requeridos.";
    } else {
        
        // Si los apellidos no solo contienen letras y espacios
        if (!preg_match("/^[a-zA-Z ]*$/",clean_input($_POST["apellidos"]))) {
            // Cremos error de apellidos
            $apellidosErr = "Solo letras y espacios permitidos.";
        }else{
            // Sino se asigna a la variable apellidos.
            $apellidos = clean_input($_POST["apellidos"]);
        }
    }

    // Validamos el correo
    if (empty($_POST["email"])) {
        $emailErr = "Email es requerido.";
    } else {
        // Si el e-mail esta bien no escrito 
        if (!filter_var(clean_input($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
            // Creamos error de email
            $emailErr = "E-mail invalido";
        }else{
            //Sino se asigna a la variable email.
            $email = clean_input($_POST["email"]);
        }
    }

    // Comprobamos que todos los campos esten completos
    if ($password!='' && $nombre!='' && $apellidos!='' && $email!='' && $username!='') 
    {
        // Se crea una variable llamada usuario con todos los datos
        $usuario = new Usuario();
        $usuario->set($nombre,$apellidos,$username,$password,$email);
        // Se manda guardar usuario a la base de datos
        guardar($usuario);
        header('Location: usuarios.php'); // Redireccionamos al inicio
    }
}
?>

    <?php require_once('header.php'); ?>
    <div class="row">
        <div class="large-6 columns">
            <h1><img src="./img/user.png"/></h1>
        </div>
        <div class="large-6 columns">
            <h3>Nuevo Usuario</h3>
            <section class="section">
                <div class="content" data-slug="panel1">
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">           
                        Nombre: <input type="text" name="nombre" value="<?php echo $nombre;?>">
                        <span class="error">* <?php echo $nombreErr;?></span>
                        
                        Apellidos: <input type="text" name="apellidos" value="<?php echo $apellidos;?>">
                        <span class="error">* <?php echo $apellidosErr;?></span>                
                        
                        Username: <input type="text" name="username" value="<?php echo $username;?>">
                        <span class="error">* <?php echo $usernameErr;?></span>

                        Password: <input type="password" name="password" value="<?php echo $password; ?>">
                        <span class="error">* <?php echo $passwordErr;?></span>
                        
                        E-Mail: <input type="email" name="email" value="<?php echo $email;?>">
                        <span class="error">* <?php echo $emailErr;?></span>
                        
                        <br>
                        <center><input style="border-radius: 15px;" type="submit" class="button" name="submit" value="Guardar"></center>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <?php require_once('footer.php'); ?>