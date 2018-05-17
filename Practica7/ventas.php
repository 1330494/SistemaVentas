<?php 

include_once('utilities.php');

if($ventas!=null)
  $total_ventas = count($ventas);
else
  $total_ventas = 0; // De lo contrario se asigna 0

?>

<?php require_once('header.php'); ?>
  <div class="row" style="text-align: right;">
    <a href="venta-fecha.php" style="border-radius: 15px;" class="button success">Ventas por fecha</a>
    <a href="venta-agregar.php" style="border-radius: 15px;" class="button success">Nueva Venta</a>
  </div>
  <div class="row">
      <?php // Seccion para mostrar ventas ?>
      <div class="large-12 columns">
        <h3>Ventas</h3>
          <p>Lista</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <?php if($total_ventas!=0){ ?>
              <table>
                <thead>
                  <tr>
                    <th width="250">Folio</th>
                    <th width="250">Fecha</th>
                    <th width="250">Monto</th>
                    <th width="250" style="text-align: center;">Acción</th>
                    <th width="250" style="text-align: center;">Borrar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($ventas as $id => $venta){ ?>
                  <tr>
                    <td><?php echo $venta->folio ?></td>
                    <td><?php echo $venta->fecha ?></td>
                    <td>$<?php echo $venta->monto ?></td>
                    <td style="text-align: center;">
                      <a href="./venta.php?id=<?php echo $id; ?>" class="button radius tiny info">Detalles</a>
                    </td>
                    <td style="text-align: center;">
                      <a href="./venta-eliminar.php?id=<?php echo $id; ?>" class="button radius tiny alert">Borrar</a>
                    </td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="4"><b>Total de registros: </b> <?php echo $total_ventas; ?></td>
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