<?php
// +----------------------------------------------------------------------
// | Neaman [游者]
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | Author: neaman
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 后台用户管理
// +----------------------------------------------------------------------
namespace app\admin\model;

use app\admin\service\User;
use think\Model;

class Adminlog extends Model
{
    protected $autoWriteTimestamp = true;
    protected $updateTime = false;

    /**
     * 记录日志
     * @param type $message 说明
     * @param  integer $status  状态
     */
    public function record($message, $status = 0)
    {
        $data = array(
            'uid' => (int) User::instance()->isLogin(),
            'status' => $status,
            'info' => "提示语:{$message}",
            'get' => request()->url(),
            'ip' => request()->ip(),
        );
        return $this->save($data) !== false ? true : false;
    }

}
