<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
  <link rel="stylesheet" href="/layui/css/layui.css" media="all">
  <script src="/layui/layui.js"></script>

</head>

<body>

  <script>
    var url = location.search;
    var str = url.substr(4);
    var strs = str.split("&");
    document.getElementById("uid").value = "值";

    function retur() {
      window.location.href = "main.php";
    }
    // alert(strs);
  </script>

  <form action="update.php" method="POST" class="layui-form">
    <div class="layui-form-item"></div>
    <label class="layui-form-label">修改ID</label>
    <div class="layui-input-block">
      <input type="text" name="uid" lay-verify="title" id="uid" autocomplete="off" value=" <?php
                                                                                            echo $_GET['id'];
                                                                                            ?>" placeholder="不可输入" class="layui-input" ; readonly>
    </div>
    </div>

    <div class="layui-form-item"></div>
    <label class="layui-form-label">用户名：</label>
    <div class="layui-input-block">
      <input type="text" name="uusername" lay-verify="title" autocomplete="off" placeholder="请输入用户名" class="layui-input">
    </div>
    </div>

    <div class="layui-form-item"></div>
    <label class="layui-form-label">密码：</label>
    <div class="layui-input-block">
      <input type="text" name="upassword" lay-verify="title" autocomplete="off" placeholder="请输入密码" class="layui-input">
    </div>
    </div>

    <div class="layui-form-item">
      <label class="layui-form-label">邮箱</label>
      <div class="layui-input-block">
        <input type="text" name="email" lay-verify="required" lay-reqtext="必填项，岂能为空？" placeholder="请输入邮箱" autocomplete="off" class="layui-input">
      </div>
    </div>

    <div class="layui-form-item">
      <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        <button type="reset" class="layui-btn layui-btn-primary" onclick="retur()">返回</button>
      </div>
    </div>
  </form>
</body>

</html>