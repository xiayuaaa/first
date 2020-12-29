<?php


namespace app\controller;


use app\validate\Message;
use think\facade\Db;

class MessageBord
{
    //分页
    public function select($page, $limit)
    {
        $curr = ($page - 1) * $limit;
        $result = Db::table("tp_message")
            ->where('is_delete', 0)
            ->order("create_time", "desc")
            ->limit($curr, $limit)
            ->select();
        $messageCount = Db::table("tp_message")->where('is_delete', 0)->select();
        $count = count($messageCount);
        $result = ['code' => '0', 'msg' => '', 'count' => $count, 'data' => $result];
        return json($result);
    }

    //修改留言
    public function update()
    {
        $time = time();
        $tid = $_GET['tid'];
        $user_id = $_GET['user_id'];
        $content = $_GET['content'];
        $token = $_GET['token'];
        $result = checkToken($token);
        $res = json_decode(json_encode($result), true);
        $uid = $res['data']['uid'];
        $validate = new Message;
        $result = $validate->check([
            'content' => $content,
        ]);
        if (!$result) {
            return json(['code' => 0, 'message' => $validate->getError(), 'data' => []]);
        }
        //解析失败
        if ($result['code'] != 1) {
            $result = ['code' => '0', 'message' => '解析失败'];
            return json($result);
        }
        //用户不一致
        if ($uid != $user_id) {
            $result = ['code' => '0', 'message' => '用户不一致'];
            return json($result);
        }

        //修改留言
        $data = [
            'update_time' => date("Y-m-d H:i:s", $time),
            'content' => $content
        ];

        Db::name('tp_message')->where('tid', $tid)->update($data);
        return json(['code' => 1, 'message' => '修改成功', 'data' => []]);
    }

    //软删除数据
    public function delete()
    {
        //获取需要的数据
        $tid = $_GET['tid'];
        $user_id = $_GET['user_id'];
        $token = $_GET['jwt'];
        $result = checkToken($token);
        $res = json_decode(json_encode($result), true);
        $uid = $res['data']['uid'];
        // 解析失败
        if ($result['code'] != 1) {
            $result = ['code' => '0', 'message' => '解析失败'];
            return json($result);
        }
        // 用户不一致
        if ($uid != $user_id) {
            $result = ['code' => '0', 'message' => '用户不一致'];
            return json($result);
        }
        //删除留言
        $data = [
            'is_delete' => '1'
        ];
        Db::name('tp_message')->where('tid', $tid)->update($data);
        return json(['code' => 1, 'message' => '删除成功', 'data' => []]);
    }

    //增加留言
    public function insert()
    {
        $time = time();
        $User_id = $_GET['User_id'];
        $nickname = $_GET['nickname'];
        $email = $_GET['email'];
        $content = $_GET['content'];
        $validate = new Message;
        $result = $validate->check([
            'content' => $content,
        ]);
        if (!$result) {
            return json(['code' => 0, 'message' => $validate->getError(), 'data' => []]);
        }
        //添加留言信息
        $data = [
            'create_time' => date("Y-m-d H:i:s", $time),//现在的时间
            'nickname' => $nickname,
            'content' => $content,
            'email' => $email,
            'user_id' => $User_id
        ];
        Db::name('tp_message')->insert($data);
        return json(['code' => 1, 'message' => '插入成功', 'data' => []]);
    }
}