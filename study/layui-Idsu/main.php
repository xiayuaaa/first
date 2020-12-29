<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>数据查询</title>
    <link rel="stylesheet" href="/layui/css/layui.css" media="all">
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="/layui/layui.js"></script>
    <?php
    session_start();
    $username = $_SESSION['username'];
    if (!$username) {
        echo "当前用户未登录，请先登录";
        return;
    }
    echo "<h1>" . "当前用户：" . $username . "</h1>";

    ?>
    <script>
        layui.use(['table'], function() {
            var table = layui.table;
            var laypage = layui.laypage;
            //监听工具条
            table.on('tool(demo)', function(obj) {
                var data = obj.data;
                id = data['id'];
                if (obj.event === 'detail') {
                } else if (obj.event === 'del') {
                            var did = id;
                            $.ajax({
                                url: "delete.php",
                                success: function(result) {
                                    window.location.reload();
                                },
                                data: {
                                    "id": did,
                                },
                                error: function(e) {
                                    debugger
                                },
                                dataType: 'json',
                                type: 'post',
                            });
                        
                    window.location.href = "main.php?id=" + id + " ";
                } else if (obj.event === 'edit') {
                    window.location.href = "edit.php?id=" + id + " ";
                }
            });
            table.render({
                elem: '#num',
                height: 400,
                url: 'seletec.php',
                page: true,
                method: 'post',
                limit: 8,
                limits: [2, 3, 5, 8, 10],
                cols: [
                    [{
                            field: 'id',
                            title: 'ID',
                            width: 80,
                            sort: true,
                            fixed: 'left'
                        },
                        {
                            field: 'username',
                            title: '用户名',
                            width: 80
                        },
                        {
                            field: 'password',
                            title: '密码',
                            width: 120
                        },
                        {
                            field: 'email',
                            title: '邮箱',
                            width: 150
                        },
                        {
                            field: 'is_delete',
                            title: '状态',
                            width: 80
                        },
                        {
                            fixed: 'right',
                            width: 200,
                            align: 'center',
                            toolbar: '#barDemo'
                        }

                    ]
                ],

            })

        });


        //添加
        function add() {
            window.location.href = "add.html";
        }

        function Logout() {
            $.ajax({
                url: "Logout.php",
                success: function(session) {
                    if (session) {
                        alert("用户注销失败");

                    } else {
                        window.location.href = "login.php";
                    }

                },
                error: function(e) {
                    debugger
                }
            });
        }
    </script>

    <div class="layui-btn-group demoTable">
        <button class="layui-btn" data-type="getCheckData" onclick="add()">新增</button>
        <button class="layui-btn" data-type="getCheckData" onclick="Logout()">注销</button>
    </div>
    <script type="text/html" id="barDemo">
        <!-- <a class="layui-btn layui-btn-xs" lay-event="detail" type="submit" onclick="selec()">查看</a> -->
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>

</head>

<body>
    </table>
    <table class="layui-hide" id="num" lay-filter="demo"></table>
    </div>
</body>

</html>