<?php

  function createUser($fname, $username, $password, $email, $lvllist){
    include('connect.php');
    $crypt =  md5($password);
    $userstring = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$crypt}', '{$email}', NULL, '{$lvllist}', 'no', 'yes')";
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
    $updateString = "UPDATE tbl_user SET user_fname='{$fname}', user_name='{$username}', user_pass='{$crypt}', user_email='{$email}' WHERE user_id = {$id}";
    $updateQuery = mysqli_query($link, $updateString);
    if($updateQuery){
      redirect_to("admin_index.php");
    }else{
      $message = "Your info could not be updated";
      return $message;
    }

    mysqli_close($link);
  }

  function deleteUser($id){
    include('connect.php');

    $delString = "DELETE FROM tbl_user WHERE user_id = {$id}";
    $delQuery =  mysqli_query($link, $delString);
    if($delQuery){
      redirect_to("../admin_index.php");
    }else{
      $message = "Girl BYE";
      return $message;
    }

  function expire(){
    include('connect.php');
    $expireString = "DELETE FROM tbl_user WHERE user_firstLog = 'yes' AND user_date = (NOW() + 1 MINUTE)";
    $expireQuery = mysqli_query($link, $expireString);
    if($expireQuery){
      echo "works";
    }
  }


    mysqli_close($link);
  }

 ?>
