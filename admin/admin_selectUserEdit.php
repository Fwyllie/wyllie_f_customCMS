<?php
	require_once('phpscripts/config.php');
	// confirm_logged_in();
	$tbl = 'tbl_user';
	$col = 'user_fname';
	$users = getAll($tbl, $col);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Fran's Admin Panel - Edit User</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<a href="admin_index.php" class="homeButton">Home!</a>
	<div id="selEditDiv">
	<h2>Select a User to Edit</h2>
	<?php
		while($row = mysqli_fetch_array($users)){
			echo "<div id=\"usersEdit\"><p id=\"editName\">{$row['user_fname']}</p>
			<a id=\"editButton\" href=\"admin_editUser.php?id={$row['user_id']}\">Edit Movie Details</a>
			</div> ";
		}
	 ?>
</div>
</body>
</html>
