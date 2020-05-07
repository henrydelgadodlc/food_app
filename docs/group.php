<?php
$page_title = 'Lista de grupos';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
global $db;
$dniE = '';
if (isset($_POST['dni'])) {
  $dniE =$_POST['dni'];

} 


if (isset($_POST['buscar']) && ($dniE != null)) {

  $result = $db->query("SELECT id,group_name,group_level,group_status from user_groups where group_level="."'$dniE'");
  $result_set = $db->while_loop($result);
  
}else {
  $result_set =find_all_group();
}
$all_groups2  = $result_set;

?>
<?php
page_require_level(1);
$all_groups =find_all_group();

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
      <h1>Tipos de usuarios</h1>
      <div class="divancla">
        <i class="fas fa-plus-circle iconancla"></i>
        <a class="ancla " href="add_group.php">Registrar nuevo tipo de usuario</a>
      </div>

    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">

    <div class="container-3">
    <form action="group.php" method="POST">
      <div class="container-3">
        <input type="search" name="dni" id="search" placeholder="Buscar por Nivel de Grupo" />
        <button type="submit" class="btnbuscar" name="buscar"><i class="fa fa-search"></i></button>
      </div>
    </form>
    </div>
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">

      <div class="titugrupouser">
        <strong class="centrar">
          <span>Grupos de Usuarios</span>
        </strong>

      </div>
      <div class="panel-body">
        <table class="tablaP  display AllDataTables">
          <thead>
            <tr>
              <th class="text-center" style="width: 50px;">#</th>
              <th>Nombre del grupo</th>
              <th class="text-center" style="width: 20%;">Nivel del grupo</th>
              <th class="text-center" style="width: 15%;">Estado</th>
              <th class="text-center">Editar</th>
              <th class="text-center">Eliminar</th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($all_groups2 as $a_group) : ?>
              <tr>
                <td class="text-center"><?php echo count_id(); ?></td>
                <td><?php echo remove_junk(ucwords($a_group['group_name'])) ?></td>
                <td class="text-center">
                  <?php echo remove_junk(ucwords($a_group['group_level'])) ?>
                </td>
                <td class="text-center">
                  <?php if ($a_group['group_status'] === '1') : ?>
                    <span class="label label-success"><?php echo "Activo"; ?></span>
                  <?php else : ?>
                    <span class="label label-danger"><?php echo "Inactivo"; ?></span>
                  <?php endif; ?>
                </td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_group.php?id=<?php echo (int) $a_group['id']; ?>" class="btn-xs acedit" data-toggle="tooltip" title="Editar">
                      <i class="fas fa-pencil"></i>
                    </a>
                  </div>
                </td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="delete_group.php?id=<?php echo (int) $a_group['id']; ?>" class=" btn-xs acdelete" data-toggle="tooltip" title="Eliminar">
                      <i class="fas fa-trash"></i>
                    </a>
                  </div>
                </td>
                <td></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include_once('layouts/footer.php'); ?>