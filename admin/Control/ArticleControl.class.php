<?php
	class ArticleControl{
		//执行添加
		public function doadd(){
			$link=new Model('movie');
			$time=date('Y-m-d');
			if(!file_exists("../public/Uploads/{$time}")){
				mkdir("../public/Uploads/{$time}");
			}
			// var_dump($_FILES);
			$path = "../public/Uploads/{$time}";
			$upload=new Upload("pic",$path,500000000);
			$res=$upload->do_upload();
			if(!$res){
				echo "<script>alert('上传失败');location='./index.php?m=index'</script>";
				die;
			}
			@$picurl = "/" . ltrim($res['pathinfo'], '../public'); //得到封面上传地址

			$arr=[
					'm_name' => $_POST['m_name'], 'm_time' => $_POST['w'],
					'm_price' => $_POST['m_price'], 'm_version' => $_POST['m_version'],
					'm_type' => $_POST['m_type'], 'm_color' => $_POST['m_color'],
					'actor' => $_POST['actor'], 'm_director' => $_POST['m_director'],
					'content' => $_POST['content'], 'picurl' => $picurl,
					'country_area' => $_POST['country_area'], 'language' => $_POST['laguage'],
					'm_addtime' => $time, 'status' => $_POST['status'],
				];

			$newId=$link->add($arr);
			if($newId){
				echo "<script>alert('添加影片成功!还需去给该影片添加场次');location='./index.php?m=article&a=changci'</script>";
			}else{
				echo "<script>alert('添加失败!');location='./index.php?m=index'</script>";
			}

		}


		public function changci(){
			//查询所有影片
			$link=new Model('movie');
			$movie=$link->Order('id',2)->select();

			//查询所有大厅
			$links=new Model('hall');
			$hall= $links->Order('id')->select();

			include('./view/article_trash.html');
		}

		//执行场次和大厅添加
		public function dochangci(){
			if($_POST['m_id']=='xz'){
				echo "<script>alert('未选中影片!');location='./index.php?m=article&a=changci'</script>";
				die;
			}
			$link=new Model('movie');
			$arr=['movie', 'hall'];
			$res=$link->Field("*")->table($arr)->Where("movie.id={$_POST['m_id']} and hall.id={$_POST['h_id']}")->D_select();
			//准备将数据插入到场次表中
			$links=new Model('relss');
			$insert=['m_id'=>$_POST['m_id'], 'm_name'=>$res[0]['m_name'], 'm_time' => $res[0]['m_time'], 'm_price' => $res[0]['m_price'], 'm_color' => '#00ff44', 'play_type' => $res[0]['m_version'], 'h_id'=> $_POST['h_id'], 'h_name'=>$res[0]['HallName'], 'start_time'=>$_POST['start_time'], 'end_time'=>$_POST['end_time'], 'seating'=>$_POST['seating']];
			$row=$links->add($insert);
			if($row){
				echo "<script>alert('新增场次成功!');location='./index.php?m=index'</script>";
			}else{
				echo "<script>alert('新增场次失败,请重试!');location='./index.php?m=article&a=changci'</script>";
			}

		}


		//管理所有影片
		public function show(){
			$link=new Model('movie');
			$res=$link->Order("id")->Select();
			include('./view/movie_show.html');
		}

		//下架影片
		public function xiajia(){
			$link=new Model('movie');
			$row=$link->Update(['status'=>0],$_GET['id']);
			if($row){
				echo json_encode(1);
			}else{
				echo json_encode(0);
			}
		}

		//上架影片
		public function shangjia(){
			$link=new Model('movie');
			$row=$link->Update(['status'=>1],$_GET['id']);
			if($row){
				echo json_encode(1);
			}else{
				echo json_encode(0);
			}
		}


		//修改影片
		public function edit(){
			$link=new Model('movie');
			$res=$link->Where("id={$_GET['id']}")->Select();
			$res=$res[0];
			include('./view/movie_edit.html');
		}

		//执行影片修改
		public function doedit(){
			$link = new Model('movie');
			$time=date('Y-m-d');
			if($_FILES['pic']['error']==4){
				//没有文件被上传
				$arr = [
					'm_name' => $_POST['m_name'], 'm_time' => $_POST['w'],
					'm_price' => $_POST['m_price'], 'm_version' => $_POST['m_version'],
					'm_type' => $_POST['m_type'], 'm_color' => '#333333',
					'actor' => $_POST['actor'], 'm_director' => $_POST['m_director'],
					'content' => $_POST['content'],'country_area' => $_POST['country_area'], 'language' => $_POST['laguage'],'m_addtime' => $time, 'status' => $_POST['status'],
				];
			}else{
				$path = "../public/Uploads/{$time}";
				$upload = new Upload("pic", $path, 500000000);
				$res = $upload->do_upload();
				if (!$res) {
					echo "<script>alert('图片修改失败');location='./index.php?m=index'</script>";
					die;
				}
				unlink("../public/{$_POST['jiupic']}");
				@$picurl = "/" . ltrim($res['pathinfo'], '../public'); //得到封面上传地址
				$arr = [
					'm_name' => $_POST['m_name'], 'm_time' => $_POST['w'],
					'm_price' => $_POST['m_price'], 'm_version' => $_POST['m_version'],
					'm_type' => $_POST['m_type'], 'm_color' => $_POST['m_color'],
					'actor' => $_POST['actor'], 'm_director' => $_POST['m_director'],
					'content' => $_POST['content'], 'picurl' => $picurl,
					'country_area' => $_POST['country_area'], 'language' => $_POST['laguage'],
					'm_addtime' => $time, 'status' => $_POST['status'],
				];
			}
			$row=$link->Update($arr,$_GET['id']);
			if($row){
				echo "<script>alert('修改影片内容成功!');location='./index.php?m=article&a=show'</script>";
			}else{
				echo "<script>alert('修改影片内容失败!');location='./index.php?m=article&a=show'</script>";
			}
		}


		//修改场次
		public function editRel(){
			$link = new Model('movie');
			$arr=['movie', 'relss'];
			@$movie = $link->Field("movie.m_name,movie.id,movie.m_time,relss.h_id,relss.h_name,relss.seating,relss.start_time,relss.end_time")->table($arr)->Where("movie.id={$_GET['id']} and movie.id=relss.m_id")->D_select();
			if(!$movie){
				echo "<script>alert('该影片暂未添加任何场次,不能修改!');location='./index.php?m=article&a=show'</script>";
				die;
			}
			$linker=new Model('hall');
			$hall=$linker->Order('id')->Select(); //得到座位表

			$links=new Model('relss');
			$relss=$links->Field("relss.*")->table(['movie', 'relss'])->Where("movie.id=relss.m_id and movie.id={$_GET['id']}")->D_select();
			include('./view/relss_edit.html');
		}

		//回填场次信息
		public function htrel(){
			$link = new Model('relss');
			$res=$link->Where("id={$_GET['id']}")->Select();
			echo json_encode($res[0]);



		}

		//删除该场次
		public function delrel(){
			$link = new Model('relss');
			$row=$link->Del($_GET['id']);
			if($row){
				echo json_encode(1);
			}else{
				echo json_encode(0);
			}
		}

		//修改场次
		public function editcc(){
			$link = new Model('relss');
			$arr=[
				'm_id'=>$_POST['m_id'],
				'start_time'=>$_POST['start_time'],
				'end_time'=>$_POST['end_time'],
				'seating'=>$_POST['seating']
			];
			$row=$link->Update($arr,$_POST['r_id']);
			if($row){
				echo "<script>alert('修改影片场次成功!');location='./index.php?m=article&a=editRel&id={$_GET['id']}'</script>";
			}else{
				echo "<script>alert('修改影片场次失败!');location='./index.php?m=article&a=show'</script>";
			}

		}


	}
