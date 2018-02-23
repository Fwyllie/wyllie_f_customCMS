<?php

  function createUser($fname, $username, $password, $email, $lvllist){
    include('connect.php');
    $crypt =  md5($password);
    $userstring = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$crypt}', '{$email}', NULL, '{$lvllist}', 'no')";

    $userquery = mysqli_query($link, $userstring);
    if($userquery){
      redirect_to('admin_index.php');
    }else{
      $message = "The bugs are taking over, please try again!";
      return $message;
    }
    mysqli_close($link);
  }


 ?>
