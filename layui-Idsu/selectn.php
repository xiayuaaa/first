<?php
require 'test.php';
$our=new Mysql();

$arr=$our->seletec('mytest');
echo json_encode($arr);
?>