<?php

  function single_edit($tbl, $col, $id){

    $result = getSingle($tbl, $col, $id);
    $getResult = mysqli_fetch_array($result);

    echo "<form class=\"editForm\" action=\"phpscripts/edit.php\" method=\"post\">";
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
        if($fieldName != "252" && $fieldName != "movies id" && $fieldName != "user id" && $fieldName != "user ip" && $fieldName != "user created"){
          echo "<label>{$fieldName}</label><br>";
          echo "<input class=\"editInput\" type=\"text\" name=\"{$fieldName}\" value=\"{$getResult[$i]}\"<br><br>";
        }else if($fieldName != "movies id" && $fieldName != "user id" && $fieldName != "user ip" && $fieldName != "user created"){
          echo "<label>{$fieldName}</label><br>";
          echo "<textarea class=\"editInput\" name=\"{$fieldName}\">{$getResult[$i]}</textarea><br>";
        }
      }
    }
    echo "<button id=\"submitEdit\" type=\"submit\" name=\"submit\">Save</button>";
    echo "</form>";
  }

?>
