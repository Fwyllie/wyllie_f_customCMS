<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
	$tbl = 'tbl_user';
	$col = 'user_fname';
	$movies = getAll($tbl, $col);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Franflix Admin Panel - Delete User</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<a href="admin_index.php" class="homeButton">Home</a>
	<div id="deleteDiv">
	<h2>Delete a User</h2>
	<?php
		while($row = mysqli_fetch_array($movies)){
			echo "<div class=\"delItemDiv\"><p class=\"delName\">{$row['user_fname']}</p><a class=\"delButton\" href=\"phpscripts/caller.php?caller_id=deleteUser&id={$row['user_id']}\">Delete</a></div> ";
		}
	 ?>
</div>
</body>
</html>
