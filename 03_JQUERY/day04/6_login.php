<?php
session_start();
@$uid=$_SESSION["uid"];
if(!$uid){
  header("Content-Type:application/json");
  require_once("init.php");
  @$uname=$_REQUEST["uname"];
  @$pwd=$_REQUEST["pwd"];
  $sql="select uname,uid from xz_user where uname='$uname' and upwd='$pwd'";
  $result=sql_execute($sql);
  if(count($result)){
    $_SESSION["uid"]=$result[0]["uid"];
    echo json_encode(["ok"=>1,"msg"=>$result[0]["uname"]]);
  }else
    echo json_encode(["ok"=>0,"msg"=>"用户名或密码错误,请重试!"]);
}else{
  echo json_encode(["ok"=>2,"msg"=>"已登录，不必重复登录!"]);
}