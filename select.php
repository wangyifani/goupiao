<?php
session_start();
if(!isset($_SESSION['user'])){
	echo "<script>alert('请先登录!');location.href='login.php';</script>";
	die;
}
require "./lib/Smarty.class.php";
require "./class/Model.class.php";
$mod = new Model();
$tpl = new Smarty;
$tpl->setTemplateDir("./view");
$tpl->assign('rid', $_GET['rid']);
//场次
$sqll = "select * from relss where id={$_GET['rid']}";
$data = $mod->get($sqll)[0];
$tpl->assign('data',$data);
//座位
$sql = "select HallLayout from hall where id={$_GET['hid']}";
$res = $mod->get($sql)[0];

//分配当前登陆的手机号
$tpl->assign('phone',$_SESSION['user']['phone']);

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

//判断是否缓存中有值,然后再删除
if ($redis->smembers('php44movie' . $_GET['rid'])) {
	//判断是否未付款且过期的座位,将缓存释放出来
	$sqler = "select order_time,s_code,num,r_id from morder where r_id={$_GET['rid']} and static=1";
	$ress = $mod->get($sqler);
	foreach ($ress as $value) {
		//设置过期时间2分钟
		$otime = $value['order_time'] + 120;
		if ($otime < time()) {
			//准备删除缓存中的座位
			$sCode = explode(',', $value['s_code']);
			foreach ($sCode as $sv) {
				//删除指定缓存座位
				$redis->srem('php44movie' . $_GET['rid'], $sv);
			}
		}
	}
}

//已售座位
$php44movie = $redis->smembers('php44movie' . $_GET['rid']);

$content='';
for ($k = 1, $j = 0, $i = 0; $i < strlen($res['HallLayout']); $i++) {
	if ($res['HallLayout'][$i] == '_') {
		$content.= "<div class='seatCharts'></div>";
	} elseif ($res['HallLayout'][$i] == 'e') {
		$j++;
		//拼接座位
		$s = $k . "_" . $j;
		//判断座位是否已被选购占座
		if (in_array($s, $php44movie)) {
			$content.= "<div class='selected seatCharts'>" . $j . "</div>";
		} else {
			$content.= "<div class='available seatCharts xz'><input type='checkbox' name='s_code[]' value='" . $s . "'>" . $j . "</div>";
		}
	} elseif ($res['HallLayout'][$i] == ',') {
		$k++;
		$j = 0;
		$content.= "<div class='clear seatCharts'>{$k}</div>";
	}
}
//分配session中的用户名(如果存在)
if (isset($_SESSION['user'])) {
	$tpl->assign('phone', $_SESSION['user']['phone']);
} else {
	$tpl->assign('phone', '');
}
$tpl->assign('content',$content);

$tpl->display('select.html');
