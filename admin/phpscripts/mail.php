<?php
	function sendMessage($email, $username, $password){
		$to = $email;
		$msg = "Username:". $username. "\n\nPassword:". $password. "\n\nLogin Here: http://localhost:8888/Wyllie_F_3014_r2/admin/admin_login" ;
		mail($to, $msg);
	}
?>
