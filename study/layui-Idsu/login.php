<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户登录</title>
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" href="/layui/css/layui.css" media="all">
    <script src="/layui/layui.js"></script>
</head>

<body>

    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;" >
        <legend>用户登录</legend>
    </fieldset>

    <form action="" method="POST" class="layui-form">
        <div class="layui-form-item"></div>
        <label class="layui-form-label">用户名：</label>
        <div class="layui-input-block">
            <input type="text" name="username" lay-verify="title" autocomplete="off" placeholder="请输入用户名" class="layui-input">
        </div>
        </div>

        <div class="layui-form-item"></div>
        <label class="layui-form-label">密码：</label>
        <div class="layui-input-block">
            <input type="password" name="password" lay-verify="title" autocomplete="off" placeholder="请输入密码" class="layui-input">
        </div>
        </div>

        <div class="layui-input-block">
      <textarea class="layui-textarea layui-hide" name="content" lay-verify="content" id="LAY_demo_editor"></textarea>
    </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
               
            </div>
        </div>
    </form>
 
    <hr>

    <?php
       session_start();
    require "test.php";
    $our = new Mysql();
    $userName = $_POST['username'];
    $password = $_POST['password'];
    if ($userName != null && $password != null) {
        $res = $our->selecta($userName);
        if ($res) {
            if ($res['password'] == $password) {
                $_SESSION['username'] = $res['username'];
                header('Location:main.php' . "?username= $userName");
            } else {
                echo "用户名或密码错误，请重新输入";
            }
        } else {
            echo "用户不存在" . "<br>" . "<a href='User.php'>返回登录页面</a>";
        }
    } else if ($userName == null && $password == null) {
        echo "请输入登录信息";
    } else if ($userName == null && $password != null) {
        echo "用户名不能为空,请重新输入";
    } else if ($userName != null && $password == null) {
        echo "密码不能为空,请重新输入";
    }

    ?>

</body>

</html>