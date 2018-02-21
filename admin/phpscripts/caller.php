<?php
  //THIS FILE IS NOT CALLED THROUGH CONFIG.PHP!!! DO NOT ADD IT!!!
require_once('config.php');
if(isset($_GET['caller_id'])){
  $dir = $_GET['caller_id'];
  if($dir == "logout"){
    logged_out();
  }else{
    echo "Caller id was padde incorrectly.";
  }
}


 ?>
