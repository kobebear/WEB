<?php
$file=$_FILES["file"];
if($file["error"]>0)
  echo "Error: ".$file["error"]."<br>";
else{
  echo "upload: ".$file["name"]."<br>";
  echo "type: ".$file["type"]."<br>";
  echo "size: ".($file["size"]/1024)."Kb<br>";
  echo "stored in: ".$file["tmp_name"]."<br>";
  if(file_exists("upload/".$file["name"])){
    echo $file["name"]." 已存在<br>";
  }else{
    move_uploaded_file(
      $file["tmp_name"],
      "upload/".$file["name"]);
    echo "保存到: "."upload/".$file["name"];
  }
}