<?php
session_start();
require "./lib/Smarty.class.php";
require "./class/Model.class.php";
$mod = new Model();
$tpl = new Smarty;
$tpl->setTemplateDir("./view");
$sql = "select * from morder,relss where morder.r_id=relss.id and morder.id={$_GET['order_id']}";
$res = $mod->get($sql)[0];
$tpl->assign('res',$res);
$tpl->assign('orderid', $_GET['order_id']);
//分配session中的用户名(如果存在)
if (isset($_SESSION['user'])) {
    $tpl->assign('phone', $_SESSION['user']['phone']);
} else {
    $tpl->assign('phone', '');
}
//加载模版
$tpl->display('buy.html');


