<?php require_once('../../../private/initialize.php'); ?>

<div>
    <a href="<?php echo url_for('staff/pages/index.php'); ?>" >Back to Page Table </a>
</div>

<?php
  $id = h(isset($_GET['id'])? $_GET['id']: '1');
  $position = h($_GET['position']?? '1');
  echo "this is show.php for id =". $id. ", position = ". $position;
?>
