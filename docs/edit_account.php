<?php
$page_title = 'Editar Cuenta';
require_once('includes/load.php');
page_require_level(3);
?>
<?php
//update user image
if (isset($_POST['submit'])) {
  $photo = new Media();
  $user_id = (int) $_POST['user_id'];
  $photo->upload($_FILES['file_upload']);
  if ($photo->process_user($user_id)) {
    $session->msg('s', 'La foto fue subida al servidor.');
    redirect('edit_account.php');
  } else {
    $session->msg('d', join($photo->errors));
    redirect('edit_account.php');
  }
}
?>
<?php
//update user other info
if (isset($_POST['update'])) {
  $req_fields = array('name', 'username');
  validate_fields($req_fields);
  if (empty($errors)) {
    $id = (int) $_SESSION['user_id'];
    $name = remove_junk($db->escape($_POST['name']));
    $username = remove_junk($db->escape($_POST['username']));
    $sql = "UPDATE users SET name ='{$name}', username ='{$username}' WHERE id='{$id}'";
    $result = $db->query($sql);
    if ($result && $db->affected_rows() === 1) {
      $session->msg('s', "Cuenta actualizada. ");
      redirect('edit_account.php', false);
    } else {
      $session->msg('d', ' Lo siento, actualización falló.');
      redirect('edit_account.php', false);
    }
  } else {
    $session->msg("d", $errors);
    redirect('edit_account.php', false);
  }
}
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-12">
    <div class="contenedor">
      <h1>Configurar mi usuario</h1>
      <div class="divancla">
        <i class="fas fa-arrow-circle-left iconancla"></i>
        <a class="ancla " href="index.php">Regresar</a>
      </div>
    </div>

  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="contendoradd">

      <div class="row">

        <div class="col-md-6">
          <div class="panelfoto">
            <div class="colorblanco">
              <div class="titulofoto">
                <h2>Cambiar mi foto</h2>
              </div>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-4 upload">
                  <img class="img-circle img-size-2 uploadimg" src="uploads/users/<?php echo $user['image']; ?>" class="img-responsive center-box " alt="">
                </div>
                <div class="col-md-8 subir">
                  <form class="form" action="edit_account.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <!--Campo ficticio para simular el path del archivo-->
                      <input disabled="disabled" type="text"  id="url-archivo" />
                      <!-- label para simular el boton “seleccionar archivo”-->
                        <label class="cargar">
                        Seleccionar<span>
                            <!-- Campo original file -->
                            <input type="file" name="file_upload" multiple="multiple" id="archivo" />
                          </span>
                        </label>

                        <script>
                          $(document).ready(function() {
                            /* En el change del campo file, cambiamos el val del campo ficticio por el del verdadero */
                            $('#archivo').change(function() {
                              $('#url-archivo').val($(this).val());
                            });
                          });
                        </script>


                    </div>
                    <div class="form-group">
                      <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                      <button type="submit" name="submit" class="btnsubirfoto">Cambiar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panelfotodos">
          <div class="tituedidmi">
        <strong class="centrar">
          <span>Editar mi Usuario</span>
        </strong>
      </div>
            <div class="panelmi">
              <form method="post" action="edit_account.php?id=<?php echo (int) $user['id']; ?>" class="clearfix">
                <div class="form-group">
                  <label for="name"class="textadd">Nombres</label>
                  <input type="name" class="form-control add" name="name" value="<?php echo remove_junk(ucwords($user['name'])); ?>">
                </div>
                <div class="form-group">
                  <label for="username" class="textadd">Usuario</label>
                  <input type="text" class="form-control add" name="username" value="<?php echo remove_junk(ucwords($user['username'])); ?>">
                </div>
                <div class="form-group clearfix">
                  <a href="change_password.php" title="change password" class="btnsubirfotouno">Cambiar contraseña</a>
                  <button type="submit" name="update" class="btnsubirfotodos">Actualizar</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>



<?php include_once('layouts/footer.php'); ?>