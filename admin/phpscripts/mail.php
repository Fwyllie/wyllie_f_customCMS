<?php
	function sendMessage($email, $username, $password){
		$to = $email;
		$subject = "Admin Panel Login Credentials";
		$msg = "Username:". $username. "\n\nPassword:". $password. "\n\nAdmin Panel Login Page: http://localhost:8888/Wyllie_F_3014_r2/admin/admin_login" ;
		mail($to, $subject, $msg);
		redirect_to("admin_index.php");
		echo "User create successfully, email has been sent with login information.";
	}
?>
