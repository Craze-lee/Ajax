<?php

header("Content-Type: text/xml; charset=utf-8");
header("Cache-Control: no-cache");

$province = $_POST['province'];
//可创建一个本地文件来进行记录
file_put_contents("../../mylog.log",$province."\r\n",FILE_APPEND);

if($province == "zhejiang"){
    $info = "<province><city>杭州</city><city>温州</city><city>宁波</city></province>";
} else{
    $info = "<province><city>苏州</city><city>南京</city><city>徐州</city></province>";
}
echo $info;
?>
