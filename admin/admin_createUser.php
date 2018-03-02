<?php
	require_once('phpscripts/config.php');
	//confirm_logged_in();

	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password =  trim($_POST['password']);
		$email = trim($_POST['email']);
		$lvllist = $_POST['lvllist'];
		if(empty($lvllist)){
			$message = "Please select a user level.";
		}else{
			$sendMail = sendMessage($email, $username, $password, $link);
		 	$result = createUser($fname, $username, $password, $email, $lvllist);
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Fran's Admin Panel - Create</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div id="createDiv">
		<h2>Create a new user!</h2>
		<?php if(!empty($message)) {echo $message;} ?>
		<form action="admin_createUser.php" method="post">
			<label>First Name:</label><br>
			<input type="text" name="fname" value=""><br><br>
			<label>Username:</label><br>
			<input type="text" name="username" value=""><br><br>
			<label>Password:</label><br>
			<input type="text" name="password" value=""><br><br>
			<label>Email:</label><br>
			<input type="text" name="email" value=""><br><br>
			<select id="selectLevel" name="lvllist">
				<option value="">Select user Level</option>
				<option value="2">Web Admin</option>
				<option value="1">Web Master</option>
			</select><br><br>
			<input id="submitButton2" type="submit" name="submit" value="Create User">
		</form>
	</div>
</body>
</html>
