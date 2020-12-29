<?php


namespace app\controller;

use think\captcha\facade\Captcha;
use app\validate\register;
use think\facade\Db;


class Login
{
//登录
    public function login()
    {
        $username = $_GET['username'];
        $password = $_GET['password'];
        $user = Db::table('tp_user')->where('username', $username)->find();

        // 用户不存在
        if (!$user) {
            return ['code' => '0', 'msg' => '用户不存在'];
        }
        // 密码错误
        if ($user['password'] != md5($password)) {
            return ['code' => '0', 'msg' => '密码错误'];
        }
        $id = $user['id'];
        $nickname = $user['nickname'];
        $email = $user['email'];
        $jwt = signToken($user['id']);
        return ['code' => '1',
            'data' => ['nickname' => $nickname, 'email' => $email, 'id' => $id, 'jwt' => $jwt],
            'msg' => '登录成功'];

    }

    //验证码
    public function captcha($id = '')
    {
        return captcha($id);
    }

    public function verify()
    {
        ob_clean();
        $verify = new \Think\Verify();
        $verify->entry();
    }


    //验证用户登录，返回用户ID
    public function checkUser()
    {
        $jwt = $_GET['jwt'];
        $obj = checkToken($jwt);
        return json($obj);
    }


    //注册
    public function register()
    {
        //获取用户名密码等信息
        $nickname = $_GET['nickname'];
        $username = $_GET['username'];
        $password = $_GET['password'];
        $email = $_GET['email'];
        $tel = $_GET['tel'];
        $validate = new register;

        $result = $validate->check([
            'nickname' => $nickname,
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'tel' => $tel,
        ]);
        if (!$result) {
            return json(['code' => 0, 'message' => $validate->getError(), 'data' => []]);
        }

        $data = [
            'nickname' => $nickname,
            'username' => $username,
            'password' => md5($password),//密码加密
            'email' => $email,
            'tel' => $tel
        ];

        Db::name('tp_user')->insert($data);
        return json(['code' => 1, 'message' => '注册成功', 'data' => []]);

    }

}