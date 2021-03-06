<?php
// +----------------------------------------------------------------------
// | Neaman [游者]
// +----------------------------------------------------------------------
// | Author: neaman
// +----------------------------------------------------------------------
// | 支付模块信息文件
// +----------------------------------------------------------------------
return array(
    //模块名称[必填]
    'name'        => '会议室预约',
    //模块简介[选填]
    'introduce'   => 'CMS会议室预约',
    //模块作者[选填]
    'author'      => 'neaman',
    //作者地址[选填]
    'authorsite'  => '',
    //作者邮箱[选填]
    'authoremail' => '',
    //版本号，请不要带除数字外的其他字符[必填]
    'version'     => '1.0.0',
    //适配最低yzncms版本[必填]
    'adaptation'  => '1.0.0',
    //签名[必填]
    'sign'        => 'b803d6de0bf866df8350ca074efdd02e',
    //依赖模块
    'need_module' => [
    ],
    //依赖插件
    'need_plugin' => [],
    //缓存，格式：缓存key=>array('module','model','action')
//     'cache'       => [
//         'Pay_Config' => [
//             'name'   => '会议室预约',
//             'model'  => 'Csmmeet',
//             'action' => 'meet_cache',
//         ],
//     ],
    // 数据表，不要加表前缀[有数据库表时必填]
    'tables'      => [
       'csmmeet_building',
        'csmmeet_room',
        'csmmeet_apply',
        'csmmeet_applyhour'
    ],
);
