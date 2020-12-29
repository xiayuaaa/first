<?php
declare (strict_types=1);

namespace app\validate;

use think\Validate;

class register extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'nickname' => 'max:12',
        'username' => 'require|max:10',
        'password' => 'require|max:20',
        'email' => 'email',
        'tel' => 'require|max:15',
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [
        'nickname' => '昵称不得超过12个字节',
        'username' => '用户名必须填写',
        'password' => '密码必须填写',
        'email' => '邮箱格式错误',
        'tel' => '联系方式必须填写',

    ];
}
