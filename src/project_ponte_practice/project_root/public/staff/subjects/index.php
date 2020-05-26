<?php require_once('../../../private/initialize.php'); ?>

<?php $page_title = "Subjects"; ?>

<?php
  $subject_set = db_query_all_subjects();
?>

<?php 
    include(SHARED_PATH . '/staff_header.php'); 
?>

<div id="content">
    <div>
        <h1>Subject List</h1>
    </div>

    <div>
        <a href="<?php echo url_for('staff/subjects/new.php'); ?>" >Add a new subject</a>
    </div>

    <table class="list">
  	  <tr>
        <th>ID</th>
        <th>Position</th>
        <th>Visible</th>
  	    <th>Name</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while ($subject = mysqli_fetch_assoc($subject_set)) { ?>
        <tr>
          <td><?php echo h($subject['id']); ?></td>
          <td><?php echo h($subject['position']); ?></td>
          <td><?php echo h($subject['visible']) == 1 ? 'true' : 'false'; ?></td>
    	  <td><?php echo h($subject['menu_name']); ?></td>
          <td><a class="action" href="
                <?php 
                  echo url_for("/staff/subjects/show.php?id=".u($subject['id'])); 
                ?>">View</a></td>
          <td><a class="action" href="
                <?php 
                  echo url_for("/staff/subjects/edit.php?id=".u($subject['id'])); 
                ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for("/staff/subjects/show.php"); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>

      <?php db_free_query($subject_set); ?>
  	</table>
</div>

<?php 
    include(SHARED_PATH . '/staff_footer.php'); 
?>