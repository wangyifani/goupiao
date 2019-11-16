<?php
/* Smarty version 3.1.33, created on 2019-11-16 09:04:25
  from '/Applications/MAMP/htdocs/goupiao/view/center.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dcf4b19b355e0_86952850',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9cb8b7a8ca7711a9793c2ce975eb2cb9fce24799' => 
    array (
      0 => '/Applications/MAMP/htdocs/goupiao/view/center.html',
      1 => 1573866265,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
  ),
),false)) {
function content_5dcf4b19b355e0_86952850 (Smarty_Internal_Template $_smarty_tpl) {
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
    <title>个人中心</title>
    <style>
        .header{
            width: 100%;
            height: 80px;
            background: #fff;
            position: fixed;
            box-shadow: 0 0 10px #ddd;
            z-index: 10;
            padding-top: 15px;
        }
        .box{
            width: 100%;
            height: 600px;
            margin-top: 90px;
            /* border:1px solid red; */
        }
    </style>
</head>

<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="container">
        <div class="box">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">我的购票订单记录 - <?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
</div>

                <!-- Table -->
                <table class="table">
                    <tr>
                        <th>订单号</th>
                        <th>影片名</th>
                        <th>大厅</th>
                        <th>座位号</th>
                        <th>数量</th>
                        <th>单价</th>
                        <th>下单时间</th>
                        <th>订单状态</th>
                        <th>操作</th>
                    </tr>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['res']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                    <tr del=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['order_code'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['m_name'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['h_name'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['s_code'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['num'];?>
 张</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['m_price'];?>
 元</td>
                        <!-- <?php echo $_smarty_tpl->tpl_vars['v']->value['order_time'];?>
 -->
                        <td><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['v']->value['order_time']);?>
</td>
                        <?php if ($_smarty_tpl->tpl_vars['v']->value['static'] == 1) {?>
                        <td>未付款</td>
                        <td>
                            <a href="javascript:void(0)" class="btn btn-info" onclick="fk(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['v']->value['r_id'];?>
)">去付款</a>
                            <a href="javascript:void(0)" class="btn btn-danger" onclick="del(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
)">删除</a>
                        </td>
                        <?php } else { ?>
                        <td>已付款</td>
                        <td>
                            <a href="javascript:void(0)" class="btn btn-success" onclick="pj()">去评价</a>
                            <a href="javascript:void(0)" class="btn btn-danger" onclick="del(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
)">删除</a>
                        </td>
                        <?php }?>
                    </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </table>
            </div>
        </div>
    </div>
</body>

<?php echo '<script'; ?>
>
    //执行删除
    function del(id){
        var qr=confirm('确定删除这条购买记录吗?');
        if(qr){
            $.getJSON('./action.php',{'a':'delEle','id':id},function(data){
                if(data){
                    $("[del="+id+"]").remove(); //删除元素
                }
            })
        }
    }
    //去付款
    function fk(id,rid){
        $.getJSON('./action.php',{'a':'qfk','id':id},function(data){
            if(data){
                location.href="./buy.php?order_id="+id+"&rid="+rid;
            }else{
                alert("该订单已超时,无法付款.请重新选票!");
            }
        })
    }

    //评价
    function pj(){
        alert('等待添加');
    }

<?php echo '</script'; ?>
>


</html>
<?php }
}
