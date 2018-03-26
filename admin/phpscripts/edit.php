<?php
 include('connect.php');

 $tbl = $_POST['tbl'];
 $col = $_POST['col'];
 $id = $_POST['id'];

 unset($_POST['tbl']);
 unset($_POST['col']);
 unset($_POST['id']);
 unset($_POST['submit']);

 $count = 0;
 $num = count($_POST);

 $qstring = "UPDATE {$tbl} SET ";

 forEach($_POST as $key => $value){
   $count++;
   if($count != $num ){
     $qstring .= $key." = '".htmlspecialchars($value, ENT_QUOTES)."', ";
   }else{
     $qstring .= $key." = '".htmlspecialchars($value, ENT_QUOTES)."' ";
   }
 }

 $qstring .= "WHERE {$col} = {$id}";
 // echo $qstring;
 $updatequery = mysqli_query($link, $qstring);

 if($updatequery){
   header('location:../admin_index.php');
 }else{
   echo "There was an issue changing that info.";
 }

 mysqli_close($link);
 ?>
