<?php
/* Smarty version 3.1.33, created on 2019-11-15 21:15:51
  from '/Applications/MAMP/htdocs/goupiao/view/header.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dcea507568072_30166250',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45245fb987121d50a977bcbc6c2660f770dfece1' => 
    array (
      0 => '/Applications/MAMP/htdocs/goupiao/view/header.html',
      1 => 1573823750,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dcea507568072_30166250 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="header">
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
                    <a class="navbar-brand" href="#"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="./index.php">首页</a></li>
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
                        <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span>
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
                        <li><a href="./center.php" style="color:royalblue;">欢迎: <?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
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

<?php }
}
