<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Fran's Admin Panel</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div id="indexDiv">
		<h2 id="indexWelcome">Welcome to your Admin Panel <?php echo $_SESSION['user_name']; ?></h2>
		<a id="createUser" href="admin_createUser.php">Create a new User</a>
		<a id="editButton" href="admin_editUser.php">Edit User</a>
		<a id="delButton" href="admin_deleteUser.php">Delete User</a>
		<a id="signOut" href="phpscripts/caller.php?caller_id=logout">Sign Out</a>
	<div>
</body>
</html>
