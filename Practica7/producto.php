<?php
include_once('utilities.php');
$id = isset( $_GET['id'] ) ? $_GET['id'] : '';
if( !array_key_exists($id, $productos) )
{
  die('No existe dicho producto.');
}

?>
    
    <?php require_once('header.php'); ?>

    <div class="row">
      <div class="large-9 columns">
        <h3>Producto</h3>
          <p>Informacion</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <form method="POST" action="producto-editar.php">
                <table>
                <tbody>
                    <tr>
                    <td style="width: 180px;">Id Producto:</td>
                      <td><input type="number" name="id" readonly value="<?php echo $productos[$id]->id ?>"></td>
                    </tr>

                    <tr>
                      <td style="width: 180px;">Nombre:</td>
                      <td><input type="text" name="nombre" required value="<?php echo $productos[$id]->nombre ?>"></td>
                    </tr>

                    <tr>
                      <td style="width: 180px;">Precio:</td>
                      <td><input type="text" name="precio" required value="<?php echo $productos[$id]->precio ?>"></td>
                    </tr>

                    <tr>
                      <td style="width: 180px;">Descripcion:</td>
                      <td><input type="text" name="descripcion" required value="<?php echo $productos[$id]->descripcion ?>"></td>
                    </tr>

                  </tbody>
                </table>
                <center><input style="border-radius: 15px;" class="button" type="submit" name="modificar" value="Modificar"></center>
                <input type="hidden" name="last_id" value="<?php echo $productos[$id]['Id'] ?>">
              </form>
            </div>
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>