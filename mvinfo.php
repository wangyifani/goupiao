<?php
require "./lib/Smarty.class.php";
require "./class/Model.class.php";
session_start();
$mod = new Model();
$tpl = new Smarty;
$redis=new Redis();
$redis->connect('127.0.0.1',6379);
$tpl->setTemplateDir("./view");
//分配session中的用户名(如果存在)
if (isset($_SESSION['user'])) {
	$tpl->assign('phone', $_SESSION['user']['phone']);
} else {
	$tpl->assign('phone', '');
}
//查询影片信息数据
$sqll = "select * from movie where id={$_GET['mid']}";
$data = $mod->get($sqll)[0];
$tpl->assign('data',$data);
//查询影片座位数据
$sql = "select * from relss where m_id={$_GET['mid']}";
$res = $mod->get($sql);

//查询并删除过期座位缓存数据
$sqler = "select order_time,s_code,num,r_id from morder where r_id={$res[0]['id']} and static=1";
$ress = $mod->get($sqler);
foreach ($ress as $value) {
	//设置过期时间2分钟
	$otime = $value['order_time'] + 120;
	if ($otime < time()) {
		//准备删除缓存中的座位
		$sCode = explode(',', $value['s_code']);
		foreach ($sCode as $sv) {
			//删除指定缓存座位
			//后面可以判断是否缓存中有值,然后再删除
			$redis->srem('php44movie' . $res[0]['id'], $sv);
		}
	}
}

//查询厅/场/时间/已售信息
$zw='';
foreach ($res as $row) {
	//查询已出售票数
	$count=count($redis->smembers('php44movie'.$row['id']));
	//拼接跳转地址
	$url= "./select.php?hid=". $row['h_id']."&mid=". $_GET['mid']."&rid=". $row['id'];
	$zw.="<tr class='moves'>
	<th>{$row['h_name']}</th>
	<th>{$row['start_time']}</th>
	<th>{$row['end_time']}</th>
	<th>{$row['m_price']}</th>
	<th>{$row['seating']}</th>
	<th>{$count}</th>
	<th style='width:100px'><a href='{$url}'>去选座</a></th></tr>";
}

$tpl->assign('zw',$zw);
$tpl->display('mvinfo.html');
