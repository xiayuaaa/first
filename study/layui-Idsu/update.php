<?php

$id = $_POST['uid'];
$userName = $_POST['uusername'];
$passWord = $_POST['upassword'];
$email = $_POST['email'];
if ($userName != null && $passWord != null) {
    require "test.php";
    $our = new mysql();
    $result = $our->update('mytest', $userName, $passWord, $email, $id);
    if ($result) {
        echo "数据修改成功" . "<br>" . "<a  href='main.php' >返回</a>";
    } else {
        echo "修改失败" . $result;
    }
} else {
    echo "信息不能为空" . "<a  href='main.php' >返回</a>";
}
