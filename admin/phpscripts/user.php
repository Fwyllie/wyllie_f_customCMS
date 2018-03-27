<?php

  function createUser($fname, $username, $password, $email, $lvllist){
    include('connect.php');
    $crypt =  md5($password);
    $userstring = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$crypt}', '{$email}', NULL, '{$lvllist}', 'no', 'no')";
    $userquery = mysqli_query($link, $userstring);
    if($userquery){
      redirect_to('admin_index.php');
    }else{
      $message = "The bugs are taking over, please try again!";
      return $message;
    }
    mysqli_close($link);
  }

  function editUser($fname, $username, $password, $email, $id){
    include('connect.php');
    $crypt =  md5($password);
    $updateString = "UPDATE tbl_user SET user_fname='{$fname}', user_name='{$username}', user_pass='{$crypt}', user_email='{$email}', user_changedPas='yes' WHERE user_id = {$id}";
    $updateQuery = mysqli_query($link, $updateString);
    if($updateQuery){
      redirect_to("admin_index.php");
    }else{
      $message = "Your info could not be updated";
      return $message;
    }
    mysqli_close($link);
  }


 ?>
