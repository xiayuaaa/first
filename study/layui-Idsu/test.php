<?php
class Mysql
{
  public   $db;
  public   function __construct()
  {
    $this->db = new PDO("mysql:host=localhost;dbname=myDB", 'root', 'yu771407573');
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

//分页查询
  public function seleteb($table, $curr, $limit)
  {
    $sql = "select * from $table where is_delete=0 limit $curr,$limit ";
    $db =  $this->db;
    $s = $db->query($sql);
    while ($row = $s->fetch(PDO::FETCH_ASSOC)) {
      $arr[] = $row;
    }
    return $arr;
  }

//查询所有数据
  public function seletec($table)
  {
    $sql = "select * from $table where is_delete=0 ";
    $db =  $this->db;
    $s = $db->query($sql);
    while ($row = $s->fetch(PDO::FETCH_ASSOC)) {
      $arr[] = $row;
    }
    return $arr;
  }

//数据新增
  public function add($table, $username, $password, $email)
  {
    // $time = time();
    $sql = "insert into $table  (username,password,email) values('$username','$password','$email')";
    $db = $this->db;
    $row = $db->query($sql);
    return $row;
  }

  //数据删除
  public function delete($table, $id)
  {
    $sql = "delete from $table where id= '$id'";
    $db = $this->db;
    $row = $db->exec($sql);
    return $row;
  }
//数据修改
  public function update($table, $username, $password, $email, $id)
  {
    $time = time();
    $sql = "update  $table set username='$username',password='$password',email='$email' where id='$id'";
    $db = $this->db;
    $row = $db->exec($sql);
    return $row;
  }
  //根据ID查询
  public function select($table, $id)
  {
    $sql = "select * from  $table where id='$id'";
    $db = $this->db;
    $s = $db->query($sql);
    $row = $s->fetch(PDO::FETCH_ASSOC);
    return $row;
  }
  //根据用户名查询所有数据
  public function selecta($username)
  {
    $sql = "select * from  mytest where  username='$username'";
    $db = $this->db;
    $s = $db->query($sql);
    $row = $s->fetch(PDO::FETCH_ASSOC);
    return $row;
  }
}
