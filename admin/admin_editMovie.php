<?php
	require_once('phpscripts/config.php');
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Franflix Admin Panel - Edit</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
<a class="homeButton" href="admin_index.php">Home</a>
<div class="editMovieDiv">
	<h2>Edit Movie!</h2>
	<?php
		$tbl = "tbl_movies";
		$col = "movies_id";
		$id = $_GET['id'];
		echo single_edit($tbl, $col, $id);
	?>
</div>

</body>
</html>
