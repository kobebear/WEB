<?php
header("Content-Type:application/json;charset=UTF-8");
@$category=$_REQUEST["category"];
require_once("../init.php");
sleep(2);
$sql="SELECT distinct family_id, (select fname from xz_laptop_family where fid=family_id) as fname FROM xz_laptop where category='$category'";
echo json_encode(sql_execute($sql,MYSQLI_ASSOC));