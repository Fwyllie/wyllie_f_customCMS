<?php
	require_once('phpscripts/config.php');
	// confirm_logged_in();
	$tbl = 'tbl_user';
	$users = getAll($tbl);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Fran's Admin Panel - Delete User</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<a href="admin_index.php" id="homebutton">Home!</a>
	<div id="deleteDiv">
	<h2>It's a beautiful day to ruin some lives.</h2>
	<?php
		while($row = mysqli_fetch_array($users)){
			echo "<div id=\"fireItem\"><p id=\"fireName\">{$row['user_fname']}</p><p id=\"fireButtonDiv\"><a id=\"fireButton\" href=\"phpscripts/caller.php?caller_id=delete&id={$row['user_id']}\">Goodbye</a></p></div> ";
		}
	 ?>
</div>
</body>
</html>
