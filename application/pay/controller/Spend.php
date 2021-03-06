<?php
// +----------------------------------------------------------------------
// | Neaman [游者]
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | Author: neaman
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 会员支付前台
// +----------------------------------------------------------------------
namespace app\pay\controller;

use app\common\controller\Adminbase;
use app\pay\model\Spend as SpendModel;

class Spend extends Adminbase
{
    protected function initialize()
    {
        parent::initialize();
        $this->modelClass = new SpendModel;

    }
}
