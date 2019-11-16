<?php
	class IndexControl{
		//首页后台显示
		public function index(){
			//返回右侧管理员昵称和管理员权限
			@$arr=((new Name)->showName($_SESSION['admin']));
			//引入后台首页

			include('./view/index.html');
		}
		//显示登录页面
		public function login(){
			include('./view/login.html');
		}
		//执行登录操作
		public function dologin(){
			$user=$_POST['user'];
			$pwd=md5($_POST['pwd']);

			$link=new Model('admin_user');
			$res=$link->Where("user='{$user}'")->Select();
			//验证账号状态,如果状态为0不能登录
			if($res[0]['status']==0){
				echo "<script>alert('账号被封,不能登录');location.href='index.php'</script>";
			}else{
				if($res){
					if($pwd==$res[0]['pwd']){
						$_SESSION['admin']['user']=$user;
						$_SESSION['admin']['status']= $res[0]['status'];
						echo "<script>alert('登录成功');location.href='index.php'</script>";
					}else{
						echo "<script>alert('登录失败');location.href='index.php'</script>";
					}
				}
			}
		}
		//执行退出登录
		public function out(){
			unset($_SESSION['admin']);
			echo "<script>alert('您已经成功退出账号');location.href='index.php?m=index&a=login'</script>";
		}
	}
