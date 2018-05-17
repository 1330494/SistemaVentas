<?php
include_once('utilities.php');
$id = isset( $_GET['id'] ) ? $_GET['id'] : '';
if( !array_key_exists($id, $usuarios) )
{
  die('No existe dicho usuario.');
}
?>

    <?php require_once('header.php'); ?>

    <div class="row">
 
      <div class="large-9 columns">
        <h3>Usuario</h3>
          <p>Informacion</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <form method="POST" action="usuario-editar.php">
                <table>
                <tbody>
                    <tr>
                    <td style="width: 180px;">Id Usuario:</td>
                      <td><input type="number" name="id" readonly value="<?php echo $usuarios[$id]->id ?>"></td>
                    </tr>

                    <tr>
                      <td style="width: 180px;">Nombre:</td>
                      <td><input type="text" name="nombre" required value="<?php echo $usuarios[$id]->nombre ?>"></td>
                    </tr>

                    <tr>
                      <td style="width: 180px;">Apellidos:</td>
                      <td><input type="text" name="apellidos" required value="<?php echo $usuarios[$id]->apellidos ?>"></td>
                    </tr>

                    <tr>
                      <td style="width: 180px;">Username:</td>
                      <td><input type="text" name="username" required value="<?php echo $usuarios[$id]->user_name ?>"></td>
                    </tr>

                    <tr>
                      <td style="width: 180px;">Password:</td>
                      <td><input type="text" name="password" required value="<?php echo $usuarios[$id]->password ?>"></td>
                    </tr>

                    <tr>
                      <td style="width: 180px;">Email:</td>
                      <td><input type="email" required name="email" value="<?php echo $usuarios[$id]->email ?>"></td>
                    </tr>
                  </tbody>
                </table>
                <center><input style="border-radius: 15px;" class="button" type="submit" name="modificar" value="Modificar"></center>
              </form>
            </div>
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>