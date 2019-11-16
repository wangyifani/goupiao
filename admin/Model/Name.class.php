<?php
    class Name{
        function showName($user){
            
            $link=new Model('admin_user');

            $res_name=$link->where("username='{$user}'")->select();

            $nickname=$res_name[0]['nickname'];

            if($res_name[0]['state']==1){

                $state="超级管理员";

            }else{

                $state="普通管理员";

            }
            return $arr=[nickname=>"{$nickname}",state=>"{$state}"];

            if($res_name[0]['status']==0){
				unset($_SESSION['user']);
				return "<script>alert('账号被禁用,退出登录');location.href='index.php?m=index&a=login'</script>";
			}
        }

    }