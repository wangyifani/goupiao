<?php
	class AdminControl{
		//管理员列表显示
		public function index(){
			$arr=((new Name)->showName($_SESSION['user']));
			$link=new Model('admin_user');
			$num=$link->count();
			$n=5;
			$page=new Page($num,$n);
			$limit=$page->limit();
			$res=$link->limit($limit)->select();

			include('./view/admin_user_show.html');
		}
		//管理员添加页面显示
		public function add(){
			$arr=((new Name)->showName($_SESSION['user']));
			include('./view/admin_user_add.html');
		}
		//执行添加管理员
		public function doadd(){
			$link=new Model('admin_user');

			//验证用户id格式
			$name=$_POST['username'];
			if(!preg_match('/^[a-zA-Z0-9][a-zA-Z0-9_]{4,15}$/',$name)){
				echo "<script>alert('用户名格式不对劲');location.href='index.php?m=admin&a=add'</script>";
				die();
			}
			//验证用户名是否存在
			$username=$_POST['username'];
			$res_username=$link->where("username='{$username}'")->select();
			if($res_username[0]['username']==$username){
				echo "<script>alert('名称已存在');location.href='index.php?m=admin&a=add'</script>";
				die();
			}
			//验证密码格式
			$pwd=$_POST['pwd'];
			if(!preg_match('/^[a-zA-Z]\w{5,17}$/',$pwd)){
				echo "<script>alert('密码不正确');location.href='index.php?m=admin&a=add'</script>";
				die();
			}
			$repwd=$_POST['repwd'];
			if($pwd==$repwd){
			//验证重复密码格式
			if(!preg_match('/^[a-zA-Z]\w{5,17}$/',$pwd)){
				echo "<script>alert('密码不正确');location.href='index.php?m=admin&a=add'</script>";
				die();
			}
			}else{
				echo "<script>alert('两次密码不一致');location.href='index.php?m=admin&a=add'</script>";
				die();
			}

			//验证手机号格式
			$phone=$_POST['phone'];
			if(!preg_match('/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|7[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/',$phone)){
				echo "<script>alert('请输入正确的手机号码');location.href='index.php?m=admin&a=add'</script>";
				die();
			}
			//验证邮箱格式
			$email=$_POST['email'];
			if(!preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/',$email)){
				echo "<script>alert('请输入正确的邮箱地址');location.href='index.php?m=admin&a=add'</script>";
				die();
			}

			//添加时间
			$addtime=$_POST['addtime'];
			$status=$_POST['status'];
			$nickname=$_POST['nickname'];
			$arr=['username'=>"{$name}",'nickname'=>"{$nickname}",'pwd'=>md5("{$pwd}"),'phone'=>"{$phone}",'email'=>"{$email}",'addtime'=>"{$addtime}"];
			$row=$link->Add($arr);
			if($row){
				echo "<script>alert('添加成功');location.href='index.php?m=admin&a=index'</script>";
			}
		}
		//执行删除管理员
		public function dodelete(){
			$id=$_GET['id'];
			$link=new Model('admin_user');
			$res=$link->where("id={$id}")->select();

			$user=$_SESSION['user'];
			$res_state=$link->where("username='{$user}'")->select();
			//判断当前登录管理员是谁
			if($res_state[0]['state']==0){
				echo "<script>alert('您是普通管理员,没有删除权限');location.href='index.php?m=admin&a=index'</script>";
				die();
			}
			//判断超级管理员不能被删除
			if($res[0]['state']==1){
				echo "<script>alert('超级管理员不能被删除');location.href='index.php?m=admin&a=index'</script>";
			}else{
				$link->del($id);
				echo "<script>alert('删除管理员成功');location.href='index.php?m=admin&a=index'</script>";
			}
		}
		//执行禁用管理员
		public function dodisable(){
			$id=$_GET['id'];
			$link=new Model('admin_user');
			$res=$link->where("id={$id}")->select();
			$user=$_SESSION['user'];
			$res_state=$link->where("username='{$user}'")->select();
			//判断当前登录管理员是谁
			if($res_state[0]['state']==0){
				echo "<script>alert('您是普通管理员,没有禁用权限');location.href='index.php?m=admin&a=index'</script>";
				die();
			}
			//判断超级管理员不能被禁用
			if($res[0]['state']==1){
				echo "<script>alert('超级管理员不能被禁用');location.href='index.php?m=admin&a=index'</script>";
			}else{
				if(empty($res[0]['status'])){
					$res[0]['status']=1;
					echo "<script>alert('解封管理员成功');location.href='index.php?m=admin&a=index'</script>";
				}else{
					$res[0]['status']=0;
					echo "<script>alert('禁用管理员成功');location.href='index.php?m=admin&a=index'</script>";
				}
			}
			$status=$res[0]['status'];
			@$arr=[status=>"{$status}"];
			$link->update($arr,$id);
		}
		//修改管理员信息页面显示
		public function edit(){
			$arr=((new Name)->showName($_SESSION['user']));
			$id=$_GET['id'];
			$link=new Model('admin_user');
			$res=$link->where("id={$id}")->select();
			//判断当前登录管理员是什么权限
			if($res[0]['state']==1){
				if($res[0]['username']==$_SESSION['user']){
					include('./view/admin_user_edit.html');
				}else{
					echo "<script>alert('您是普通管理员,没有修改其他管理员权限');location.href='index.php?m=admin&a=index'</script>";
					die();
				}
			}else{
				include('./view/admin_user_edit.html');
			}
		}
		public function doedit(){
			$id=$_GET['id'];
			$nickname=$_POST['nickname'];
			//验证密码格式
			$pwd=$_POST['pwd'];
			if(!preg_match('/^[a-zA-Z]\w{5,17}$/',$pwd)){
				echo "<script>alert('密码格式不正确');location.href='index.php?m=admin&a=edit&id=".$id."'</script>";
				die();
			}
			$repwd=$_POST['repwd'];
			if($pwd==$repwd){
			//验证重复密码格式
			if(!preg_match('/^[a-zA-Z]\w{5,17}$/',$pwd)){
				echo "<script>alert('重复密码格式不正确');location.href='index.php?m=admin&a=edit&id=".$id."'</script>";
				die();
			}
			}else{
				echo "<script>alert('两次密码不一致');location.href='index.php?m=admin&a=edit&id=".$id."'</script>";
				die();
			}
			//验证手机号格式
			$phone=$_POST['phone'];
			if(!preg_match('/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|7[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/',$phone)){
				echo "<script>alert('请输入正确的手机号码');location.href='index.php?m=admin&a=edit&id=".$id."'</script>";
				die();
			}
			//验证邮箱格式
			$email=$_POST['email'];
			if(!preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/',$email)){
				echo "<script>alert('请输入正确的邮箱地址');location.href='index.php?m=admin&a=edit&id=".$id."'</script>";
				die();
			}

			$link=new Model('admin_user');
			$res1=$link->select();
			// var_dump($res1[0]);

			if($nickname==$res1[0]['nickname'] && md5($pwd)==$res1[0]['pwd'] && $phone==$res1[0]['phone'] && $email==$res1[0]['email'] ){
				echo "<script>alert('信息跟之前一样的');location.href='index.php?m=admin&a=edit'</script>";
				die;
			}else{
				$arr=['nickname'=>"{$nickname}",'pwd'=>md5("{$pwd}"),'phone'=>"{$phone}",'email'=>"{$email}"];

				$res=$link->update($arr,$id);
				if($res){
					echo "<script>alert('管理员信息修改成功');location.href='index.php?m=admin&a=index'</script>";
				}
			}

		}
		public function doserch(){
			$arr=((new Name)->showName($_SESSION['user']));
			$link=new Model('admin_user');

			if($_POST['search']){
				//echo $_POST['serch'];
				$res=$link->where("nickname like '%{$_POST['search']}%'")->select();
				$num=count($res);
				$n=2;
				$page=new Page($num,$n);
				$limit=$page->limit();
				$res=$link->limit($limit)->select();
				$shang=$page->showPage()['shangye'];
				$xia=$page->showPage()['xiaye'];
				$qishi=$page->showPage()['qishi'];
				$zuizhong=$page->showPage()['zuizhong'];
				$dangqian=$page->showPage()['dangqian'];
				include('./view/admin_user_show.html');
			}else{
				echo "<script>alert('无数据');location.href='index.php?m=admin&a=doserch'</script>";
			}
		}
	}
