<?php
header("Content-Type:application/javascript;charset=UTF-8");
$list=getallheaders();
$lang=$list["Accept-Language"];
$firstLang=substr($lang,0,2);
$hello="";
if($firstLang=="zh")
  $hello="你好";
else if($firstLang=="en")
  $hello="Hello";
else if($firstLang=="ko")
  $hello="안녕하세요";
else if($firstLang=="ja")
  $hello="こんにちは";

echo '$("body").prepend("<h1>'.$hello.'</h1>")';