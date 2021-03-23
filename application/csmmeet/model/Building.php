<?php

namespace app\csmmeet\model;



use app\common\model\Modelbase;

class Building extends Modelbase
{

    protected $autoWriteTimestamp = true;
    protected $createTime = 'create_time';// 默认create_time
    protected $updateTime = 'update_time';// 默认update_time

    
     public function getStatusList()
     {
         return ['normal' =>'显示', 'hidden' =>'隐藏'];
     }
     /**
      * 创建大楼
      * @param type $data 提交数据
      * @return boolean
      */
     public function addModel($data)
     {
         if (empty($data)) {
             throw new \Exception('数据不得为空！');
         }
         //添加模型记录
         if ($res = self::create($data)) {
             cache("Building", null);
         }
     }

//     public function getStatusTextAttr($value, $data)
//     {
//         $value = $value ? $value : (isset($data['status']) ? $data['status'] : '');
//         $list = $this->getStatusList();
//         return isset($list[$value]) ? $list[$value] : '';
//     }




}
