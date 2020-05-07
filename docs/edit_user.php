<?php
$page_title = 'Editar Alumno';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
?>
<?php
$e_user = find_by_id('users', (int) $_GET['id']);
$groups  = find_all('user_groups');
if (!$e_user) {
  $session->msg("d", "Missing user id.");
  redirect('user.php');
}
?>

<?php
//Update User basic info
if (isset($_POST['update'])) {
  if (empty($errors)) {
    $id = (int) $e_user['id'];
    $dni = $_POST['dni'];
    $name = $_POST['name'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $nombre_ref = $_POST['nombre_ref'];
    $celular_ref = $_POST['celular_ref'];
    $email  = $_POST['email'];
    $fecha_n  = $_POST['fecha_n'];
    $tipo_sa  = $_POST['tipo_sa'];
    $username = remove_junk($db->escape($_POST['username']));
    $level = (int) $db->escape($_POST['level']);
    $status   = remove_junk($db->escape($_POST['status']));
    $sql = "UPDATE users SET Dni='{$dni}',name ='{$name}',Apellido ='{$apellido}',Direccion ='{$direccion}'
            ,Telefono='{$telefono}',Ref_Nombre ='{$nombre_ref}',Ref_Celular ='{$celular_ref}'
            ,correo ='{$email}',fecha_nacimiento='{$fecha_n}',tipo_sangre='{$tipo_sa}',username='{$username}'
            ,user_level='{$level}',status='{$status}' WHERE id='{$db->escape($id)}'";
    $result = $db->query($sql);
    if ($result && $db->affected_rows() === 1) {
      $session->msg('s', "Datos del Alumno actualizados correctamente");
      redirect('edit_alumno.php?id=' . (int) $e_user['id'], false);
    } else {
      $session->msg('d', ' Lo siento no se actualizó los datos.');
      redirect('edit_alumno.php?id=' . (int) $e_user['id'], false);
    }
  } else {
    $session->msg("d", $errors);
    redirect('edit_alumno.php?id=' . (int) $e_user['id'], false);
  }
}
?>
<?php
// Update user password
if (isset($_POST['update-pass'])) {
  $req_fields = array('password');
  validate_fields($req_fields);
  if (empty($errors)) {
    $id = (int) $e_user['id'];
    $password = remove_junk($db->escape($_POST['password']));
    $h_pass   = sha1($password);
    $sql = "UPDATE users SET password='{$h_pass}' WHERE id='{$db->escape($id)}'";
    $result = $db->query($sql);
    if ($result && $db->affected_rows() === 1) {
      $session->msg('s', "Se ha actualizado la contraseña del usuario. ");
      redirect('edit_alumno.php?id=' . (int) $e_user['id'], false);
    } else {
      $session->msg('d', 'No se pudo actualizar la contraseña de usuario..');
      redirect('edit_alumno.php?id=' . (int) $e_user['id'], false);
    }
  } else {
    $session->msg("d", $errors);
    redirect('edit_alumno.php?id=' . (int) $e_user['id'], false);
  }
}

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
<div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-12">
    <div class="contenedor">
      <h1>Actualizar datos de: <?php echo $e_user['name'] . " " . $e_user['Apellido']; ?></h1>
      <div class="divancla">
        <i class="fas fa-arrow-circle-left iconancla"></i>
        <a class="ancla " href="user.php">Regresar</a>
      </div>
    </div>

  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="contendoradd">
      <div class="tituaddmiembro">
        <strong class="centrar">
          <span>Editar Usuario</span>
        </strong>
      </div>
      <div class="row">
        <div class="paneledituser">
          <div class="col-md-6">

            <form method="post" action="edit_alumno.php?id=<?php echo (int) $e_user['id']; ?>" class="clearfix">
              <div class="form-group">
                <label for="name">Numero de DNI</label>
                <input type="number" name="dni" class="form-control" placeholder="" required value="<?php echo $e_user['Dni']; ?>">
              </div>
              <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" placeholder="" required value="<?php echo $e_user['name']; ?>">
              </div>
              <div class="form-group">
                <label for="name">Apellido</label>
                <input type="text" name="apellido" class="form-control" placeholder="" required value="<?php echo $e_user['Apellido']; ?>">
              </div>
              <div class="form-group">
                <label for="name">Direción</label>
                <input type="text" name="direccion" class="form-control" placeholder="" required value="<?php echo ucwords($e_user['Direccion']); ?>">
              </div>
              <div class="form-group">
                <label for="name">Teléfono</label>
                <input type="text" name="telefono" class="form-control" placeholder="" value="<?php echo $e_user['Telefono'] ?>">
              </div>
              <div class="form-group">
                <label for="name">Nombre del referente</label>
                <input type="text" name="nombre_ref" class="form-control" placeholder="" value="<?php echo $e_user['Ref_Nombre']; ?>">
              </div>
              <div class="form-group">
                <label for="name">Celular del referente</label>
                <input type="text" name="celular_ref" class="form-control" placeholder="" value="<?php echo $e_user['Ref_Celular']; ?>">
              </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="username" class="control-label">Usuario</label>
              <input type="text" class="form-control" name="username" value="<?php echo remove_junk(ucwords($e_user['username'])); ?>">
            </div>
            <div class="form-group">
              <label for="name">E-mail</label>
              <input type="text" name="email" class="form-control" placeholder="" value="<?php echo $e_user['correo']; ?>">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="name">Fecha de nacimiento</label>
              <input type="date" name="fecha_n" class="form-control" placeholder="" value="<?php echo $e_user['fecha_nacimiento']; ?>">
            </div>
            <div class="form-group">
              <label for="name">Tipo de sangre</label>
              <input type="text" name="tipo_sa" class="form-control" placeholder=" " value="<?php echo $e_user['tipo_sangre']; ?>">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="level">Rol de usuario</label>
              <select class="form-control" name="level">
                <?php foreach ($groups as $group) : ?>
                  <option <?php if ($group['group_level'] === $e_user['user_level']) echo 'selected="selected"'; ?> value="<?php echo $group['group_level']; ?>"><?php echo ucwords($group['group_name']); ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="status">Estado</label>
              <select class="form-control" name="status">
                <option <?php if ($e_user['status'] === '1') echo 'selected="selected"'; ?>value="1">Activo</option>
                <option <?php if ($e_user['status'] === '0') echo 'selected="selected"'; ?> value="0">Inactivo</option>
              </select>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group clearfix">
                  <button type="submit" name="update" class="btnenviouseredit">Actualizar</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6" >
            <div class="panelcontra">
              
            <div>
              <strong>
                <span class="glyphicon glyphicon-th"></span>
                Actualizar contraseña de: <?php echo $e_user['name'] . " " . $e_user['Apellido']; ?>
              </strong>
            </div>
            <div >
              <form action="edit_user.php?id=<?php echo (int) $e_user['id']; ?>" method="post" class="clearfix">
                <div class="form-group">
                  
                  <input type="password" class="form-control" name="password" placeholder="Ingresa la nueva contraseña" required>
                </div>
                <div class="form-group clearfix">
                  <button type="submit" name="update-pass" class="btn btn-danger pull-right">Cambiar</button>
                </div>
              </form>
            </div>
          </div>
          </div>
        </div>

        </form>
      </div>
    </div>
  </div>

  <!-- Change password form -->


</div>
<?php include_once('layouts/footer.php'); ?>