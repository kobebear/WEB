<?php
header("Content-Type:application/json;charset=UTF-8");
require_once("./init.php");
@$fid=$_REQUEST["fid"];
$sql="SELECT lid,title FROM xz_laptop where family_id='$fid'";
echo json_encode(sql_execute($sql));
