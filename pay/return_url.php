<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>支付结果页面</title>
</head>
<body>
	<?php
		$data['out_trade_no']=$_GET['out_trade_no']; //获取返回的订单号
		require "../class/Model.class.php";
		$time=time();
		$mod=new Model();
		$sql = "update morder set static=0,buy_time={$time} where order_code=:out_trade_no";
		$n=$mod->update($sql,$data);
		//判断影响行数
		if($n){
			echo "<h1>支付成功</h1>";
			echo '<p><h1><a href="../index.php">返回首页</a></h1></p>';
		}else{
			echo "<h1>支付失败</h1>";
			echo '<p><h1><a href="../index.php">返回首页</a></h1></p>';
		}


		/*
		array (size=18)
			'body' => string '支付测试' (length=12)
			'buyer_email' => string 'qxu1146490264@qq.com' (length=20)
			'buyer_id' => string '2088022234717293' (length=16)
			'exterface' => string 'create_direct_pay_by_user' (length=25)
			'is_success' => string 'T' (length=1)
			'notify_id' => string 'RqPnCoPT3K9%2Fvwbh3IhxGDg%2BfEPoWMAQTw8GYWsYOPorTMuaLuf9sJwjeN1E127qlSTB' (length=72)
			'notify_time' => string '2019-11-12 20:53:58' (length=19)
			'notify_type' => string 'trade_status_sync' (length=17)
			'out_trade_no' => string '1573658840' (length=10)
			'payment_type' => string '1' (length=1)
			'seller_email' => string 'admin@4g.gs' (length=11)
			'seller_id' => string '2088511431932344' (length=16)
			'subject' => string '神奇动物在哪里' (length=21)
			'total_fee' => string '0.01' (length=4)
			'trade_no' => string '2019111222001417290524942248' (length=28)
			'trade_status' => string 'TRADE_SUCCESS' (length=13)
			'sign' => string '19926ba6e1d93004d0e6d1bcf2b1ced2' (length=32)
			'sign_type' => string 'MD5' (length=3)
		*/




	?>
</body>
</html>
