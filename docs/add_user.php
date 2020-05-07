<?php
$page_title = 'Agregar usuarios';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
$groups = find_all('user_groups');
?>
<?php
if (isset($_POST['add_user'])) { //nombre del boton

 // $req_fields = array('full-name', 'username', 'password', 'level'); // nombre de los input
  //validate_fields($req_fields); // validacion de los input

  if (empty($errors)) {
    $dni  = $_POST['dni'];
    $name   = $_POST['full-name']; //eliminar espacios de los campos
    $Apellido  = $_POST['apellido'];
    $Direccion  = $_POST['direccion'];
    $Telefono  = $_POST['telefono'];
    $Ref_Nombre  = $_POST['nombre_ref'];
    $Ref_Celular  = $_POST['celular_ref']; 
    $email  = $_POST['email'];
    $fecha_n  = $_POST['fecha_n'];
    $tipo_sa  = $_POST['tipo_sa'];
    $username   = $_POST['dni']; //y almacenado en variables 
    $password   = $_POST['dni'];
    $user_level = $_POST['level'];
    $password = sha1($password); //pasar encriptación 
    $query = "INSERT INTO users ("; //consulta sql porpartes 
    $query .= "Dni,Apellido,Direccion,Telefono,Ref_Nombre,Ref_Celular,name,username,password,user_level,status,correo,tipo_sangre,fecha_nacimiento"; //`Dni``Apellido``Direccion
    $query .= ") VALUES (";
    $query .= " '{$dni}','{$Apellido}','{$Direccion}','{$Telefono}','{$Ref_Nombre}','{$Ref_Celular}','{$name}','{$username}', '{$password}','{$user_level}','1','{$email}','{$tipo_sa}','{$fecha_n}'";
    $query .= ")";
    if ($db->query($query)) {
      //bien 
      $session->msg('s', " usuario registrado");
      redirect('add_user.php', false);
    } else {
      //falló
      $session->msg('d', ' No se pudo registrar el usuario.');
      redirect('add_user.php', false); // ruta a redirecionarsi falla
    }
  } else {
    $session->msg("d", $errors);
    redirect('add_user.php', false); // ruta a redirecionar si todo sale bien 
  }
}
?>
<?php include_once('layouts/header.php'); //cabecera html 
?>
<?php echo display_msg($msg); ?>
<div class="row">
  <div class="col-md-12">
    <div class="contenedor">
      <h1>Agregar Usuario</h1> 
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
          <span>Agregar Usuario</span>
        </strong>
      </div>
      <div class="row">
        <div class="paneladduser">
          <div class="col-md-6">
        <form method="post" action="add_user.php">
          <!--redireccion de envio de datos-->
          <div class="form-group">
            <label class="textadd" for="name">Numero de DNI</label>
            <input type="number" name="dni" class="form-control add" placeholder="" required>
          </div>
          <div class="form-group">
                <label class="textadd" for="name">Nombre</label>
                <input type="text" class="form-control add" name="full-name" placeholder="" required>
            </div>
          <div class="form-group">
            <label class="textadd" for="name">Apellido</label>
            <input type="text" name="apellido" class="form-control add" placeholder="" required>
          </div>
          <div class="form-group">
            <label class="textadd" for="name">Direción</label>
            <input type="text" name="direccion" class="form-control add" placeholder="" required>
          </div>
          <div class="form-group">
            <label class="textadd" for="name">Teléfono</label>
            <input type="text" name="telefono" class="form-control add" placeholder="">
          </div>
          <div class="form-group">
            <label class="textadd" for="name">Nombre del referente</label>
            <input type="text" name="nombre_ref" class="form-control add" placeholder="">
          </div>
          </div>
          <div class="col-md-6">
          <div class="form-group">
            <label class="textadd" for="name">Celular del referente</label>
            <input type="text" name="celular_ref" class="form-control add" placeholder="">
          </div>
          <div class="form-group">
            <label class="textadd" for="name">E-mail</label>
            <input type="text" name="email" class="form-control add" placeholder="" >
          </div>
          <div class="form-group">
            <label class="textadd" for="name">Fecha de nacimiento</label>
            <input type="date" name="fecha_n" class="form-control add" placeholder="">
          </div>
          <div class="form-group">
            <label class="textadd" for="name">Tipo de sangre</label>
            <input type="text" name="tipo_sa" class="form-control add" placeholder="">
          </div>
          <!---<div class="form-group">
            usuario predeterminar como 0 no es 
                <input type="hidden" name="tipo_de_miembro" class="form-control" placeholder="Tipo del miembro" >
            </div>
           
            <div class="form-group"> misma quela del dni
                <label class="textadd" for="username">Usuario</label>
                <input type="text" class="form-control" name="username" placeholder="Nombre de usuario">
            </div>
            <div class="form-group">
                <label class="textadd" for="password">Contraseña</label> misma que la del dni 
                <input type="password" class="form-control" name ="password"  placeholder="Contraseña">
            </div>>-->
            <div class="form-group">
              <label class="textadd" for="level">Rol de usuario</label>
                <select class="form-control  add" name="level">
                  <?php foreach ($groups as $group) : ?>
                   <option value="<?php echo $group['group_level']; ?>"><?php echo ucwords($group['group_name']); ?></option>
                <?php endforeach; ?>
                </select>
                  </div>
            <div class="form-group clearfix">
              <button type="submit" name="add_user" class="btnenviouser">Guardar</button>
              <!--boton de envio -->
            </div>
        </form>
        </div>

</div>
</div>
</div>
</div>
</div>
<?php include_once('layouts/footer.php'); //pie de pagina html 
?>