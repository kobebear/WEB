<?php
header("Content-Type:application/json;charset=UTF-8");
require_once("../init.php");
@$fname=$_REQUEST["fname"];
if($fname=="seq_recommended")
  sleep(3);
else if($fname=="seq_new_arrival")
  sleep(1);
else
  sleep(5);
$sql="select pid,title,details,pic,price,href from xz_index_product where $fname>0 order by $fname limit 6";
echo json_encode(sql_execute($sql,MYSQLI_ASSOC));