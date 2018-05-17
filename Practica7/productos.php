<?php 

include_once('utilities.php');

// Obtenemos el total de los productos si es diferente de null.
if($productos!=null)
  $total_productos = count($productos);
else
  $total_productos = 0; // De lo contrario se asigna 0

?>

<?php require_once('header.php'); ?>
<div class="row" style="text-align: right;">
    <a href="producto-agregar.php" style="border-radius: 15px;" class="button success">Nuevo Producto</a>
  </div>
<div class="row">
      <?php // Seccion para mostrar productos ?>
      <div class="large-12 columns">
        <h3>Productos</h3>
          <p>Lista</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <?php if($total_productos!=0){ ?>
              <table>
                <thead>
                  <tr>
                    <th width="200">Id Producto</th>
                    <th width="250">Nombre</th>
                    <th width="250">Precio</th>
                    <th width="250">Descripcion</th>
                    <th width="250" style="text-align: center;">Ver</th>
                    <th width="250" style="text-align: center;">Borrar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach( $productos as $id => $producto ){ ?>
                  <tr>
                    <td><?php echo $producto->id ?></td>
                    <td><?php echo $producto->nombre ?></td>
                    <td><?php echo '$'.$producto->precio ?></td>
                    <td><?php echo $producto->descripcion ?></td>
                    <td style="text-align: center;">
                      <a href="./producto.php?id=<?php echo $id; ?>" class="button radius tiny info">Detalles</a>
                    </td>
                    <td style="text-align: center;">
                      <a href="./producto-eliminar.php?id=<?php echo $id; ?>" class="button radius tiny alert">Borrar</a>
                    </td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="4"><b>Total de registros: </b> <?php echo $total_productos; ?></td>
                  </tr>
                </tbody>
              </table>
              <?php }else{ ?>
              No hay registros
              <?php } ?>
            </div>
          </section>
        </div>
      </div>
    </div>
<?php require_once('footer.php'); ?>