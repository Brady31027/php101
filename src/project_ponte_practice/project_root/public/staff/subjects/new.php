<?php require_once('../../../private/initialize.php'); 

$test = $_GET['test'] ?? '';
if ($test == '404') {
    error_404();
} elseif ($test == '500') {
    error_500();
} elseif ($test == 'redirect') {
    redirect_to(url_for('staff/subjects/index.php'));
    exit;
} else {
    //echo 'No error';
}
?>

<?php 
    include(SHARED_PATH . '/staff_header.php'); 
?>

<div id="content">

<div>
<h1>New Subject</h1>
</div>

<div>
    <a href="<?php echo url_for('staff/subjects/index.php'); ?>" >Back to Subjects Table </a>
</div>

<form action="<?php echo url_for('staff/subjects/create.php')?>" method="post">
    <dl>
      <dt>Menu Name</dt>
      <dd><input type="text" name="menu_name" value="" /> </dd>
    </dl>

    <dl>
      <dt>Position</dt>
      <dd>
        <select name="position">
          <option value="1">1</option> 
        </select>
      </dd>
    </dl>

    <dl>
      <dt>Visible</dt>
        <dd>
          <!-- 多放一個同名的 hidden tag，告訴 form 無論如何要把 visible 這個 attribute 送出去 
               這是 checkbox + form 常見的 workaround
          -->
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" />
        </dd>
    </dl>
    <div id="operations">
        <input type="submit" value="Create Subject" />
    </div>
<form>

</div>

<?php 
    include(SHARED_PATH . '/staff_footer.php'); 
?>