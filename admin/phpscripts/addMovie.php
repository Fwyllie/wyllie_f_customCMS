<?php

  function addMovie($cover, $title, $year, $duration, $desc, $trailer, $genre){
    include('connect.php');
    if($cover['type'] == "image/jpg" || $cover['type'] == "image/jpeg"){
      $targetPath = "../images/{$cover['name']} ";
      if(move_uploaded_file($cover['tmp_name'], $targetPath)){
        $th_copy = "../images/TH_{$cover['name']}";
        if(!copy($targetPath, $th_copy)){
          $message = "Oops, something didn't work";
          return $message;
        }
        $size = getimagesize($targetpath);
        list($width,$height) = getimagesize($targetpath);
        $newwidth = 405;
        $newheight = 600;
        $thumb = imagecreatetruecolor( $newwidth, $newheight);
        $source = imagecreatefromjpeg($th_copy);
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        imagejpeg( $thumb, $th_copy, 100);
        $out_image=addslashes(file_get_contents($th_copy));

        //Add to db
        $qstring = "INSERT INTO tbl_movies VALUES(NULL, '{$title}', 'th_{$cover['name']}', '{$year}', '{$duration}', '{$desc}', '{$trailer}')";
        $movieResult = mysqli_query($link, $qstring);
        if($movieResult){
          $qstring2 = "SELECT * FROM tbl_movies ORDER BY movies_id DESC LIMIT 1";
          $movieResult2 = mysqli_query($link, $qstring2);
          $row = mysqli_fetch_array($movieResult2);
          $lastID = $row['movies_id'];
          $qstring3 = "INSERT INTO tbl_mov_genre VALUES(NULL, {$lastID}, {$genre})";
          $movieResult3 = mysqli_query($link, $qstring3);
        }else{
          $message = "There was an error adding that movie, please try again";
          return $message;
        }
        redirect_to("admin_index.php");
      }
    }
    else{
      echo "WRONG FILE TYPE";
    }
    mysqli_close($link);
  }

  function deleteMovie($id){
    include('connect.php');

    $delString = "DELETE FROM tbl_movies WHERE movies_id = {$id}";
    $delQuery =  mysqli_query($link, $delString);
    if($delQuery){
      redirect_to("../admin_index.php");
    }else{
      $message = "Something went wrong :(";
      return $message;
    }
    mysqli_close($link);
  }

 ?>
