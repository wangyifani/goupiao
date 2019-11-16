<?php
require './class/Model.class.php';
session_start();
$mod=new Model();
switch($_GET['a']){
    case 'reg':
        $arr=['phone'=>$_POST['phone'],'pwd'=>md5($_POST['pwd']),'utime'=>time()];
        $sql = "insert into user(phone,pwd,utime) values(:phone,:pwd,:utime)";
        $n=$mod->insert($sql,$arr);
        if($n){
            echo "<script>alert('注册成功,请登陆!');location.href='login.php';</script>";
        }
    break;

    case 'login':
        $sql="select * from user where phone={$_POST['phone']}";
        $res=$mod->get($sql)[0];
        if($res['pwd']==md5($_POST['pwd']) && $res['status']==1){
            //将用户信息存入session
            $_SESSION['user']['phone'] = $_POST['phone'];
            $_SESSION['user']['status'] = $res['status'];
            $_SESSION['user']['utime'] = $res['utime'];
            echo "<script>alert('登陆成功,正在进入首页...');location.href='index.php';</script>";
        }elseif($res['pwd'] == md5($_POST['pwd']) && $res['status'] == 0){
            echo "<script>alert('该账号已被管理员封禁,详情联系管理员:110');location.href='login.php';</script>";
        }else{
            echo "<script>alert('登陆失败,密码错误');location.href='login.php';</script>";
        }
    break;

    //验证手机号
    case 'yzphone':
        $sql="select * from user where phone={$_GET['phone']}";
        $res=$mod->get($sql);
        if($res){
            //有数据返回0
            echo json_encode(0);
        }else{
            //无数据返回1
            echo json_encode(1);
        }
    break;

    //退出账号
    case 'out':
        unset($_SESSION['user']);
        echo "<script>alert('退出成功!');location.href='login.php';</script>";
    break;

    //删除元素
    case 'delEle':
        $sql= "DELETE FROM morder WHERE id={$_GET['id']}";
        $row=$mod->del($sql);
        if($row){
            echo json_encode(1);
        }else{
            echo json_encode(0);
        }
    break;

    //去付款
    case 'qfk':
        $sql= "SELECT order_time FROM morder WHERE id={$_GET['id']}";
        $res=$mod->get($sql)[0];
        $time = $res['order_time'] + 120;
        if($time<time()){
            //订单超时
            echo json_encode(0);
        }else{
            echo json_encode(1);
        }
    break;



}

