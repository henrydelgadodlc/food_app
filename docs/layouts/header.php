<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->

<?php
require_once('includes/load.php');
global $db;


$user = current_user(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <title></title>
  <meta charset="UTF-8">
  <!-- FONT AWESOEM -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
</head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
<script src="js/sweet-alert.min.js"></script>
<link rel="stylesheet" href="css/sweet-alert.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
<link rel="stylesheet" href="css/style.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
  window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')
</script>
<script src="js/modernizr.js"></script>
<!--<script src="js/bootstrap.min.js"></script>-->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/main.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
<!--<link rel="stylesheet" href="libs/css/main.css" />-->
<link rel="stylesheet" href="libs/css/estilos.css" />
<link rel="stylesheet" href="libs/css/starter-template.css" />
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
<script src="js/popper.min.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script>


<body>
<div class="loader"></div>
  <?php if ($session->isUserLoggedIn(true)) :
  ?>
    <div class="navbar-lateral full-reset">
      <div class="visible-xs font-movile-menu mobile-menu-button"></div>
      <div class="full-reset container-menu-movile custom-scroll-containers">
        <div class="logo full-reset all-tittles">
          <i class="visible-xs fas fa-times-circle pull-left mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i>
        </div>
        <div class="full-reset" style=" padding: 10px 0; color:#16a085;">
          <figure>
            <img src="assets/img/logo.png" alt="sistema" class="img-responsive center-box" style="width:55%;">
          </figure>

        </div>
        <div class="full-reset nav-lateral-list-menu">

          <?php if ($user['user_level'] === '1') : ?>
            <!-- admin menu -->
            <?php include_once('admin_menu.php'); ?>

          <?php elseif ($user['user_level'] === '2') : ?>
            <!-- Special user -->
            <?php include_once('special_menu.php'); ?>

          <?php elseif ($user['user_level'] === '3') : ?>
            <!-- User menu -->
            <?php include_once('user_menu.php'); ?>

          <?php elseif ($user['user_level'] === '4') : ?>
            <!-- Special user -->
            <?php include_once('special_menu.php'); ?>

          <?php elseif ($user['user_level'] === '5') : ?>
            <!-- Special user -->
            <?php include_once('special_menu.php'); ?>

          <?php endif; ?>

        </div>
      </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">
      <nav class=" navbar-user-top justify-content-end navbar navbar-expand-md navbar-light mt-3 py-4">
        <ul class="nav-lateral-list-men barra">
          <figure href="#" data-toggle="dropdown" class="dropdown">
            <img src="uploads/users/<?php echo $user['image']; ?>" alt="user-picture" class="img-responsive img-circle center-box">
          </figure>
          <div class="dropdown-menu dropdown-menu-right">
            <a href="#" class="dropdown-item tooltips-general btn-help" data-href="edit_account.php" data-placement="bottom" title="Configuración del Perfil">
              <i class="fas fa-sliders-h-square"></i>
            </a>
            <a href="#" class="dropdown-item tooltips-general exit-system-button" data-href="logout.php" data-placement="bottom" title="Salir del sistema">
              <i class="fas fa-times-circle"></i>
            </a>
          </div>
          <li style="color:#004684;">
            <?php echo remove_junk(ucfirst($user['name'])); ?>
          </li>

          <li class="mobile-menu-button visible-xs" style="float: left !important; border-left:1%;">
            <i class="far fa-angle-double-right"></i>
          </li>

          <script src="https://code.jquery.com/jquery-2.1.1.min.js" crossorigin="anonymous"></script>
          <script>
            window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')
          </script>

        </ul>
      </nav>
    <?php endif; ?>

    <div class="container">
      <div class="page-header">
        <?php /*if (!empty($page_title))
                    echo remove_junk($page_title);
                  elseif (!empty($user))
                    echo ucfirst($user['name']);
                  else echo "Sistema para Nueva Acropolis"; */ ?>