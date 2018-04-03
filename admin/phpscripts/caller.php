<?php
  //THIS FILE IS NOT CALLED THROUGH CONFIG.PHP!!! DO NOT ADD IT!!!
require_once('config.php');
if(isset($_GET['caller_id'])){
  $dir = $_GET['caller_id'];
  if($dir == "logout"){
    logged_out();
  }else if($dir == "deleteMov"){
    $id = $_GET['id'];
    deleteMovie($id);
  }else if($dir == "deleteRev"){
    $id = $_GET['id'];
    deleteReview($id);
  }else if($dir == "deleteUser"){
    $id = $_GET['id'];
    deleteUser($id);
  }{
    echo "Caller id was created incorrectly.";
  }
}


 ?>
