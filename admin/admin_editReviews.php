<?php
	require_once('phpscripts/config.php');
	$id = $_GET['id'];
	$reviews = reviewResults($id);
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
		while($row = mysqli_fetch_array($reviews)){
			echo "<div class=\"delRevDiv\"><p class=\"delRevName\">{$row['reviews_name']}</p><a class=\"delButton\" href=\"phpscripts/caller.php?caller_id=deleteRev&id={$row['reviews_id']}\">Delete</a></div> ";
		}
	?>
</div>

</body>
</html>
