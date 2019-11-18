<?php
/* Smarty version 3.1.33, created on 2019-11-18 10:55:34
  from '/Applications/MAMP/htdocs/goupiao/view/index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dd208267e82e1_37677310',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94ef1e8c0a2df45fc72e9a77811f7b31fc1e2f21' => 
    array (
      0 => '/Applications/MAMP/htdocs/goupiao/view/index.html',
      1 => 1574045102,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
  ),
),false)) {
function content_5dd208267e82e1_37677310 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>电影列表</title>
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

    <style type="text/css">
        .moves img {
            width: 200px;
        }

        .moves th {
            width: 150px;
        }
        .header{
            width: 100%;
            height: 80px;
            background: #fff;
            position: fixed;
            box-shadow: 0 0 10px #ddd;
            z-index: 10;
            padding-top: 15px;
        }
    </style>
</head>

<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="container">
        <h3 class="text-center"><a href="">今日放映</a></h3>
        <hr>

        <br>
        <div class="bs-example">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>

                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="public/a.jpg" style="min-width:100%" alt="First slide">
                        <div class="carousel-caption"></div>
                    </div>
                    <div class="item">
                        <img src="public/b.jpg" style="min-width:100%" alt="Second slide">
                        <div class="carousel-caption"></div>

                    </div>
                    <div class="item ">
                        <img src="public/c.jpg" style="min-width:100%" alt="Third slide">
                        <div class="carousel-caption"></div>

                    </div>
                    <div class="item ">
                        <img src="public/d.jpg" style="min-width:100%" alt="Third slide">
                        <div class="carousel-caption"></div>

                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <table class="table table-bordered table-hover table-striped table-condensed">
            <tr>
                <th>影片</th>
                <th>影片名称</th>
                <th>导演</th>
                <th>主演</th>
                <th>放映信息</th>
                <th>时长</th>
                <th>票价</th>
                <th>操作</th>
            </tr>
            <?php echo $_smarty_tpl->tpl_vars['str']->value;?>

        </table>
    </div>
</body>

</html>
<?php }
}
