<?php
	function logIn($username, $password, $ip) {
		require_once('connect.php');
		$username = mysqli_real_escape_string($link, $username);
		$password = mysqli_real_escape_string($link, $password);

		$crypted = md5($password);
		$loginstring = "SELECT * FROM tbl_user WHERE user_name='{$username}' AND user_pass='{$crypted}'";
		$user_set = mysqli_query($link, $loginstring);

		if(mysqli_num_rows($user_set)){
			$founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			$id = $founduser['user_id'];

			$_SESSION['user_id'] = $id;
			$_SESSION['user_name'] = $founduser['user_fname'];
			if(mysqli_query($link, $loginstring)){
				$update = "UPDATE tbl_user SET user_ip = '{$ip}' WHERE user_id={$id}";
				$updatequery = mysqli_query($link, $update);
				$firstLog = $founduser['user_firstLog'];
				$_SESSION['user_firstLog'] = $firstLog;
				
				if($firstLog === 'no'){
					redirect_to("admin_index.php");
				}else if($firstLog === 'yes'){
					redirect_to("admin_editUser.php");
				}
			}
		}else{
			$message = "Username or Password incorrect :(";
			return $message;
		}
		mysqli_close($link);
	}
?>
