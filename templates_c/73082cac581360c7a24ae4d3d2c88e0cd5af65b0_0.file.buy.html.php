<?php
/* Smarty version 3.1.33, created on 2019-11-18 14:03:17
  from '/Applications/MAMP/htdocs/goupiao/view/buy.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dd234254e3e82_05604944',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73082cac581360c7a24ae4d3d2c88e0cd5af65b0' => 
    array (
      0 => '/Applications/MAMP/htdocs/goupiao/view/buy.html',
      1 => 1573734948,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
  ),
),false)) {
function content_5dd234254e3e82_05604944 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>选座购票</title>
    <link rel="stylesheet" href="public/bs/css/bootstrap.min.css">
    <style type="text/css">
        #movie {
            width: 800px;
            margin: 0 auto;
        }

        #m_info {
            width: 349px;
            float: left;
            border-right: 1px solid #333;
        }

        #m_order {
            width: 400px;
            height: 200px;
            float: left;
            margin-left: 50px;
        }

        p {
            text-align: left;
            color: #777;
        }

        p span {
            font-size: 18px;
            color: #333;
        }

        #code {
            width: 900px;
            margin: 0 auto;
            overflow-x: scroll;
        }

        .seatCharts {
            width: 35px;
            height: 35px;
            border-radius: 5px;
            margin: 2px;
            float: left;
        }

        .available {
            background-color: #b9dea0;
        }

        .selected {
            background-color: #e6cac4;
        }

        .available:hover {
            background-color: #76b474;
        }

        .clear {
            clear: both;
        }

        #seat-map {
            border-right: 1px dotted #adadad;

            list-style: outside none none;
            max-height: 600px;
            overflow-x: auto;
            padding: 20px;
            width: 1200px;
        }
        .header{
            width: 100%;
            height: 80px;
            background: #fff;
            /* position: fixed; */
            box-shadow: 0 0 10px #ddd;
            z-index: 10;
            padding-top: 15px;
        }
    </style>
</head>

<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <form action="./pay/alipayapi.php" method="post">
        <div id="movie">
            <br><br><br>
            <div id="m_info">
                <p>影片名称:&nbsp;&nbsp;&nbsp;<span><?php echo $_smarty_tpl->tpl_vars['res']->value['m_name'];?>
</span></p>
                <p>放映厅:&nbsp;&nbsp;&nbsp;<span><?php echo $_smarty_tpl->tpl_vars['res']->value['h_name'];?>
</span></p>
                <p>影片时长:&nbsp;&nbsp;&nbsp;<span><?php echo $_smarty_tpl->tpl_vars['res']->value['m_time'];?>
</span></p>
                <p>日期:&nbsp;&nbsp;&nbsp;<span><?php echo $_smarty_tpl->tpl_vars['res']->value['time'];?>
</span></p>
                <p>时间:&nbsp;&nbsp;&nbsp;<span><?php echo $_smarty_tpl->tpl_vars['res']->value['start_time'];?>
 -<?php echo $_smarty_tpl->tpl_vars['res']->value['end_time'];?>
</span></p>
            </div>
            <div id="m_order">
                <p>手机号:&nbsp;&nbsp;&nbsp;<span><?php echo $_smarty_tpl->tpl_vars['res']->value['phone'];?>
</span></p>
                <p>数量:&nbsp;&nbsp;&nbsp;<span><?php echo $_smarty_tpl->tpl_vars['res']->value['num'];?>
</span></p>
                <p>座位:&nbsp;&nbsp;&nbsp;<span><?php echo $_smarty_tpl->tpl_vars['res']->value['s_code'];?>
</span></p>
                <p>单价:&nbsp;&nbsp;&nbsp;<span>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['res']->value['m_price'];?>
元</span></p>
                <p>总计:&nbsp;&nbsp;&nbsp;<span>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['res']->value['num']*$_smarty_tpl->tpl_vars['res']->value['m_price'];?>
元</span></p>
            </div>
            <div style="clear:both"></div>
            <input type="hidden" name="order_id" value="<?php echo $_smarty_tpl->tpl_vars['orderid']->value;?>
" />

            <h3><span>请核对以上信息,如确认无误后,请您在2分钟之内完成付款操作</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3>
            <button style="background-color: #d9534f;border-color: #d43f3a;color: #fff;font-size: 18px;">确认付款</button>
            <hr>
        </div>
    </form>
    <div style="width: 100%;height: 100px;clear:both"></div>


</body>

</html>
<?php }
}
