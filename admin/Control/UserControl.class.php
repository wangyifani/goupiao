<?php
    class UserControl{

        //用户列表展示页面
        public function show(){
            $link=new Model('user');
            $res=$link->Select();
            include('./view/admin_user_show.html');
        }

        //封禁用户
        public function fengjin(){
            $link=new Model('user');
            $row=$link->Update(['status'=>0],$_GET['id']);
            if($row){
                echo json_encode(1);
            }else{
                echo json_encode(0);
            }
        }

        //解除用户封禁
        public function nofengjin(){
            $link=new Model('user');
            $row=$link->Update(['status'=>1],$_GET['id']);
            if($row){
                echo json_encode(1);
            }else{
                echo json_encode(0);
            }
        }




    }
