<?php
// +----------------------------------------------------------------------
// | Neaman [游者]
// +----------------------------------------------------------------------
// | Author: neaman
// +----------------------------------------------------------------------
// | 模型验证
// +----------------------------------------------------------------------
namespace app\cms\validate;

use think\Validate;

class Models extends Validate
{
    //定义验证规则
    protected $rule = [
        'name|模型名称' => 'require|chs|max:30|unique:model',
        'tablename|表键名' => 'require|lower|max:20|unique:model|alpha',
        'type|模型类型' => 'in:1,2',
    ];
}
