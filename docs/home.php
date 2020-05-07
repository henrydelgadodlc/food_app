<?php
$page_title = 'Home Page';
require_once('includes/load.php');
if (!$session->isUserLoggedIn(true)) {
  redirect('index.php', false);
}
?>
<?php include_once('layouts/header.php'); ?>
<div class="panel panel-default">
  <div class="panel-body">



  
  </div>
</div>
  <?php include_once('layouts/footer.php'); ?>