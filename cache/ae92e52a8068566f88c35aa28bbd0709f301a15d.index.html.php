<?php
/* Smarty version 3.1.33, created on 2019-11-18 11:00:22
  from '/Applications/MAMP/htdocs/goupiao/view/index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dd209466dc3a8_01901943',
  'has_nocache_code' => true,
  'file_dependency' => 
  array (
    '94ef1e8c0a2df45fc72e9a77811f7b31fc1e2f21' => 
    array (
      0 => '/Applications/MAMP/htdocs/goupiao/view/index.html',
      1 => 1574045102,
      2 => 'file',
    ),
    '45245fb987121d50a977bcbc6c2660f770dfece1' => 
    array (
      0 => '/Applications/MAMP/htdocs/goupiao/view/header.html',
      1 => 1574046013,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 60,
),true)) {
function content_5dd209466dc3a8_01901943 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>电影列表</title>
    <link rel="stylesheet" href="public/bs/css/bootstrap.min.css">
    <script src="public/bs/js/jquery.min.js"></script>
    <script src="public/bs/js/bootstrap.min.js"></script>
    <script src="public/bs/js/holder.min.js"></script>
    <script src="public/bs/js/application.js"></script>

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
            <tr class='moves'>
				<th><img src='./public/Uploads/2016-12-10/584bc48579058.jpg'></th>
				<th>血战钢锯岭</th>
				<th>梅尔·吉普森</th>
				<th>安德鲁·加菲尔德/萨姆·沃辛顿/卢克·布雷西/雨果·维文</th>
				<th style='width:250px'>在1942年的太平洋战场，主人公军医戴斯蒙德·道斯不愿意在前...</th>
				<th style='width:100px'>139</th>
				<th style='width:100px'>55</th>
				<th style='width:100px'><a href='./mvinfo.php?mid=2' class='btn btn-success'>查看详情</a></th>
			</tr><tr class='moves'>
				<th><img src='./public/Uploads/2016-12-10/584bc158b9d83.jpg'></th>
				<th>你的名字</th>
				<th>新海诚</th>
				<th>神木隆之介 / 上白石萌音 / 长泽雅美 / 市原悦子 / 成田凌 / 悠木碧 / 岛崎信长 / 石川界人 / 谷花音</th>
				<th style='width:250px'>千年后再度回归的彗星造访地球的一个月前，日本深山的某个乡下小...</th>
				<th style='width:100px'>108</th>
				<th style='width:100px'>55</th>
				<th style='width:100px'><a href='./mvinfo.php?mid=3' class='btn btn-success'>查看详情</a></th>
			</tr><tr class='moves'>
				<th><img src='./public/Uploads/2016-12-11/584ccf470948c.jpg'></th>
				<th>28岁未成年</th>
				<th>张末</th>
				<th>倪妮/霍建华/马苏/王大陆</th>
				<th style='width:250px'>28岁的凉夏（倪妮饰）与34岁的茅亮（霍建华饰）相恋10年，...</th>
				<th style='width:100px'>109</th>
				<th style='width:100px'>55</th>
				<th style='width:100px'><a href='./mvinfo.php?mid=5' class='btn btn-success'>查看详情</a></th>
			</tr><tr class='moves'>
				<th><img src='./public/Uploads/2016-12-11/584cdf9ef2f3e.jpg'></th>
				<th>神奇动物在哪里</th>
				<th>大卫·叶茨</th>
				<th>埃迪·雷德梅恩 / 凯瑟琳·沃特斯顿 / 丹·福勒 / 艾莉森·萨多尔 / 科林·法瑞尔</th>
				<th style='width:250px'>《神奇动物在哪里》在《哈利·波特》系列中是霍格沃茨魔法学校“...</th>
				<th style='width:100px'>133</th>
				<th style='width:100px'>55</th>
				<th style='width:100px'><a href='./mvinfo.php?mid=7' class='btn btn-success'>查看详情</a></th>
			</tr><tr class='moves'>
				<th><img src='./public/Uploads/2016-12-11/584ce00ee0408.jpg'></th>
				<th>海洋奇缘</th>
				<th>罗恩·克莱蒙兹</th>
				<th>道恩·强森 / 艾伦·图代克 / 杰梅奈·克莱门特 / 尼可·斯彻金格 / 特穆拉·莫里森</th>
				<th style='width:250px'>影片讲述了在很久之前的南太平洋上，航海世家出身的莫亚娜为了找...</th>
				<th style='width:100px'>107</th>
				<th style='width:100px'>55</th>
				<th style='width:100px'><a href='./mvinfo.php?mid=8' class='btn btn-success'>查看详情</a></th>
			</tr><tr class='moves'>
				<th><img src='./public/Uploads/2016-12-11/presell_20161122111005.jpg'></th>
				<th>佩小姐的奇幻城堡</th>
				<th>蒂姆·波顿</th>
				<th>阿萨·巴特菲尔德 / 伊娃·格林 / 塞缪尔·杰克逊 / 朱迪·丹奇 / 艾拉·珀内尔</th>
				<th style='width:250px'>杰克（阿萨·巴特菲尔德 Asa Butterfield 饰）...</th>
				<th style='width:100px'>126</th>
				<th style='width:100px'>55</th>
				<th style='width:100px'><a href='./mvinfo.php?mid=9' class='btn btn-success'>查看详情</a></th>
			</tr><tr class='moves'>
				<th><img src='./public/Uploads/2019-11-15/bb5ad4ea5989b9d15e0d1976616dbc90.jpg'></th>
				<th>僵尸叔叔</th>
				<th>林正英</th>
				<th>林正英</th>
				<th style='width:250px'><p>牛逼</p>...</th>
				<th style='width:100px'>123</th>
				<th style='width:100px'>123</th>
				<th style='width:100px'><a href='./mvinfo.php?mid=14' class='btn btn-success'>查看详情</a></th>
			</tr><tr class='moves'>
				<th><img src='./public/Uploads/2019-11-16/21b00bd3a316a49640a5152243dd4530.jpeg'></th>
				<th>张洪浩的性福生活</th>
				<th>王家奇</th>
				<th>孟庆康</th>
				<th style='width:250px'><h6>张洪浩的幸福生活</h6>...</th>
				<th style='width:100px'>102</th>
				<th style='width:100px'>22</th>
				<th style='width:100px'><a href='./mvinfo.php?mid=15' class='btn btn-success'>查看详情</a></th>
			</tr>
        </table>
    </div>
</body>

</html>
<?php }
}
