<?php
// +----------------------------------------------------------------------
// | Neaman [游者]
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | Author: neaman
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 模块模型
// +----------------------------------------------------------------------
namespace app\admin\model;

use think\Model;

/**
 * 模块模型
 */
class Module extends Model
{
    protected $autoWriteTimestamp = true;
    //自动完成
    protected $auto = ['iscore' => 0, 'status' => 1];

    /**
     * 更新缓存
     * @return type
     */
    public function module_cache()
    {
        $data = self::column(true, 'module');
        if (empty($data)) {
            return false;
        }
        $module = array();
        foreach ($data as &$v) {
            to_time($v, 'create_time');
            $module[$v['module']] = $v;
        }
        unset($v);
        cache('Module', $module);
        return $module;
    }

}
