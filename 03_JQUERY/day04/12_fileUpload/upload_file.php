<?php
if($_FILES["file"]["error"]>0)
  echo "Error: ".$_FILES["file"]["error"]."<br>";
else{
  echo "upload: ".$_FILES["file"]["name"]."<br>";
  echo "type: ".$_FILES["file"]["type"]."<br>";
  echo "size: ".($_FILES["file"]["size"]/1024)."Kb<br>";
  echo "stored in: ".$_FILES["file"]["tmp_name"]."<br>";
  if(file_exists("upload/".$_FILES["file"]["name"])){
    echo $_FILES["file"]["name"]." 已存在<br>";
  }else{
    move_uploaded_file(
      $_FILES["file"]["tmp_name"],
      "upload/".$_FILES["file"]["name"]);
    echo "保存到: "."upload/".$_FILES["file"]["name"];
  }
}