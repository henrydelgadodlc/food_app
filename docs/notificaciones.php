<?php
$page_title = 'Home Page';
require_once('includes/load.php');
if (!$session->isUserLoggedIn(true)) {
  redirect('index.php', false);
}
?>
<?php include_once('layouts/header.php'); ?>
<div class="panel-default">
  <div class="panel-body">
    <!--titulo de la pagina-->
    <div class="titulo">
      <h4>Notificaciones</h4>
      <i class="fas fa-bell"></i>
    </div>
    <!--fin del titulo de la pagina-->
    <!--formulario-->

  </div>

  <div class="panel-form" class="col-12">
    <div class="titulo-formulario-notificaciones">
      <h4>Detalles del usuario</h4>
    </div>
    <div class="col-md-4">
      <div class=" upload">
        <img class="img-circle img-size-2 uploadimg" src="uploads/users/<?php echo $user['image']; ?>" class="img-responsive " alt="">
      </div>
    </div>
    <form class="formulario col-md-8" action="">
      <div class="row">
        <div class="col-md-12">
          <div class="input-group">
            <label class="textadd" for="name">Nombres y apllidos</label>
            <input type="text" name="dni" class="add" placeholder="" required>
          </div><!-- /input-group -->
        </div><!-- /.col-md-12.-->
      </div><!-- /.row -->
      <div class="row ">
        <div class="col-md-6 espacio">
          <div class="input-group">
            <label class="textadd" for="name">Numero de DNI</label>
            <input type="number" name="dni" class="add" placeholder="" required>
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
       
        <div class="col-md-6 espacio">
          <div class="input-group">
            <label class="textadd" for="name">celular</label>
            <input type="number" name="dni" class="add" placeholder="" required>
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
      </div><!-- /.row -->
      <div class="row espacio">
        <div class="col-md-12">
          <div class="input-group">
            <label class="textadd" for="name">Dirección</label>
            <input type="text" name="dni" class="add" placeholder="" required>
          </div><!-- /input-group -->
        </div><!-- /.col-md-12.-->
      </div><!-- /.row -->
      <div class="row espacio">
        <div class="col-md-12">
          <div class="input-group">
            <label class="textadd" for="name">Pedido Realizado</label>
            <input type="text" name="dni" class="add" placeholder="" required>
          </div><!-- /input-group -->
        </div><!-- /.col-md-12.-->
      </div><!-- /.row -->
      <div class="row">
        <div class="col-md-8 espacio">
          <div class="input-group">
            <label class="textadd" for="name">Agregados</label>
            <input type="text" name="dni" class="add" placeholder="" required>
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
        <div class="col-md-4 espacio">
          <div class="input-group">
            <label class="textadd" for="name">Total a Pagar</label>
            <input type="number" name="dni" class="add" placeholder="" required>
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
      </div><!-- /.row -->
    </form>
  </div>
  <!-- final formulario-->
  <div class="regresar">
    
     <a href=""><i class="fas fa-chevron-circle-left"></i></a>
    
  </div>
</div>
<?php include_once('layouts/footer.php'); ?>