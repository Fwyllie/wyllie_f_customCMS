<?php
	require_once('phpscripts/config.php');
	//confirm_logged_in();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Franflix Admin Panel</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<a id="signOut" href="phpscripts/caller.php?caller_id=logout">Sign Out</a>
	<div id="indexDiv">
		<h2 id="indexWelcome">Welcome <?php echo $_SESSION['user_name']; ?>!</h2>
		<a id="addMovieButton" href="admin_addMovie.php">Add Movie</a>
		<a href="admin_selectEdit.php">Edit Movie</a>
		<a id="delButton" href="admin_deleteMovie.php">Delete Movie</a>
	<div>
</body>
</html>
