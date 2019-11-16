<?php
	//分页类
	class Page{
		//成员属性
		//总条数
		public $maxRows=0;
		//每一页显示的条数
		public $pageSize=0;
		//当前页
		public $page=1;

		//总页数
		public $maxPage=0;

		//存储当前路径
		public $url=null;

		//存储路径参数的
		public $urlParam=null;

		//成员方法
		public function __construct($maxRows,$pageSize="5"){
			//return $maxRows;
			//var_dump($pageSize);
			$this->maxRows=$maxRows;
			$this->pageSize=$pageSize;
			$this->page=isset($_GET['page'])?$_GET['page']:1;
			$this->getMaxPage();

			//获取当前的页的url地址
			$this->url=$_SERVER['PHP_SELF'];

			//调用获取url参数的方法
			$this->urlParam();

			//调用页数最大和最大的限制方法
			$this->checkPage();
		}

		//计算总页数的方法
		public function getMaxPage(){
			//总页数=总条数/每页显示的条数
			$this->maxPage=ceil($this->maxRows/$this->pageSize);
		}

		

		public function limit(){
			/*
				1  0,2
				2  2,2
				3  4,2
			*/
			//当前页-1*$this->pageSize
			$num=($this->page-1)*$this->pageSize;
			$limit=$num.','.$this->pageSize;
			return $limit;
			//limit 0,$this->pageSize  2,2  4,2  6,2
		}

		//获取当前页的参数
		public function urlParam(){
			foreach($_GET as $k=>$v){
				if($k!='page' && $k!=''){
					$this->urlParam.='&'.$k.'='.$v;
				}
			}
		}
		//判断page的最大值和最小值
		public function checkPage(){
			if($this->page>$this->maxPage){
				$this->page=$this->maxPage;
			}
			if($this->page<1){
				$this->page=1;
			}
		}
		public function showPage(){
			//上一页链接
			$shangye=$this->url.'?page='.($this->page-1).$this->urlParam;
			//下一页链接
			$xiaye=$this->url.'?page='.($this->page+1).$this->urlParam;
			//当前页
			$dangqian=$this->page;
			//最终页
			$zuizhong=$this->maxPage;
			//第n页
			// $xiaye=$this->url.'?page='.($this->page=''$i).$this->urlParam;



			$str1='当前页'.$this->page.'/'.$this->maxPage.'页 共'.$this->maxRows.'条';
			$str.='<a href="'.$this->url.'?page=1'.$this->urlParam.'">首页</a>';
 			$str.='<a href="'.$this->url.'?page='.$this->maxPage.''.$this->urlParam.'">尾页</a>';
			return $str;
		}
	}