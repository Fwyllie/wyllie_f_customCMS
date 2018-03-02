<?php
	function logIn($username, $password, $ip) {
		require_once('connect.php');
		$username = mysqli_real_escape_string($link, $username);
		$password = mysqli_real_escape_string($link, $password);

		$crypted = md5($password);
		$loginstring = "SELECT * FROM tbl_user WHERE user_name='{$username}' AND user_pass='{$crypted}'";
		$user_set = mysqli_query($link, $loginstring);

		if(mysqli_num_rows($user_set)){ // username/password found in db
			$founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			$id = $founduser['user_id'];
			$_SESSION['user_id'] = $id;
			$_SESSION['user_name'] = $founduser['user_fname'];
			$cutOffT = 259200; //72 hours
			$diffInT = time() - strtotime($founduser['user_date']);
			if($founduser['user_firstLog'] === 'yes'){ //If they not have logged in and changed their account info before
				if($diffInT > $cutOffT){ //if the time between when the user was created and now is less than 259200 seconds it should let them in
					if(mysqli_query($link, $loginstring)){
						$update = "UPDATE tbl_user SET user_ip = '{$ip}' WHERE user_id={$id}";
						$updatequery = mysqli_query($link, $update);
					}
				redirect_to("admin_editUser.php");
			}else{ // if the time between when the user was created and now is greater than 259200 seconds it should NOT let them in and delete the login credentials
				$loginDelMsg = "Your login has expired";
				return $loginDelMsg;
				$expireString = "DELETE FROM tbl_user WHERE user_id={$id}";
			 	$expireQuery = mysqli_query($link, $expireString);
				}
			}else{ //If they have logged in and changed their account info before they are good to go
				if(mysqli_query($link, $loginstring)){
					$update = "UPDATE tbl_user SET user_ip = '{$ip}' WHERE user_id={$id}";
					$updatequery = mysqli_query($link, $update);
				}
				redirect_to("admin_index.php");
			}
		}else{ // Username/Password does not match db
			$failMessage = "Username or Password incorrect :(";
			return $failMessage;
		}
		mysqli_close($link);
	}
?>
