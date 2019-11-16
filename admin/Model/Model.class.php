<?php
/**
 * 数据库操作类文件
 * 主要包含:增删改查,搜索,分页,排序,多表联查,数据库自加减等
 */
class Model
{
    public $link;
    public $tabName;
    public $obj = null;
    public $where;
    public $limit;
    public $order;
    public $field="*"; //查询字段
    public $table; //多表联查的表名
    //连接数据库
    public function __construct($tabName)
    {
        //初始化表名
        $this->tabName=$tabName;
        $this->connect();
    }
    //连接数据库
    private function connect()
    {
        $this->link = @mysqli_connect(HOST, USER, PWD, DBNAME) or die('数据库连接失败');
        mysqli_set_charset($this->link, 'utf8');
    }

    //查询的字段
    public function Field($a){
        $this->field=$a;
        return $this;
    }

    //查询所有
    public function Select()
    {
        $tabName = $this->tabName;
        $sql = "select {$this->field} from {$tabName} {$this->where} {$this->order} {$this->limit}";
        // var_dump($sql);
        $row = $this->Query($sql);
        return $row;
    }

    //接收多个表名
    //参数1:多个表名的数组
    public function Table(array $arr){
        $str="";
        foreach($arr as $v){
            $str.=$v.",";
        }
        $str=rtrim($str,",");
        $this->table=$str;
        return $this;
    }

    //多表联查
    // $arr=['goods','type'];
    // $m=$a->Field("goods.*,type.id,type.name")->table($arr)->Where("goods.typeid=type.id")->D_select();
    public function D_select(){
        $sql = "select {$this->field} from {$this->table} {$this->where} {$this->order} {$this->limit}";
        // echo $sql;
        $row = $this->Query($sql);
        return $row;
    }

    //模糊查询
    //参数一:要搜索的字段名
    //参数二:要搜索的内容
    public function Like($field, $str)
    {
        $this->where = "where $field like '%{$str}%'";
        return $this;
    }

    //查询总条数
    public function Count()
    {
        $tabName = $this->tabName;
        $sql = "select count(*) as num from {$tabName}";
        $row = $this->Query($sql);
        return $row[0]['num'];
    }

    //最大值
    public function Max($field)
    {
        $tabName = $this->tabName;
        $sql = "select max({$field}) num from {$tabName}";
        $row = $this->Query($sql);
        return $row[0]['num'];
    }

    //最小值
    public function Min($field)
    {
        $tabName = $this->tabName;
        $sql = "select min({$field}) num from {$tabName}";
        $row = $this->Query($sql);
        return $row[0]['num'];
    }

    //条件查询
    public function Where($tj)
    {
        $this->where = "where {$tj}";
        return $this;
    }

    //控制返回结果条数
    public function Limit($num)
    {
        $this->limit = "limit {$num}";
        return $this;
    }

    //结果排序
    //参数1:根据哪个字段进行排序
    //参数2:可选参数,默认是1(正序),2(倒序)
    public function Order($m, $n = 1)
    {
        if ($n == 1) {
            //正序
            $this->order = "order by {$m}";
        } else if ($n == 2) {
            //倒序
            $this->order = "order by {$m} desc";
        } else {
            return false;
        }
        return $this;
    }

    //删除
    public function Del($id)
    {
        $tabName = $this->tabName;
        $sql = "delete from {$tabName} where id={$id}";
        $row = $this->Execute($sql);
        return $row;
    }

    //添加
    public function Add($arr)
    {
        $tabName = $this->tabName;
        $k = implode(',', array_keys($arr));
        $v = implode("','", array_values($arr));
        $sql = "insert into {$tabName}($k) values('$v')";
        // var_dump($sql);
        $row = $this->Execute($sql);
        return $row;
    }

    //修改
    public function Update($arr, $id)
    {
        $tabName = $this->tabName;
        //return array_keys($arr);
        $str = '';
        foreach ($arr as $k => $v) {
            $str .= "{$k}='{$v}',";
        }
        $str = rtrim($str, ',');
        $sql = "update {$tabName} set $str where id={$id}";
        // echo $sql;
        $row = $this->Execute($sql);
        return $row;
    }

    //自增自减修改
    public function Zupdate($arr, $id)
    {
        $tabName = $this->tabName;
        //return array_keys($arr);
        $str = '';
        foreach ($arr as $k => $v) {
            $str .= "{$k}={$v},";
        }
        $str = rtrim($str, ',');
        $sql = "update {$tabName} set $str where id={$id}";
        // echo $sql;
        $row = $this->Execute($sql);
        return $row;
    }

    //执行查询的sql语句
    private function Query($sql)
    {
        // var_dump($sql);
        $res = mysqli_query($this->link, $sql);
        // $row = mysqli_fetch_all($res, 1);
        while ($rows = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $row[] = $rows;
        }
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    //执行修改/删除的sql语句
    private function Execute($sql)
    {
        // return $sql;
        $res = mysqli_query($this->link, $sql);
        if ($res) {
            if (mysqli_insert_id($this->link)) {
                return mysqli_insert_id($this->link);
            } else {
                return mysqli_affected_rows($this->link);
            }
        }
    }
}
