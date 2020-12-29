<?php
declare (strict_types = 1);

namespace app\validate;

use think\Validate;

class Message extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'content'  =>  'require|max:40',

    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [
        'content'  =>  '留言内容必须填写',

    ];

}
