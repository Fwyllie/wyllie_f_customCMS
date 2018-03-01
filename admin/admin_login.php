<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

	require_once('phpscripts/config.php');
	$ip = $_SERVER['REMOTE_ADDR'];
	if(isset($_POST['submit'])){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if($username !== "" && $password !== ""){
			$result = logIn($username, $password, $ip);
			$message = $result;
		}else{
			$message = "Please fill out the required fields.";
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Fran's Admin Panel</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div id="loginForm">
	<h1>Login to Fran's amazing Admin Panel</h1>
	<?php if(!empty($message)){ echo $message;} ?><br>
	<form action="admin_login.php" method="post">
		<label>Username:</label><br>
		<input type="text" name="username" value="">
		<br>
		<label>Password</label><br>
		<input type="password" name="password" value="">
		<br>
		<input id="submitButton" type="submit" name="submit" value="Login!">
	</form>
	</div>

</body>
</html>
