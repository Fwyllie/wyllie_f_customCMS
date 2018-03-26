<?php

  function single_edit($tbl, $col, $id){

    $result = getSingle($tbl, $col, $id);
    $getResult = mysqli_fetch_array($result);

    echo "<form class=\"editMovieForm\" action=\"phpscripts/edit.php\" method=\"post\">";
    echo "<input hidden name=\"tbl\" value=\"{$tbl}\">";
    echo "<input hidden name=\"col\" value=\"{$col}\">";
    echo "<input hidden name=\"id\" value=\"{$id}\">";

    // echo mysqli_num_fields($result);

    for($i=0; $i<mysqli_num_fields($result); $i++){
      $dataType = mysqli_fetch_field_direct($result, $i);
      $fieldName = $dataType->name;
      $fieldName = str_replace("_", " ", $fieldName);
      $fieldType = $dataType->type;

      if($fieldName != $col){
        if($fieldName != "252" && $fieldName != "movies id"){
          echo "<label>{$fieldName}</label><br>";
          echo "<input type=\"text\" name=\"{$fieldName}\" value=\"{$getResult[$i]}\"<br><br>";
        }else{
          echo "<label>{$fieldName}</label><br>";
          echo "<textarea name=\"{$fieldName}\">{$getResult[$i]}</textarea><br>";
        }
      }
    }
    echo "<input id=\"submitEdit\" type=\"submit\" name=\"submit\" value=\"Save Content\">";
    echo "</form>";
  }

?>
