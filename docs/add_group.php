<?php
  $page_title = 'Agregar grupo';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  if(isset($_POST['add'])){

   $req_fields = array('group-name','group-level');
   validate_fields($req_fields);

   if(find_by_groupName($_POST['group-name']) === false ){
     $session->msg('d','<b>Error!</b> El nombre de grupo realmente existe en la base de datos');
     redirect('add_group.php', false);
   }elseif(find_by_groupLevel($_POST['group-level']) === false) {
     $session->msg('d','<b>Error!</b> El nombre de grupo realmente existe en la base de datos ');
     redirect('add_group.php', false);
   }
   if(empty($errors)){
           $name = remove_junk($db->escape($_POST['group-name']));
          $level = remove_junk($db->escape($_POST['group-level']));
         $status = remove_junk($db->escape($_POST['status']));

        $query  = "INSERT INTO user_groups (";
        $query .="group_name,group_level,group_status";
        $query .=") VALUES (";
        $query .=" '{$name}', '{$level}','{$status}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"Grupo ha sido creado! ");
          redirect('add_group.php', false);
        } else {
          //failed
          $session->msg('d','Lamentablemente no se pudo crear el grupo!');
          redirect('add_group.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_group.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
<div class="login-page">
    
     <?php echo display_msg($msg); ?>
     <div class="row">
  <div class="col-md-12">
    <div class="contenedor">
      <h1>Agregar tipo de usuario</h1> 
      <div class="divancla">
      <i class="fas fa-arrow-circle-left iconancla"></i>
      <a class="ancla " href="group.php">Regresar</a>
      </div>
    </div>
    
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="contendoradd">
      <div class="tituaddmiembro">
        <strong class="centrar">
          <span>Agregar tipo de usuario</span>
        </strong>
      </div>
      <div class="row">
        <div class="paneladdmatri">
      <form method="post" action="add_group.php" class="clearfix">
        <div class="form-group">
              <label class="textadd" class="textadd" for="name" class="control-label">Nombre del grupo</label>
              <input type="name" class="form-control  add" name="group-name" required>
        </div>
        <div class="form-group">
              <label class="textadd" class="textadd" for="level" class="control-label">Nivel del grupo</label>
              <input type="number" class="form-control add" name="group-level">
        </div>
        <div class="form-group">
          <label class="textadd" class="textadd" for="status">Estado</label>
            <select class="form-control add" name="status">
              <option value="1">Activo</option>
              <option value="0">Inactivo</option>
            </select>
        </div>
        <div class="form-group clearfix">
                <button type="submit" name="add" class="btnenviomatri">Guardar</button>
        </div>
    </form>
    </div>
</div>
</div>
</div>
</div>

<?php include_once('layouts/footer.php'); ?>
