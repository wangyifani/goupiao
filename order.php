<?php
//下单操作
$data['order_code'] = time() + mt_rand(1, 10000); //订单号
$data['r_id'] = $_POST['rid'];
$data['m_id'] = $_POST['rid'];
//座位数 座位那个数组的长度
$data['num'] = count($_POST['s_code']);
//座位号
$data['s_code'] = implode(',', $_POST['s_code']);
$data['phone'] = $_POST['phone'];
//订单状态   1 表示未付款  0表示已付款
$data['static'] = 1;
$data['order_time'] = time();

//购买记录缓存
$redis=new Redis();
$redis->connect('127.0.0.1',6379);
foreach($_POST['s_code'] as $v){
    $redis->sadd('php44movie'.$_POST['rid'],$v);
}

//入库
require "./class/Model.class.php";
$mod = new Model();
$sql = "insert into morder (order_code,r_id,m_id,num,s_code,phone,static,order_time) values(:order_code,:r_id,:m_id,:num,:s_code,:phone,:static,:order_time)";
$m=$mod->insert($sql,$data); //插入成功的id

if ($m > 0) {
    header("location:buy.php?order_id={$m}&rid={$_POST['rid']}");
}
