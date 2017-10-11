<?php
header("Content-Type:text/plain");
	#1、获取请求提交的数据
	$uname=$_REQUEST["uname"];
	$upwd=$_REQUEST["upwd"];
	$email=$_REQUEST["email"];
	#2、连接到数据库
  require_once("../init.php");
	#3、执行数据库操作
	$sql="insert into xz_user(uid,uname,upwd,email) values(null,'$uname','$upwd','$email')";
	$result=mysqli_query($conn,$sql);
	if($result === true){
		echo "注册成功";
	}else{
		echo "注册失败";
	}