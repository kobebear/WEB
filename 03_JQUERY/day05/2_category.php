<?php
header("Content-Type:application/json;charset=UTF-8");
require_once("./init.php");
$sql="SELECT distinct category FROM xz_laptop";
echo json_encode(sql_execute($sql));