<?php


namespace app\controller;

//use app\BaseController;
use think\facade\Db;

class Test
{

//分页
    public function select($page, $limit)
    {
        $curr = ($page - 1) * $limit;
        $result = Db::table("tp_message")->where('is_delete', 0)->limit($curr, $limit)->select();
        $result1 = Db::table("tp_message")->where('is_delete', 0)->select();
        $count = count($result1);
        $result = ['code' => '0', 'msg' => '', 'count' => $count, 'data' => $result];
        return json($result);

    }


    //根据用户查询信息
    public function uselect($dbname)
    {
        $username = $_GET['username'];
        $password = $_GET['password'];
        $user = Db::table($dbname)->where('username', $username)->find();
        // 用户不存在
        if (!$user) {
            return ['code' => '0', 'msg' => '用户不存在'];
        }
        // 密码错误
        if ($user['password'] != md5($password)) {
            return ['code' => '0', 'msg' => '密码错误'];
        }
        $jwt = signToken($user['id']);
        return ['code' => '1', 'data' => $jwt, 'msg' => '登录成功'];

        /* $result = ['code' => '1', 'data' => $result];
         $code = $result['code'];
         $passWord = $result['data'][0]['password'];
         $id = $result['data'][0]['id'];
         $nickname = $result['data'][0]['nickname'];
         $email = $result['data'][0]['email'];
         $arr = array();
         $arr = [$code, $id, $nickname, $email];
         if ($username != null && $password != null) {
             if (md5($passWord) == md5($password)) {
                 return json($arr);
             } else {
                 return 0;
             }
         }*/
    }



//用户注册
    public function register()
    {
        $nickname = $_GET('nickname');
        $username = $_GET('username');
        $password = $_GET('password');
        $email = $_GET('email');
        $data = [
            'Nickname' => $nickname,
            'username' => $username,
            'password' => $password,
            'email' => $email
        ];
        return Db::name('tp_user')->replace()->insert($data);
    }

    //修改留言
    public function update()
    {
        $time = time();
        $tid = $_GET['tid'];
        $content = $_GET['content'];
        $data = [
            'update_time' => date("Y-m-d H:i:s", $time),
            'content' => $content
        ];
        $result = Db::name('tp_message')->where('tid', $tid)->update($data);
        return $result;
    }

//软删除数据
    public function delete()
    {
        $tid = $_GET['tid'];
        $data = [
            'is_delete' => '1'
        ];
        $result = Db::name('tp_message')->where('tid', $tid)->update($data);
        return $result;
//        return Db::getLastSql();
    }

//增加留言
    public function insert()
    {
        $time = time();
        $user_id = $_GET['user_id'];
        $nickname = $_GET['nickname'];
        $email = $_GET['email'];
        $content = $_GET['content'];
        $data = [
            'create_time' => date("Y-m-d H:i:s", $time),
            'nickname' => $nickname,
            'content' => $content,
            'email' => $email,
            'user_id' => $user_id
        ];
        $result = Db::name('tp_message')->insert($data);
        return $result;
//        ->where('tid',$tid)
    }

    public function save()
    {
        $data = ['username' => '暗裔剑魔-亚托克斯',
            'password' => '123456',
        ];
        return Db::name('tp_user')->where('id', 63)->save($data);
    }

    public function query()
    {
        $result = Db::name('mytest')->where('id', '<>', '93')->select()->toArray();
        echo json_encode($result);
    }

}