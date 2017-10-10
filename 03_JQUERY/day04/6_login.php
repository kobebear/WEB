<?php
header("Content-Type:application/json");
require_once("init.php");
@$uname=$_REQUEST["uname"];
@$pwd=$_REQUEST["pwd"];
$sql="select uname from xz_user where uname='$uname' and upwd='$pwd'";
$result=sql_execute($sql);
if(count($result))
  echo json_encode(["ok"=>1,"msg"=>$result[0]["uname"]]);
else
  echo json_encode(["ok"=>0,"msg"=>"用户名或密码错误,请重试!"]);