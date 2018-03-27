<?php
function addRev($name, $review, $rating, $id){
    include('connect.php');
      if(!empty($review)){
        $qstring = "INSERT INTO tbl_reviews VALUES(NULL, '{$name}', '{$rating}', '{$review}')";
        $revResult = mysqli_query($link, $qstring);
        if($revResult){
          $qstring2 = "SELECT * FROM tbl_reviews ORDER BY reviews_id DESC LIMIT 1";
          $revResult2 = mysqli_query($link, $qstring2);
          $row = mysqli_fetch_array($revResult2);
          $lastID = $row['reviews_id'];
          $qstring3 = "INSERT INTO tbl_mov_rev VALUES(NULL, {$id}, {$lastID})";
          $movieResult3 = mysqli_query($link, $qstring3);
        }else{
          $message = "There was an error adding your review, please try again";
          return $message;
        }
        // redirect_to("admin_index.php");
      }else{
      echo "Please Fill Out Fields";
      }
    mysqli_close($link);
  }

  function deleteReview($id){
    include('connect.php');

    $delString = "DELETE FROM tbl_reviews WHERE reviews_id = {$id}";
    $delString2 = "DELETE FROM tbl_mov_rev WHERE reviews_id = {$id}";
    $delQuery =  mysqli_query($link, $delString);
    $delQuery2 =  mysqli_query($link, $delString2);
    if($delQuery && $delQuery2){
      redirect_to("../admin_index.php");
    }else{
      $message = "Something went wrong :(";
      return $message;
    }
    mysqli_close($link);
  }
 ?>
