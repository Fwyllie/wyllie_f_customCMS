<?php
	require_once('phpscripts/config.php');
	//confirm_logged_in();

		$id = $_SESSION['user_id'];
		$tbl = 'tbl_user';
		$col = 'user_id';
		$popForm = getSingle($tbl, $col, $id);
		$info = mysqli_fetch_array($popForm);
		//echo $info;


	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password =  trim($_POST['password']);
		$email = trim($_POST['email']);
		// $sendMail = sendMessage($email, $username, $password, $link);
		$result = editUser($fname, $username, $password, $email, $id);
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Fran's Admin Panel - Edit</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div id="createDiv">
		<h2>Edit User Info!</h2>
		<?php if(!empty($message)) {echo $message;} ?>
		<form action="admin_editUser.php" method="post">
			<label>First Name:</label><br>
			<input type="text" name="fname" value="<?php  echo $info['user_fname'] ?>"><br><br>
			<label>Username:</label><br>
			<input type="text" name="username" value="<?php  echo $info['user_name'] ?>"><br><br>
			<label>Password:</label><br>
			<input type="text" name="password" value="<?php  echo $info['user_pass'] ?>"><br><br>
			<label>Email:</label><br>
			<input type="text" name="email" value="<?php  echo $info['user_email'] ?>"><br>
			<input id="submitButton2" type="submit" name="submit" value="Edit Account">
		</form>
	</div>
</body>
</html>
