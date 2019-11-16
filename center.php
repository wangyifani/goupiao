<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>alert('请先登录!');location.href='login.php';</script>";
    die;
}
require "./lib/Smarty.class.php";
require "./class/Model.class.php";
$mod = new Model();
$tpl = new Smarty;
$tpl->setTemplateDir("./view");
$sql= "SELECT morder.*,relss.m_name,relss.h_name,relss.m_price FROM morder,relss WHERE morder.r_id=relss.id AND morder.phone={$_SESSION['user']['phone']} ORDER BY order_time";
$res=$mod->get($sql);
$tpl->assign('res', $res);
//分配session中的用户名(如果存在)
if (isset($_SESSION['user'])) {
    $tpl->assign('phone', $_SESSION['user']['phone']);
} else {
    $tpl->assign('phone', '');
}
$tpl->display('center.html');
