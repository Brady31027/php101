<?php
   if (!isset($page_title)) {
       $page_title = "ProjectPonteStaff";
   }
?>


<!DOCTYPE html>
<head>
	<title><?php echo $page_title; ?></title>
	<meta charset="utf-8">
	<!-- Maybe add stylesheets here in the future -->
	<!-- <link rel="stylesheets" media="all" href="../stylesheets/staff.css" -->
</head>

<body>
    <header>
    	<h1>ProjectPonteStaff</h1>
    </header>

    <nav>
        <ul>
            <li><a href="<?php echo url_for('staff/index.php') ?>">Menu</a></li>
            <li><a href="<?php echo url_for('/staff/pages/index.php') ?>">Pages</a></li>
            <li><a href="<?php echo url_for('/staff/subjects/index.php') ?>">Subjects</a></li>
        </ul>
    </nav>