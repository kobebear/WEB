<?php
header("Content-Type:application/json;charset=UTF-8");
require_once("../init.php");
$sql="select img,title,href from xz_index_carousel";
echo json_encode(sql_execute($sql,MYSQLI_ASSOC));