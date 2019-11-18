<?php
/* Smarty version 3.1.33, created on 2019-11-18 11:23:55
  from '/Applications/MAMP/htdocs/goupiao/view/login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dd20ecba13bf4_99077909',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b8b53993e6ea9bfac90791ad2de98c29c5e9f82d' => 
    array (
      0 => '/Applications/MAMP/htdocs/goupiao/view/login.html',
      1 => 1573727636,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dd20ecba13bf4_99077909 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./public/bs/css/bootstrap.min.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="./public/js/jquery-1.8.3.min.js"><?php echo '</script'; ?>
>
    <title>用户登陆</title>
    <style>
        .logo {
            width: 230px;
            height: 45px;
            background-position: -394px -677px;
            background-image: url(//s0.meituan.net/bs/file/?f=fe-sso-fs:build/assets/sp-normal.2ee5c09.png);
            background-size: initial;
            margin-top: 40px;
        }

        .promotion-banner {
            float: left;
            height: 370px;
            margin: 30px 115px 0 0;
            width: 480px;
        }

        .formright {
            width: 270px;
            height: 400px;
            /* border: 1px solid red; */
            float: right;
            margin-right: 130px;
        }
        .dlk{
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo"></div>
        <div class="promotion-banner">
            <img src="//s0.meituan.net/bs/file/?f=fe-sso-fs:build/page/static/banner/maoyan.png" width="480"
                height="370" alt="电影">
        </div>
        <div class="formright">
            <form action="./action.php?a=login" method="post" id="loginForm">
                <span style="color:#aaa;">用户登陆</span> <br>
                <input type="text" class="form-control dlk" name="phone" placeholder="请输入手机号码"><span class="pss"
                    style="color:red;"></span>
                <input type="password" class="form-control dlk" name="pwd" placeholder="请输入密码">
                <button type="submit" class="btn btn-primary dlk" style="width: 100%">登陆</button>
                <span>还没有账号?<a href="./reg.php">免费注册</a></span>
            </form>
        </div>
    </div>
</body>

<?php echo '<script'; ?>
>
    var phone=false;
    $("[name=phone]").blur(function(){
        if($(this).val()==''){
            $(".pss").html('请输入手机号');
            phone=false;
        }
        $.getJSON('./action.php',{'a':'yzphone','phone':$(this).val()},function(data){
            if(data){
                $(".pss").html('该手机号尚未注册');
                phone=false;
            }else{
                $(".pss").html('');
                phone=true;
            }
        })
    })

    //提交表单事件
    $("#loginForm").submit(function(){
        $("input").trigger("blur");
        if(phone){
            return true;
        }else{
            return false;
        }
    })

    //跳转首页
    $(".logo").click(function(){
        location.href='./index.php';
    })
<?php echo '</script'; ?>
>

</html>
<?php }
}
