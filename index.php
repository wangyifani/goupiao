<?php
	require "./lib/Smarty.class.php";
	require "./class/Model.class.php";
	session_start();
	$mod = new Model();
	$tpl = new Smarty;
	$tpl->setTemplateDir("./view");
	$tpl->cache_dir='./cache';
	// $tpl->caching=1;
	$tpl->cache_lifetime=60; //设置缓存时间
	//判断缓存
	if(!$tpl->isCached('index.html')){
		//准备sql
		$sql="select m.*,r.m_id from movie as m, relss as r where m.id=r.m_id and m.status=1 group by r.m_id";
		//执行sql
		$data=$mod->get($sql);
		$str='';
		foreach ($data as $row) {
			$path= "./public". $row['picurl'];
			$xq= mb_substr($row['content'], 0, 30)."...";
			$url= "./mvinfo.php?mid=". $row['m_id'];
			$str .= "<tr class='moves'>
				<th><img src='{$path}'></th>
				<th>{$row['m_name']}</th>
				<th>{$row['m_director']}</th>
				<th>{$row['actor']}</th>
				<th style='width:250px'>{$xq}</th>
				<th style='width:100px'>{$row['m_time']}</th>
				<th style='width:100px'>{$row['m_price']}</th>
				<th style='width:100px'><a href='{$url}' class='btn btn-success'>查看详情</a></th>
			</tr>";
		}

		//分配session中的用户名(如果存在)
		if(isset($_SESSION['user'])){
			$tpl->assign('phone', $_SESSION['user']['phone']);
		}else{
			$tpl->assign('phone', '');
		}

		$tpl->assign('str', $str);
	}
	$tpl->display('index.html');
