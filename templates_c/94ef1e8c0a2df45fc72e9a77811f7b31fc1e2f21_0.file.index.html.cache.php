<?php
/* Smarty version 3.1.33, created on 2019-11-14 17:13:05
  from '/Applications/MAMP/htdocs/goupiao/view/index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dcd1aa1abc8b2_77871507',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94ef1e8c0a2df45fc72e9a77811f7b31fc1e2f21' => 
    array (
      0 => '/Applications/MAMP/htdocs/goupiao/view/index.html',
      1 => 1573722784,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dcd1aa1abc8b2_77871507 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '13278834405dcd1aa1a33d73_14768643';
?>
<!DOCTYPE html>
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
            display: none;
        }
    </style>
</head>

<body>
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
                            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span>
                            </button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="./login.php" style="color:royalblue;">登陆</a></li>
                            <li class="dropdown">
                                <a href="./reg.php" class="dropdown-toggle" >注册</a>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>
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

<?php echo '<script'; ?>
>
    $(window).scroll(function(){
        if($(window).scrollTop()>=205){
            $(".header").show(200);
        }else{
             $(".header").hide(200);
        }
    })
<?php echo '</script'; ?>
>

</html>
<?php }
}
