<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    div.sel {
        width: 575px;
        height: 400px;
        padding: 50px;
        border: 5px solid gray;
        margin: 250px;
        float: right;
        margin-right: 40%;
        background-color: antiquewhite;
        box-sizing: border-box;
    }

    div.Return {
        position: relative;
        top: 100px;
        right: -300px;
    }
</style>
<script>
    function Return() {
        window.location.href = "main.php";
    }
</script>

<body>
    <?php
    $id = $_POST['pid'];
    require "test.php";
    if ($id != null) {
        $our = new mysql();
        $res = $our->select('mytest', 2);
        echo " <div class='sel'><table border=\"1\">
    <tr>
      <th>id</th>
      <th>username</th>
      <th>password</th>
      <th>email</th>
    </tr>
    <tr>
    
    <td>{$res['id']}</td>
      <td>{$res['username']}</td>
      <td>{$res['password']}</td>
      <td>{$res['email']}</td>
      </tr>  </div>";
    } else {
        echo "<h1 >id不能为空<h1>";
    }

    ?>
    <div class="Return">
        <button id="return" onclick="Return()">返回
        </button>
    </div>

</body>

</html>