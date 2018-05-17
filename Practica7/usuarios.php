<?php 

include_once('utilities.php');

if($usuarios!=null)
  $total_usuarios = count($usuarios);
else
  $total_usuarios = 0; // De lo contrario se asigna 0

?>

<?php require_once('header.php'); ?>
  <div class="row" style="text-align: right;">
    <a href="usuario-agregar.php" style="border-radius: 15px;" class="button success">Nuevo Usuario</a>
  </div>
  <div class="row">
      <?php // Seccion para mostrar usuarios ?>
      <div class="large-12 columns">
        <h3>Usuarios</h3>
          <p>Lista</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <?php if($total_usuarios!=0){ ?>
              <table>
                <thead>
                  <tr>
                    <th width="200">Id</th>
                    <th width="250">Nombre</th>
                    <th width="250">Apellidos</th>
                    <th width="250">User Name</th>
                    <th width="250">Password</th>
                    <th width="250">E-mail</th>
                    <th width="250" style="text-align: center;">Acción</th>
                    <th width="250" style="text-align: center;">Borrar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($usuarios as $id => $user){ ?>
                  <tr>
                    <td><?php echo $user->id ?></td>
                    <td><?php echo $user->nombre ?></td>
                    <td><?php echo $user->apellidos ?></td>
                    <td><?php echo $user->user_name ?></td>
                    <td><?php echo $user->password ?></td>
                    <td><?php echo $user->email ?></td>
                    <td style="text-align: center;">
                      <a href="./usuario.php?id=<?php echo $id; ?>" class="button radius tiny info">Detalles</a>
                    </td>
                    <td style="text-align: center;">
                      <a href="./usuario-eliminar.php?id=<?php echo $id; ?>" class="button radius tiny alert">Borrar</a>
                    </td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="4"><b>Total de registros: </b> <?php echo $total_usuarios; ?></td>
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