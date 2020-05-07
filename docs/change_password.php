<?php
  $page_title = 'Cambiar contraseña';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
?>
<?php $user = current_user(); ?>
<?php
  if(isset($_POST['update'])){

    $req_fields = array('new-password','old-password','id' );
    validate_fields($req_fields);

    if(empty($errors)){

             if(sha1($_POST['old-password']) !== current_user()['password'] ){
               $session->msg('d', "Tu antigua contraseña no coincide");
               redirect('change_password.php',false);
             }

            $id = (int)$_POST['id'];
            $new = remove_junk($db->escape(sha1($_POST['new-password'])));
            $sql = "UPDATE users SET password ='{$new}' WHERE id='{$db->escape($id)}'";
            $result = $db->query($sql);
                if($result && $db->affected_rows() === 1):
                  $session->logout();
                  $session->msg('s',"Inicia sesión con tu nueva contraseña.");
                  redirect('index.php', false);
                else:
                  $session->msg('d',' Lo siento, actualización falló.');
                  redirect('change_password.php', false);
                endif;
    } else {
      $session->msg("d", $errors);
      redirect('change_password.php',false);
    }
  }
?>
<?php include_once('layouts/header.php'); ?> 
<?php echo display_msg($msg); ?>
<div class="row">
  <div class="col-md-12">
    <div class="contenedor">
      <h1>Editar contraseña</h1> 
      <div class="divancla">
      <i class="fas fa-arrow-circle-left iconancla"></i>
      <a class="ancla " href="edit_account.php">Regresar</a>
      </div>
    </div>
    
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="contendoradd">
      <div class="tituaddmiembro">
        <strong class="centrar">
          <span>Editar contraseña</span>
        </strong>
      </div>
      <div class="row">
        <div class="panelcontrasenna">
      <form method="post" action="change_password.php" class="clearfix">
        <div class="form-group">
              <label for="newPassword" class="textadd">Nueva contraseña</label>
              <input type="password" class="form-control add" name="new-password" placeholder="Nueva contraseña">
        </div>
        <div class="form-group">
              <label for="oldPassword" class="textadd">Antigua contraseña</label>
              <input type="password" class="form-control add" name="old-password" placeholder="Antigua contraseña">
        </div>
        <div class="form-group clearfix">
               <input type="hidden" name="id" value="<?php echo (int)$user['id'];?>">
                <button type="submit" name="update" class="btnenviomatri">Cambiar</button>
        </div>
    </form>
    </div>
</div>
</div>
</div>
</div>
<?php include_once('layouts/footer.php'); ?>
