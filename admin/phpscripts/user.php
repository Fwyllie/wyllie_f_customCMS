<?php

  function createUser($fname, $username, $password, $email, $lvllist){
    include('connect.php');
    $userstring = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$password}', '{$email}', NULL, '{$lvllist}', 'no')";
    // echo $userstring;
    //
    $userquery = mysqli_query($link, $userstring);
    if($userquery){
      redirect_to('admin_index.php');
    }else{
      $message = "You hired a dud. Please fire them immediately";
      return $message;
    }
    mysqli_close($link);
  }


 ?>
