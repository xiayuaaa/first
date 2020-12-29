<?php
require "test.php";
$our=new Mysql();
$limit=$_POST['limit'];
$curr=($_POST['page']-1)*$limit;
$arr=$our->seleteb('mytest',$curr,$limit);
$res=$our->seletec('mytest');
$count=count($res);
$arr=['code'=>'0','msg'=>'','count'=>$count,'data'=>$arr];
echo json_encode($arr);
