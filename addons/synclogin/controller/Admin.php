<?php
// +----------------------------------------------------------------------
// | Neaman [游者]
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | Author: neaman
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 第三方登录管理
// +----------------------------------------------------------------------
namespace addons\synclogin\Controller;

use app\addons\util\Adminaddon;

class Admin extends Adminaddon
{

    public function index()
    {
        return $this->fetch();
    }

}
