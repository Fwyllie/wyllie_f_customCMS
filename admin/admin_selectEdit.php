<?php
	require_once('phpscripts/config.php');
	// confirm_logged_in();
	$tbl = 'tbl_movies';
	$movies = getAll($tbl);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Fran's Admin Panel - Edit</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<a href="admin_index.php" class="homeButton">Home!</a>
	<div id="selEditDiv">
	<h2>Select a Movie to Edit</h2>
	<?php
		while($row = mysqli_fetch_array($movies)){
			echo "<div id=\"moviesEdit\"><p id=\"editName\">{$row['movies_title']}</p><a id=\"editButton\" href=\"admin_editMovie.php?id={$row['movies_id']}\">Edit</a></div> ";
		}
	 ?>
</div>
</body>
</html>
