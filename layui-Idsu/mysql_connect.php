<?php
$servername = "localhost";
$username = "root";
$password = "yu771407573";
$dbname = "myDB";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    // echo  "连接失败:" . $conn->connect_error . "<br>";
} else {
    // echo "连接成功" . "<br>";
}
?>