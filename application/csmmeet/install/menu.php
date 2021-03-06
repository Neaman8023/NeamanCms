<?php
return [
    [
        //父菜单ID，NULL或者不写系统默认，0为顶级菜单
        "parentid"  => 0,
        //地址，[模块/]控制器/方法
        "route"     => "csmmeet/room/index",
        //类型，1：权限认证+菜单，0：只作为菜单
        "type"      => 0,
        //状态，1是显示，0不显示（需要参数的，建议不显示，例如编辑,删除等操作）
        "status"    => 1,
        //名称
        "name"      => "会议室预约",
        //图标
        "icon"      => "icon-draft-line",
        //备注
        "remark"    => "",
        //排序
        "listorder" => 3,
        //子菜单列表
        "child"     => [
            [
                "route"  => "csmmeet/building/index",
                "type"   => 1,
                "status" => 1,
                "name"   => "会议室预约",
                "icon"   => "icon-draft-line",
                "child"  => [
                    [
                        "route"  => "csmmeet/building/index",
                        "type"   => 1,
                        "status" => 1,
                        "name"   => "大楼管理",
                        "icon"   => "icon-draft-line",
                        "child"  => [
                            [
                                "route"  => "csmmeet/building/index",
                                'name' => '查看',
                                "type"   => 1,
                                "status" => 0,
                            ],
                            [
                                "route"  => "csmmeet/building/add",
                                'name' => '添加',
                                "type"   => 1,
                                "status" => 0,
                            ],
                            [
                                "route"  => "csmmeet/building/edit",
                                'name' => '修改',
                                "type"   => 1,
                                "status" => 0,
                            ],
                            [
                                "route"  => "csmmeet/building/del",
                                'name' => '删除',
                                "type"   => 1,
                                "status" => 0,
                            ]
                        ],
                    ],
                    [
                        "route"  => "csmmeet/room/index",
                        "type"   => 1,
                        "status" => 1,
                        "name"   => "会议室管理",
                        "icon"   => "icon-label",
                        "child"  => [
                            [
                                "route"  => "csmmeet/room/index",
                                'name' => '查看',
                                "type"   => 1,
                                "status" => 0,
                            ],
                            [
                                "route"  => "csmmeet/room/add",
                                'name' => '添加',
                                "type"   => 1,
                                "status" => 0,
                            ],
                            [
                                "route"  => "csmmeet/room/edit",
                                'name' => '修改',
                                "type"   => 1,
                                "status" => 0,
                            ],
                            [
                                "route"  => "csmmeet/room/del",
                                'name' => '删除',
                                "type"   => 1,
                                "status" => 0,
                            ]
                        ],
                    ],
                    [
                        "route"  => "csmmeet/apply/index",
                        "type"   => 1,
                        "status" => 1,
                        "name"   => "预约审核管理",
                        "icon"   => "icon-label",
                        "child"  => [
                            [
                                "route"  => "csmmeet/apply/index",
                                'name' => '查看',
                                "type"   => 1,
                                "status" => 0,
                            ],
                            [
                                "route"  => "csmmeet/apply/add",
                                'name' => '添加',
                                "type"   => 1,
                                "status" => 0,
                            ],
                            [
                                "route"  => "csmmeet/apply/edit",
                                'name' => '修改',
                                "type"   => 1,
                                "status" => 0,
                            ]
                        ],
                    ],
                ],
            ],
  
        ],
    ],
];
