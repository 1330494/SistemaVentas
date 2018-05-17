<?php
include_once('utilities.php');
$id = isset( $_GET['id'] ) ? $_GET['id'] : '';
if( !array_key_exists($id, $ventas) )
{
  die('No existe dicha venta.');
}

?>
    
    <?php require_once('header.php'); ?>

    <div class="row">
      <div class="large-9 columns">
        <h3>Venta</h3>
          <p>Informacion</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <form method="POST" action="venta-editar.php">
                <table>
                <tbody>
                    <tr>
                    <td style="width: 180px;">Id Producto:</td>
                      <td><input type="number" name="id" readonly value="<?php echo $ventas[$id]->folio ?>"></td>
                    </tr>

                    <tr>
                      <td style="width: 180px;">Nombre:</td>
                      <td><input type="date" name="nombre" readonly value="<?php echo $ventas[$id]->fecha ?>"></td>
                    </tr>

                    <tr>
                      <td style="width: 180px;">Precio:</td>
                      <td><input type="text" name="precio" readonly value="<?php echo '$'.$ventas[$id]->monto ?>"></td>
                    </tr>

                    <tr>
                      <td style="width: 180px;">Descripcion:</td>
                      <td>
                        <textarea readonly style="max-height: 150px;max-width: 400px; width: 400px;height: auto;" name="descripcion" required><?php echo $ventas[$id]->descripcion ?></textarea>
                      </td>
                    </tr>

                  </tbody>
                </table>
                <center><a href="ventas.php" class="button success">Volver</a></center>
              </form>
            </div>
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>