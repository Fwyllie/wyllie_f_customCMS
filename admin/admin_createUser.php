<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();

	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password =  trim($_POST['password']);
		$email = trim($_POST['email']);
		if(empty($email)){
			$message = "Please create an email!";
		}else{
		 	$result = createUser($fname, $username, $password, $email);
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Fran's Admin Panel - Create User</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body id="add">
	<a href="admin_index.php" class="homeButton">Home!</a>
	<div id="createDiv">
		<h2>Create a new user!</h2>
		<?php if(!empty($message)) {echo $message;} ?>
		<form  id="addForm" action="admin_createUser.php" method="post">
			<label>First Name:</label><br>
			<input type="text" name="fname" value=""><br><br>
			<label>Username:</label><br>
			<input type="text" name="username" value=""><br><br>
			<label>Password:</label><br>
			<input type="text" name="password" value=""><br><br>
			<label>Email:</label><br>
			<input type="text" name="email" value=""><br><br>
			<input id="submitButton" type="submit" name="submit" value="Create User">
		</form>
	</div>
</body>
</html>
