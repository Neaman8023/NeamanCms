<?php
// +----------------------------------------------------------------------
// | Neaman [游者]
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | Author: neaman
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 安装脚本
// +----------------------------------------------------------------------
namespace app\apidoc\install;

use sys\InstallBase;

class install extends InstallBase
{
    /**
     * 安装完回调
     * @return boolean
     */
    public function end()
    {
        //复制路由
        $route_file = APP_PATH . str_replace("/", DIRECTORY_SEPARATOR, "apidoc/install/route_apidoc.php");
        copy($route_file, ROOT_PATH . 'route' . DIRECTORY_SEPARATOR . 'route_apidoc.php');
        return true;
    }

}
