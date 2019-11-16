<?php
	/*
	图片缩放类
	返回值:false
	 */
    class Imageresize{

        public $picname; //被缩放的图片路径, **如果与原图片存放在同一路径下,此属性值填写图片名**
        public $path; //被缩放后的图片路径
        public $maxWidth; //图片被缩放后的最大宽度
        public $maxHeight; //图片被缩放后的最大高度
        public $pre; //被缩放后的图片吗前缀

        public function __construct($picname, $path, $maxWidth, $maxHeight, $pre = "s_"){
            $this->picname = $picname;
            $this->path = $path = rtrim($path, "/") . "/";
            $this->maxWidth = $maxWidth;
            $this->maxHeight = $maxHeight;
            $this->pre=$pre;
            $this->start();
        }

        //定义方法
        public function start(){
            //1获取被缩放的图片信息
            $info = getimagesize($this->path . $this->picname);
            //获取图片的宽和高
            $width = $info[0];
            $height = $info[1];
        //2根据图片类型，使用对应的函数创建画布源。
        switch ($info[2]) {
            case 1: //gif格式
                $srcim = imagecreatefromgif($this->path . $this->picname);
                break;
            case 2: //jpeg格式
                $srcim = imagecreatefromjpeg($this->path . $this->picname);
                break;
            case 3: //png格式
                $srcim = imagecreatefrompng($this->path . $this->picname);
                break;
            default:
                return false;
                //die("无效的图片格式");
                break;
        }
        //3. 计算缩放后的图片尺寸
        if ($this->maxWidth / $width < $this->maxHeight / $height) {
            $w = $this->maxWidth;
            $h = ($this->maxWidth / $width) * $height;
        } else {
            $w = ($this->maxHeight / $height) * $width;
            $h = $this->maxHeight;
        }
        //4. 创建目标画布
        $dstim = imagecreatetruecolor($w, $h);
        //5. 设置填充颜色
        $white = imagecolorallocate($dstim, 255, 255, 255); //默认缩放透明图后的背景为白色
        imagefill($dstim, 0, 0, $white);
        //6. 开始绘画(进行图片缩放)
        imagecopyresampled($dstim, $srcim, 0, 0, 0, 0, $w, $h, $width, $height);

        //7. 输出图像另存为
        switch ($info[2]) {
            case 1: //gif格式
                imagegif($dstim, $this->path . $this->pre . $this->picname);
                break;
            case 2: //jpeg格式
                imagejpeg($dstim, $this->path . $this->pre . $this->picname);
                break;
            case 3: //png格式
                imagepng($dstim, $this->path . $this->pre . $this->picname);
                break;
        }

        //7. 释放资源
        imagedestroy($dstim);
        imagedestroy($srcim);

        return true;


        }
    }
