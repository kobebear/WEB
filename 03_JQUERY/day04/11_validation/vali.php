<?php
header("Content-Type:text/plain;charset=UTF-8");
require_once("../init.php");
@$uname=$_REQUEST["uname"];
if($uname){
  $sql="select * from xz_user where uname='$uname'";
  if(count(sql_execute($sql))==0)
    echo "true";
  else
    echo "false";
}else{
  @$email=$_REQUEST["email"];
  $sql="select * from xz_user where email='$email'";
  if(count(sql_execute($sql))==0)
    echo "true";
  else
    echo "false";
}