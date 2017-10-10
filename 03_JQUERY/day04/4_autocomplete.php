<?php
header("Content-Type:application/json");
require_once("./init.php");
@$kw=$_REQUEST["term"];
//只返回title,必须为title起别名为label,前端才能自动识别
//$sql='SELECT title as label FROM xz_laptop ';
//返回title和销量
$sql='SELECT lid,title,sold_count FROM xz_laptop ';
if($kw){
  $kws=explode(" ",$kw);//js:split
  for($i=0;$i<count($kws);$i++){
    $kws[$i]=" title like '%".$kws[$i]."%'";
  }
  $where=" where ".implode(" and ",$kws);
  $sql=$sql.$where;
}
$sql=$sql." order by sold_count desc limit 10 ";
echo json_encode(sql_execute($sql));