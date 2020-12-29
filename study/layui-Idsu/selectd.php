<?php
require "test.php";
$our=new Mysql();
$res=$our->seletec('mytest');
echo json_encode($res);