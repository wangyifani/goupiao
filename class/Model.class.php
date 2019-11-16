<?php
//PDO版model类
class Model{
	public $pdo;
	public $where;//修改条件
	public function __construct()
	{
		//数据库连接信息
		$this->pdo = new PDO('mysql:host=127.0.0.1;dbname=dy','root','root');
		$this->pdo->exec("set names utf8");
	}
	//获取数据方法
	public function get($sql){
		try{
			//执行sql
			$stmt=$this->pdo->query($sql);
			//获取结果
			$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
			//返回结果集
			return $data;
		} catch (PDOException $e) {
			$error = $e->getMessage();
			echo $error;
		}
	}

	//插入数据方法
	//首先定义一个存储所有要插入内容的数组 如:$data['r_id'] = $_POST['rid']; 数组下边跟values里面占位的变量相同
	//然后将这个数组当参数传到这里面
	//最后将sql语句传入,sql语句例子如下:
	//$sql = "insert into morder (order_code,r_id,m_id,num,s_code) values(:order_code,:r_id,:m_id,:num,:s_code)";
	public function insert($sql,$arr){
		try {
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute($arr);
			//返回插入成功的id
			return $this->pdo->lastInsertId();
		} catch (PDOException $e) {
			$error = $e->getMessage();
			echo $error;
		}
	}

	//修改条件
	public function where($where){
		$this->where=" {$where} ";
		return $this;
	}

	//修改数据方法
	//注意:修改和插入方法都是一样的必须传入的数组里面的长度等于要绑定变量的长度
	public function update($sql,$arr){
		try {
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute($arr);
			//返回受影响行数
			return $stmt->rowCount();
		} catch (PDOException $e) {
			$error = $e->getMessage();
			echo $error;
		}
	}


	//删除数据方法
	public function del($sql)
	{
		try {
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			//返回受影响行数
			return $stmt->rowCount();
		} catch (PDOException $e) {
			$error = $e->getMessage();
			echo $error;
		}
	}



}
?>
