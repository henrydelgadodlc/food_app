<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>
<?php include_once('layouts/headerLogin.php'); ?>

<body>


<div class="login-box">
    <div class="avatar">
       Iniciar Sesión 
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="auth.php" >
        <div class="uno">
        <i class="fas fa-user form-control-feedback"></i>
              <input type="text" class="form-control centraricon" name="username" placeholder="Usuario">
        </div>
        <div class="dos">
        <i class="fas fa-key form-control-feedback"></i>
            <input type="password" name= "password" class="form-control centraricon" placeholder="Contraseña">
        </div>
        <div class="">
                
                <input type="submit" class="btn btn-info  btn" value="Ingresar">
        </div>
    </form>
</div>
</body>
<?php include_once('layouts/footerLogin.php'); ?>
