<?php
$id = $_POST['id'];
require "test.php";
$our=new mysql();
$result=$our->delete('mytest',$id);
