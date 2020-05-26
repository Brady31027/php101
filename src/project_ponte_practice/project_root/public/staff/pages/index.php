<?php require_once('../../../private/initialize.php'); ?>

<?php $page_title = "Pages"; ?>

<?php
  $page_set = db_query_all_pages();
?>

<?php 
    include(SHARED_PATH . '/staff_header.php'); 
?>

<div id="content">
    <div>
        <h1>Page List</h1>
    </div>

    <div>
        <a href="<?php echo url_for('staff/pages/new.php'); ?>" >Add a new page</a>
    </div>
    
    <table class="list">
  	  <tr>
        <th>ID</th>
        <th>Subject ID</th>
        <th>Position</th>
        <th>Visible</th>
  	    <th>Name</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while ($page = mysqli_fetch_assoc($page_set)) { ?>
        <tr>
          <td><?php echo h($page['id']); ?></td>
          <td><?php echo h($page['subject_id']); ?></td>
          <td><?php echo h($page['position']); ?></td>
          <td><?php echo h($page['visible']) == 1 ? 'true' : 'false'; ?></td>
    	  <td><?php echo h($page['menu_name']); ?></td>
          <td><a class="action" href="
              <?php 
                  echo url_for("/staff/pages/show.php?id=".u($page['id'])); 
              ?>">View</a></td>
          <td><a class="action" href="<?php 
               echo url_for("/staff/pages/edit.php?id=".u($page['id']));  
               ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for("/staff/pages/show.php"); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>

      <?php db_free_query($page_set); ?>

  	</table>
</div>

<?php 
    include(SHARED_PATH . '/staff_footer.php'); 
?>