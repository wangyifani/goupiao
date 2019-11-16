<?php
/* Smarty version 3.1.33, created on 2019-11-14 20:37:37
  from '/Applications/MAMP/htdocs/goupiao/view/select.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dcd4a918801f7_39457968',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8575bfc4778f414570ada4f9a2fad6bfaa6d065d' => 
    array (
      0 => '/Applications/MAMP/htdocs/goupiao/view/select.html',
      1 => 1573735057,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
  ),
),false)) {
function content_5dcd4a918801f7_39457968 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>选择座位</title>
    <link rel="stylesheet" href="public/bs/css/bootstrap.min.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="public/js/jquery-1.8.3.min.js"><?php echo '</script'; ?>
>
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
            /*  max-height: 1000px;*/
            overflow-x: auto;
            padding: 20px;
            width: 1200px;
        }

        #ss,
        #sss {
            font-size: 12px;
            color: red;
            float: left;
            display: block;
            margin-left: -50px;
            margin-top: 10px;
            width: 80px;
            height: 20px;
            /* border:1px solid red; */
        }

        .qxz {
            width: 100%;
            height: 30px;
            text-align: center;
            font-size: 20px;
            color: #EC7453;
            /* display: none; */
        }
        .header{
            width: 100%;
            height: 80px;
            background: #fff;
            /* position: fixed; */
            box-shadow: 0 0 10px #ddd;
            z-index: 10;
            padding-top: 15px;
            margin-bottom: 20px;

        }
    </style>
</head>

<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <form action="./order.php" method="post" id="ff" name="regForm">
        <div id="movie">
            <div id="m_info">
                <p>影片名称:&nbsp;&nbsp;&nbsp;<span><?php echo $_smarty_tpl->tpl_vars['data']->value['m_name'];?>
</span></p>
                <p>放映厅:&nbsp;&nbsp;&nbsp;<span><?php echo $_smarty_tpl->tpl_vars['data']->value['h_name'];?>
</span></p>
                <p>影片时长:&nbsp;&nbsp;&nbsp;<span><?php echo $_smarty_tpl->tpl_vars['data']->value['m_time'];?>
分钟</span></p>
                <p>时间:&nbsp;&nbsp;&nbsp;<span><?php echo $_smarty_tpl->tpl_vars['data']->value['start_time'];?>
</span></p>
            </div>
            <div id="m_order">
                <br>
                <br>
                <br>
                <p><input type="hidden" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
"></span> </p>
                <input type="hidden" name="rid" value="<?php echo $_smarty_tpl->tpl_vars['rid']->value;?>
">
                <p><span><input type="submit" class="btn btn-success" value="请选座后,点击购买"></span></p>
                <div class="available"
                    style="width: 70px;height: 30px;border-radius:5px;text-align:center;line-height:30px;float:left">可选
                </div>
                <div class="selected"
                    style="width: 70px;height: 30px;border-radius:5px;text-align:center;line-height:30px;float:left">已售
                </div>
            </div>
            <div style="clear:both"></div>
            <hr>
            <div class="qxz"></div>
        </div>
        <div class="container">
            <div id="code">
                <div id="seat-map">
                    <div class="clear seatCharts">1</div>
                    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

                    <div>
                    </div>

                </div>
            </div>
    </form>
    <div style="width: 100%;height: 100px;clear:both"></div>
</body>

<?php echo '<script'; ?>
>
    var yzm;
    var count = 0; //判断选座的数量

    //判断所有复选框状态,未选中无法提交购买
    $(".xz").change(function () {
        //将选座的数量赋值给count
        count = $("[type=checkbox]:checked").length;
        if (count) {
            if (count > 6) {
                $('.qxz').html('你一次不能购买超过6个座位!');
            } else {
                $('.qxz').html('');
            }
        } else {
            $('.qxz').html('请选座');
        }
    })

    //提交表单方法
    $("[name=regForm]").submit(function () {
        //再次校验是否选座
        $(".xz").trigger('change');
        if (count > 0 && count <= 6) {
            return true;
        } else {
            return false;
        }

    });

<?php echo '</script'; ?>
>

</html>
<?php }
}
