<?php
include_once 'utilities.php';
session_start();
if (!$_SESSION['username']) {
  header('Location: login/login.php');
}

?>
<?php require_once('header.php'); ?>
<div class="row">
	<?php // Seccion para mostrar concentrado de la tabla ?>
      <div class="large-12 columns">
        <h3>Total</h3>
          <p>Concentrado</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" id="content" data-slug="panel1">
              <div class="row">
              </div>

              <table>
                <thead>
                  <tr>
                    <th id="th1" style="text-align: center;">Usuarios</th>
                    <th id="th2" style="text-align: center;">Productos</th>
                    <th id="th3" style="text-align: center;">Ventas</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="text-align: center;"><?php echo $concentrados['USERS'] ?></td>
                    <td style="text-align: center;"><?php echo $concentrados['PRODUCTS'] ?></td>
                    <td style="text-align: center;"><?php echo $concentrados['SALES'] ?></td>
                    
                  </tr>
                </tbody>
              </table>

            </div>
          </section>
        </div>
      </div>
</div>
<script type="text/javascript">
	// Diseño de la tabla
 	var content = document.getElementById('content');
 	for (var i = 1; i < 4; i++) {
 		var th = document.getElementById('th'+i);
 		th.style.width = content.offsetWidth/3+'px';
 		th.style.height = '25px';
 	}
</script>
<?php require_once('footer.php'); ?>