<?php
if( isset($_COOKIE) && is_array($_COOKIE) && count($_COOKIE)>0 && isset($_COOKIE['username'])
    && $_COOKIE['username']!=null)
{
    session_start();
    $_SESSION['username']=$_COOKIE['username'];
}

if(isset($_GET['action']) && $_GET['action']=='logout')
{
    //session_destroy();
    unset($_SESSION['username']);
}

if (isset($_POST['formu']))
{
    //Imprime el array con los datos de acceso, una vez logueado
    print "<h2>POST</h2>";
    print_r($_POST['formu']);
    if( isset($_POST['formu']['nombre'])
        &&isset($_POST['formu']['pass'])
        &&$_POST['formu']['pass']=="admin"
        &&$_POST['formu']['nombre']=="admin"
    ){
        session_start();
        $_SESSION['username']=$_POST['formu']['nombre'];
        setcookie("username", $_POST['formu']['nombre']);
    }

}?>
<html>
<head>
    <meta charset="utf-8">
    <title>Sesiones en PHP7</title>
</head>

<body>
<?php
if( isset($_SESSION)
    &&is_array($_SESSION)
    && count($_SESSION)>0
){
    ?>
    
    <?php
}
if(isset($_SESSION['username'])){
    
    //estoy logueado
    ?>
    <h3>Bienvenido</h3>
    <?php
    //echo "<h4>".$_SESSION['username']."</h4>";
    //echo "<a href='?action=logout'>Logout</a>";
    header('Location: ../');
}else{
    //estoy deslogueado
    ?>
    <br>
    <center><h2>Login</h2></center>
    <div class="cont" style="margin-left: auto;margin-right: auto;width: 300px;height: auto;">
      <FORM ACTION="login.php" name="formu" METHOD="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="formu[nombre]"  id="nombre" value="<?php
               if(isset($_POST['formu']['nombre'])&&$_POST['formu']['nombre']!=null){
                   echo $_POST['formu']['nombre'];
               }
               ?>">


        <br/>
        <label for="valor">Contraseña</label>
        <input type="text" name="formu[pass]"  id="valor"
               value="<?php
               if(isset($_POST['formu']['pass'])
                   &&$_POST['formu']['pass']!=null){
                   echo $_POST['formu']['pass'];
               }
               ?>">
        <br/>
        <input type="submit" name="formu[enviar]" value="enviar"/>
    </FORM>
    </div>

    <?php
}
?>

</body>
</html>