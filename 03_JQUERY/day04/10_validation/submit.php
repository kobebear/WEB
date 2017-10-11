<?php
header("Content-Type:text/plain");
require_once("../init.php");
@$uname=$_REQUEST["uname"];
@$upwd1=$_REQUEST["upwd1"];
@$email=$_REQUEST["email"];
$sql="insert into xz_user(uid,uname,upwd,email) values(null,'$uname','$email')";
sql_execute($sql);
echo "true";
