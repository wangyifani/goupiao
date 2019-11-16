<?php
//载入ucpass类
//手机验证码类
require_once('lib/Ucpaas.class.php');
require_once('serverSid.php');

$appid = "";    //应用的ID，可在开发者控制台内的短信产品下查看
$templateid = "";    //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
$param = mt_rand(1000, 9999);
//$param = $_POST['yzm']; //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空
$mobile = $_POST['yzmtel'];
$uid = "";
echo $ucpass->SendSms($appid, $templateid, $param, $mobile, $uid);
