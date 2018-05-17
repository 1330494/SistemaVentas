<?php 
include_once 'utilities.php';
$fecha = fecha_actual();

$sales = getVentasFecha($fecha);
if ($sales!=null) {
	$total_reg = 0;
}

if (isset($_POST['ver'])) {
	if (isset($_POST['fecha'])) {
		$fecha = $_POST['fecha'];
	}
}
            				

 ?>
<?php include_once 'header.php'; ?>
<br>
<div class="row">
	<div class="large-12 columns">
		<h3>Ventas por fecha</h3>
        <div class="section-container tabs" data-section>
          	<section class="section">
            	<div class="content" data-slug="panel1">
            		<div class="row">
              		</div>
            		<div class="row">
            			<table>
            				<tbody>
            					<tr>
            						<td>
            							<label for="">Fecha:</label>
            						</td>
            						<td>
            							<form method="POST">
            							<input style="width: 146px;" type="date" name="fecha" value="<?php echo $fecha ?>"> 
            						</td>
            						<td>
            							<input class="button info" type="submit" name="ver" value="Mostrar">
            							</form>
            						</td>
            					</tr>
            				</tbody>
            			</table>
            			<?php if($total_reg!=0){ ?>
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
			                  <?php foreach($sales as $id => $venta){ ?>
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
			                    <td colspan="4"><b>Total de registros: </b> <?php echo $total_reg; ?></td>
			                  </tr>
			                </tbody>
			              </table>
			              <?php }else{ ?>
			              No hay registros
			              <?php } ?>
            		</div>
            	</div>
          	</section>
        </div>
	</div>
</div>
<?php include_once 'header.php'; ?>