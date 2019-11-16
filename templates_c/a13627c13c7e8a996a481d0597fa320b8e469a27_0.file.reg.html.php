<?php
/* Smarty version 3.1.33, created on 2019-11-14 18:36:27
  from '/Applications/MAMP/htdocs/goupiao/view/reg.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dcd2e2bc2c939_50142969',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a13627c13c7e8a996a481d0597fa320b8e469a27' => 
    array (
      0 => '/Applications/MAMP/htdocs/goupiao/view/reg.html',
      1 => 1573727785,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dcd2e2bc2c939_50142969 (Smarty_Internal_Template $_smarty_tpl) {
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
    <title>用户注册</title>
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

        .dlk {
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
            <form action="./action.php?a=reg" method="post" name="regForm">
                <span style="color:#aaa;">用户注册</span> <br>
                <input type="text" class="form-control dlk" name="phone" placeholder="请输入手机号码" />
                <p><span class="pss" style="color:red;"></span></p>
                <a href="javascript:void(0)" class="btn btn-default yzman" onclick="hqyzm()"
                    style="margin-top:5px;">点击获取短信验证码</a>
                <input type="text" class="form-control dlk" name="yzm" style="display: none;"
                    placeholder="请输入短信验证码"><span class="yss" style="color:red;"></span>
                <input type="password" class="form-control dlk" name="pwd" placeholder="请输入密码"><span class="pws"
                    style="color:red;"></span>
                <input type="password" class="form-control dlk" name="qrpwd" placeholder="请输入确认密码"><span
                    style="color:red;" class="pwss"></span>
                <button type="submit" class="btn btn-danger dlk" style="width: 100%">同意以下协议并注册</button>
                <span>已有账号?<a href="./login.php">去登陆</a></span>
            </form>
        </div>
    </div>
</body>

<?php echo '<script'; ?>
>
    var isYzm = false;
    var phone = false;
    var pwd = false;
    var yzm;
    var mobile;
    //点击发送验证码
    function hqyzm() {
        //判断手机号码是否为空
        if ($("[name=phone]").val() == '') {
            alert('请输入手机号');
            return;
        }
        $('[name=yzm]').css('display', 'block'); //显示验证码输入框
        //验证码接收倒计时
        var n = 60;
        //手机号正则
        var reg = /^[1][3-9][0-9]{9}$/;
        //倒计时60秒
        if (reg.test($("[name=phone]").val())) {
            t = setInterval(function () {
                $(".yzman").html(n + "秒");
                $(".yzman").css("pointerEvents", "none");
                if (n < 1) {
                    $(".yzman").css("pointerEvents", "auto");
                    $(".yzman").html("重新获取验证码");
                    clearInterval(t);
                }
                n--;
            }, 1000)
        } else {
            $(".pss").html('手机号码不正确');
        }


        //发送验证码请求
        $.post('./smsyzm.php', {
            'yzmtel': $("[name=phone]").val()
        }, function (data) {
            if (data.code == '000000') {
                yzm = data.param;
                mobile = data.mobile;
            } else if (data.code == '105147') {
                alert('当前手机号验证过于频繁!,请稍后再试...');
            }
        }, 'json')
        alert('验证码发送成功,请注意查收!');

    }


    //手机号码失去焦点
    $('[name=phone]').blur(function () {
        //失去焦点验证手机号码
        var reg = /^[1][3-9][0-9]{9}$/;
        if (reg.test($(this).val())) {
            //如果正则没问题去验证数据库是否存在这个手机号
            $.get('./action.php',{'a':'yzphone','phone':$(this).val()},function(data){
                if(data){
                    phone = true;
                    $(".pss").html('');
                }else{
                    $(".pss").html('该手机号已注册');
                    phone = false;
                }
            },'json')
        } else {
            $(".pss").html('手机号不正确');
            phone = false;
        }
    })

    //验证码失去焦点
    $('[name=yzm]').blur(function () {
        //失去焦点时验证 验证码是否正确
        if (yzm == $(this).val()) {
            isYzm = true;
            $(".yss").html('');
        } else {
            $(".yss").html('验证码不正确');
            isYzm = false;
        }
    })

    //密码失去焦点
    $("[name=pwd]").blur(function () {
        var reg = /\w{6,18}/;
        if (reg.test($(this).val())) {
            $(".pws").html('');
            pwd = true;
        } else {
            $(".pws").html('密码不合法');
            pwd = false;
        }
    });

    //确认密码失去焦点
    $("[name=qrpwd]").blur(function () {
        if($("[name=pwd]").val()==$("[name=qrpwd]").val()){
            pwd = true;
            $(".pwss").html('');
        }else{
            pwd = false;
            $(".pwss").html('两次密码不一致');
        }
    });

    //提交表单方法
    $("[name=regForm]").submit(function () {
        //再次校验input失去焦点
        $('input').trigger('blur');
        if (pwd && isYzm && phone) {
            return true;
        } else {
            return false;
        }
    });

    //跳转首页
    $(".logo").click(function(){
        location.href='./index.php';
    })
<?php echo '</script'; ?>
>

</html>
<?php }
}
