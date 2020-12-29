<?php
require "test.php";
$userName = $_POST['username'];
$passWord = $_POST['password'];
$email = $_POST['email'];
$our=new mysql();
if ($userName != null && $passWord != null && $email != null) {
    $result=$our->add('mytest', $userName, $passWord, $email);
    if ($result) {
        echo "数据插入成功" . "<a  href='main.php' >返回</a>";
    } else {
        echo "插入失败" . $result;
    }
} else {
    echo "插入数据不能为空!" . "<br>" . "<a href='add.html'>返回</a>";
}

