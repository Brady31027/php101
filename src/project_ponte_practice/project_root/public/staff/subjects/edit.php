<?php 
    require_once('../../../private/initialize.php');

    if (!isset($_GET['id'])) {
        redirect_to(url_for('/staff/subjects/index.php'));
    }
    $id = $_GET['id'];
    $menu_name = '';
    $position = '';
    $visible = '';

    if (is_post_request()) {
        $menu_name = $_POST['menu_name'] ?? '';
        $position = $_POST['position'] ?? '';
        $visible = $_POST['visible'] ?? '';

        echo "Form Parameters <br />";
        echo "Menu name = ". $menu_name . "<br />";
        echo "Position = ". $position . "<br />";
        echo "Visible = ". $visible . "<br />";
    } else {
        // redirect_to(url_for('/staff/subjects/new.php'));
    }
?>

<?php 
    include(SHARED_PATH . '/staff_header.php'); 
?>

<div id="content">

<div>
<h1>Edit Subject</h1>
</div>

<div>
    <a href="<?php echo url_for('staff/subjects/index.php'); ?>" >Back to Subjects Table </a>
</div>

<form action="<?php echo url_for('staff/subjects/edit.php?id='.h(u($id))); ?>" method="post">
    <dl>
      <dt>Menu Name</dt>
      <dd><input type="text" name="menu_name" value="<?php echo $menu_name; ?>" /> </dd>
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
        <input type="submit" value="Edit Subject" />
    </div>
<form>

</div>

<?php 
    include(SHARED_PATH . '/staff_footer.php'); 
?>