<?php
  $page_title = 'Lista de Usuarios Colaboradores';
  require_once('includes/load.php');
  global $db;
  $dniE = '';
if (isset($_POST['dni'])) {
  $dniE =$_POST['dni'];

} 
  
  
  if (isset($_POST['buscar']) && ($dniE != null)) {
  
    $result = $db->query("SELECT u.id,Dni,Apellido,Direccion,Telefono,Ref_Nombre,Ref_Celular,name,username,password,g.group_name,status,last_login,correo,tipo_sangre,fecha_nacimiento FROM users u left JOIN user_groups g ON g.group_level=u.user_level WHERE u.user_level<>4 and u.user_level<>3 and u.Dni="."'$dniE'");
    $result_set = $db->while_loop($result);
} else {
  $result_set =  $all_users = find_all_user();
  ;
}
$all_users2 = $result_set;
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $all_users = find_all_user();
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="contenedor">
      <h1>Lista de Usuarios Colaboradores</h1>
      <div class="divancla">
      <i class="fas fa-plus-circle iconancla"></i> 
      <a class="ancla " href="add_user.php">Registrar usuario</a>
      </div>
     
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">

    <div class="container-3">
        <form action="user.php" method="POST">
      <div class="container-3">
        <input type="search" name="dni" id="search" placeholder="Buscar por DNI" />
        <button type="submit" class="btnbuscar" name="buscar"><i class="fa fa-search"></i></button>
      </div>
    </form>

    </div>
  </div>
</div>
</div>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
    
          
          <div class="titu ">
        <strong class="centrar">
        <span>Lista de Usuarios Colaboradores</span>
        </strong>

      </div>
     <div class="panel-body">
       <table class="tablaP  display AllDataTables">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th>Dni</th>
            <th>Nombre/Apellido</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Ref: Nombre</th>
            <th>Ref: Celular</th>
            <th>username</th>
            <th>E-mail</th>
            <th>Fecha de nacimiento</th>
            <th>Tipo de Sangre</th>
            <th class="text-center" style="width: 15%;">Rol de usuario</th>
            <th class="text-center" style="width: 10%;">Estado</th>
            <th style="width: 20%;">Último login</th>
            <th class="text-center">Editar</th>
              <th class="text-center">Eliminar</th>
              <th class="text-center"></th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_users2 as $a_user): ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td><?php echo $a_user['Dni']?></td>
           <td><?php echo $a_user['name']." ".$a_user['Apellido']?></td>
           <td><?php echo $a_user['Direccion']?></td>
           <td><?php echo $a_user['Telefono']?></td>
           <td><?php echo $a_user['Ref_Nombre']?></td>
           <td><?php echo $a_user['Ref_Celular']?></td>
           <td><?php echo $a_user['username']?></td>
           <td><?php echo $a_user['correo']?></td>
           <td><?php echo $a_user['fecha_nacimiento']?></td>
           <td><?php echo $a_user['tipo_sangre']?></td>
           <td class="text-center"><?php echo $a_user['group_name']?></td>
           <td class="text-center">
           <?php if($a_user['status'] === '1'): ?>
            <span class="label label-success"><?php echo "Activo"; ?></span>
          <?php else: ?>
            <span class="label label-danger"><?php echo "Inactivo"; ?></span>
          <?php endif;?>
           </td>
           <td><?php echo read_date($a_user['last_login'])?></td>
           <td class="text-center">
             <div class="btn-group">
                <a href="edit_user.php?id=<?php echo (int)$a_user['id'];?>" class="btn-xs acedit" data-toggle="tooltip" title="Editar">
                  <i class="fas fa-pencil"></i>
               </a>
               </div>
           </td>
           <td class="text-center">
             <div class="btn-group">
                <a href="delete_user.php?id=<?php echo (int)$a_user['id'];?>" class=" btn-xs acdelete" data-toggle="tooltip" title="Eliminar">
                  <i class="fas fa-trash"></i>
                </a>
                </div>
           </td>
           <td></td>
          </tr>
        <?php endforeach;?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>
  <?php include_once('layouts/footer.php'); ?>
