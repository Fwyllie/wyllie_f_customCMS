<?php
	require_once('phpscripts/config.php');
	// confirm_logged_in();
	$tbl = 'tbl_movies';
	$col = 'movies_title';
	$movies = getAll($tbl, $col);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Franflix Admin Panel - Delete</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<a href="admin_index.php" class="homeButton">Home</a>
	<div id="deleteDiv">
	<h2>Delete a Movie.</h2>
	<?php
		while($row = mysqli_fetch_array($movies)){
			echo "<div class=\"delItemDiv\"><p class=\"delName\">{$row['movies_title']}</p><a class=\"delButton\" href=\"phpscripts/caller.php?caller_id=deleteMov&id={$row['movies_id']}\">Delete</a></div> ";
		}
	 ?>
</div>
</body>
</html>
