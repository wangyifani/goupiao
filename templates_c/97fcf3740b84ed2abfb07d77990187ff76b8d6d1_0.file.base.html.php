<?php
/* Smarty version 3.1.33, created on 2019-11-14 20:20:42
  from '/Applications/MAMP/htdocs/goupiao/view/base.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dcd469a2d11e9_65597705',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97fcf3740b84ed2abfb07d77990187ff76b8d6d1' => 
    array (
      0 => '/Applications/MAMP/htdocs/goupiao/view/base.html',
      1 => 1573734004,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dcd469a2d11e9_65597705 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9140369295dcd469a28fc57_56021968', "head");
?>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17874593635dcd469a297998_37239285', "title");
?>


    <style>
        .header{
            width: 100%;
            height: 80px;
            background: #fff;
            position: fixed;
            box-shadow: 0 0 10px #ddd;
            z-index: 10;
            padding-top: 15px;
            /* display: none; */
        }
    </style>
</head>
<body>
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7605261975dcd469a29d8d2_98916233', "header");
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14826055075dcd469a2c6dc4_73335410', "body");
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12872107195dcd469a2cd290_94558808', "foot");
?>

</body>
</html>
<?php }
/* {block "head"} */
class Block_9140369295dcd469a28fc57_56021968 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_9140369295dcd469a28fc57_56021968',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./public/bs/css/bootstrap.min.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="./public/js/jquery-1.8.3.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="public/bs/css/bootstrap.min.css">
    <?php echo '<script'; ?>
 src="public/bs/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/bs/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/bs/js/holder.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/bs/js/application.js"><?php echo '</script'; ?>
>
    <?php
}
}
/* {/block "head"} */
/* {block "title"} */
class Block_17874593635dcd469a297998_37239285 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_17874593635dcd469a297998_37239285',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "title"} */
/* {block "header"} */
class Block_7605261975dcd469a29d8d2_98916233 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_7605261975dcd469a29d8d2_98916233',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <div class="header">
            <div class="container">
                <nav class="navbar navbar-default" style="background: #fff;border:1px;">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#"><img src="" alt=""
                                    style="width:124px;height:45px;margin-top:-12px;"></a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="#">首页</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">今日推荐 <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">One more separated link</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">终身全站VIP</a></li>
                            </ul>
                            <form class="navbar-form navbar-left">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="搜索电影">
                                </div>
                                <button type="submit" class="btn btn-info"><span
                                        class="glyphicon glyphicon-search"></span>
                                </button>
                            </form>
                            <ul class="nav navbar-nav navbar-right">
                                <?php if ($_smarty_tpl->tpl_vars['phone']->value == '') {?>
                                <li><a href="./login.php" style="color:royalblue;">登陆</a></li>
                                <li class="dropdown">
                                    <a href="./reg.php" class="dropdown-toggle">注册</a>
                                </li>
                                <?php } else { ?>
                                <!-- 点击去个人中心 -->
                                <li><a href="#" style="color:royalblue;">欢迎: <?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
</a></li>
                                <li class="dropdown">
                                    <!-- 退出账号 -->
                                    <a href="./action.php?a=out" class="dropdown-toggle">退出</a>
                                </li>
                                <?php }?>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
        </div>
        
        <?php echo '<script'; ?>
>
            $(window).scroll(function () {
                if ($(window).scrollTop() >= 205) {
                    $(".header").show(200);
                } else {
                    $(".header").hide(200);
                }
            })
        <?php echo '</script'; ?>
>
        
        <?php
}
}
/* {/block "header"} */
/* {block "body"} */
class Block_14826055075dcd469a2c6dc4_73335410 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_14826055075dcd469a2c6dc4_73335410',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "body"} */
/* {block "foot"} */
class Block_12872107195dcd469a2cd290_94558808 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'foot' => 
  array (
    0 => 'Block_12872107195dcd469a2cd290_94558808',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "foot"} */
}
