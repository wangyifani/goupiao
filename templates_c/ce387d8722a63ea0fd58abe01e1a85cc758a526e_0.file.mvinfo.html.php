<?php
/* Smarty version 3.1.33, created on 2019-11-18 11:24:05
  from '/Applications/MAMP/htdocs/goupiao/view/mvinfo.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dd20ed5c79ad8_21667256',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce387d8722a63ea0fd58abe01e1a85cc758a526e' => 
    array (
      0 => '/Applications/MAMP/htdocs/goupiao/view/mvinfo.html',
      1 => 1573734858,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
  ),
),false)) {
function content_5dd20ed5c79ad8_21667256 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>选择场次</title>
    <link rel="stylesheet" href="public/bs/css/bootstrap.min.css">

    <style type="text/css">
        .moves img {
            width: 200px;
        }

        .moves th {
            width: 150px;
        }

        #movie {
            margin: 0 auto;
        }

        #m_pic {
            width: 1000px;
        }

        #m_info {
            width: 1000px;
            text-align: left;
            color: #777;
        }

        #m_info p span {
            font-size: 18px;
            color: #333;
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

        <h3 class="text-center"><a href="">详情介绍</a></h3>
        <div id="movie">
            <div id="m_pic"><img src="./public<?php echo $_smarty_tpl->tpl_vars['data']->value['picurl'];?>
"></div>
            <div id="m_info">
                <p>影片名称:&nbsp;&nbsp;&nbsp;<span><?php echo $_smarty_tpl->tpl_vars['data']->value['m_name'];?>
</span></p>
                <p>影片类型:&nbsp;&nbsp;&nbsp;<span><?php echo $_smarty_tpl->tpl_vars['data']->value['m_type'];?>
</span></p>
                <p>影片地区:&nbsp;&nbsp;&nbsp;<span><?php echo $_smarty_tpl->tpl_vars['data']->value['country_area'];?>
</span></p>
                <p>影片时长:&nbsp;&nbsp;&nbsp;<span><?php echo $_smarty_tpl->tpl_vars['data']->value['m_time'];?>
</span></p>
                <p>影片导演:&nbsp;&nbsp;&nbsp;<span><?php echo $_smarty_tpl->tpl_vars['data']->value['m_director'];?>
</span></p>
                <p>影片主演:&nbsp;&nbsp;&nbsp;<span><?php echo $_smarty_tpl->tpl_vars['data']->value['actor'];?>
</span></p>
                <p>影片剧情:&nbsp;&nbsp;&nbsp;<span><?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
</span></p>
            </div>
            <h3 class="text-center"><a href="">场次列表</a></h3>
            <hr>
            <br>
            <table class="table table-bordered table-hover table-striped table-condensed">
                <tr>

                    <th>放映厅</th>
                    <th>开场时间</th>
                    <th>结束时间</th>
                    <th>票价</th>
                    <th>座位数</th>
                    <th>已售</th>
                    <th>操作</th>
                </tr>
                <?php echo $_smarty_tpl->tpl_vars['zw']->value;?>

            </table>
        </div>
    </div>
    <div style="width: 100%;height: 100px;"></div>
</body>

</html>
<?php }
}
