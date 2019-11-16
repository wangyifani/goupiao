<?php
	//1.创建画布
	//2.分配颜色
	//3.进行绘画(干扰掉，干扰先，验证文字)
	//4.告诉浏览器画的是什么
	//5.输出或者保存图像
	//6.释放资源
	//__tostring()

	class Vcode{
		//成员属性
		private $width;
		private $height;
		private $codeNum;
		private $fontFamily;
		private $image;
		private $font;
		//成员方法
		//构造方法
		function __construct($fontFamily='',$width=100,$height=40,$codeNum=4){
			//开启session
			session_start();
			$this->width = $width;
			$this->height = $height;
			$this->codeNum = $codeNum;
			$this->fontFamily = $fontFamily;
		}
		//简化操作
		function __tostring(){
			$this->getCreateImg();//创建画布
			$this->setPixel();//输出干扰点
			$this->setLine();//输出干扰线
			$this->setChar();//输出文字
			$this->outputImage();//输出图像
			//保存验证码
			$_SESSION['code'] = $this->font;

			return '';
		}
		//1.实现创建画布的方法
		private function getCreateImg(){
			$this->image = imagecreatetruecolor($this->width,$this->height);
			//为画布制作背景颜色
			$back = imagecolorallocate($this->image,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
			//填充背景
			imagefill($this->image,0,0,$back);
			//分配边框颜色
			$borderColor = imagecolorallocate($this->image,255,0,0);
			//为背景绘制边框
			imagerectangle($this->image,0,0,$this->width-1,$this->height-1,$borderColor);

		}
		//2.画干扰点
		private function setPixel(){
			for ($i=0; $i < 300; $i++) {
				//需要给干扰点分配颜色
				$pixelColor = imagecolorallocate($this->image,mt_rand(150,200),mt_rand(150,200),mt_rand(150,200));
				//循环画一个单一像素
				imagesetpixel($this->image,mt_rand(2,$this->width-2),mt_rand(2,$this->height-2),$pixelColor);
			}
		}
		//3.画干扰线
		private function setLine(){
			for ($i=0; $i < 10; $i++) {
				//需要给线分配颜色
				$lineColor = imagecolorallocate($this->image,mt_rand(120,150),mt_rand(120,150),mt_rand(120,150));
				//循环画出干扰线
				imageline($this->image,mt_rand(2,$this->width-2),mt_rand(2,$this->height-2),mt_rand(2,$this->width-2),mt_rand(2,$this->height-2),$lineColor);
			}
		}
		//4.画字
		private function setChar(){
			$str = '3456789ABCDEFGHJKLMNPQRSTUVWXYabcdefghijkmnpqrstuvwxyz';
			//获取随机的四个文字并且保存到变量中
			for($i=0;$i<$this->codeNum;$i++){
				$this->font.=$str{mt_rand(0,strlen($str)-1)};
			}
			//将文字写入图片
			if($this->fontFamily == ''){
				//没有传入字体文件 则使用系统内置字体写入
				for($i=0;$i<strlen($this->font);$i++){
					$fontColor = imagecolorallocate($this->image,mt_rand(0,120),mt_rand(0,120),mt_rand(0,120));
					//设置字体左上角的X点
					$x = $this->width/$this->codeNum*$i+mt_rand(3,8);
					//设置字体左上角的Y点
					$y = mt_rand(10,$this->height/2);
					//写入字体
					imagechar($this->image,mt_rand(3,5),$x,$y,$this->font{$i},$fontColor);
				}
			}else{
				//传入字体 使用传入的字体文件
				for($i=0;$i<strlen($this->font);$i++){
					$fontColor = imagecolorallocate($this->image,mt_rand(0,120),mt_rand(0,120),mt_rand(0,120));
					$x = $this->width/$this->codeNum * $i + mt_rand(5,8);
					$y = mt_rand($this->height/2,$this->height);
					imagettftext($this->image,mt_rand($this->height/3,$this->height/2),mt_rand(0,45),$x,$y,$fontColor,$this->fontFamily,$this->font{$i});
				}
			}

		}
		//5.告诉浏览器图像的相关信息
		private function outputImage(){
			header('Content-type:image/jpeg');
			imagejpeg($this->image);
		}
		//6.释放资源  析构方法
		function __destruct(){
			imagedestroy($this->image);
		}
	}

	//echo new Vcode('./xiaomi.ttf');