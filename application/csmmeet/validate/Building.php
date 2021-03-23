<?php

namespace app\csmmeet\validate;

use think\Validate;

class Building extends Validate
{
    /**
     * 验证规则
     */
    protected $rule = [
        'name|大楼名称' => 'require|chs|max:30|unique:model',
    ];
    /**
     * 提示消息
     */
    protected $message = [
    ];
    /**
     * 验证场景
     */
    protected $scene = [
        'add'  => [],
        'edit' => [],
    ];
    
}
