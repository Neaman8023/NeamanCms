<?php
// +----------------------------------------------------------------------
// | Neaman [游者]
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | Author: fastadmin: https://www.fastadmin.net/
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 短信插件
// +----------------------------------------------------------------------
namespace addons\signin;

use sys\Addons;
use util\File;

class Signin extends Addons
{
    //安装
    public function install()
    {
        //前台模板
        $installdir = ADDON_PATH . "signin" . DIRECTORY_SEPARATOR . "install" . DIRECTORY_SEPARATOR;
        if (is_dir($installdir . "template" . DIRECTORY_SEPARATOR)) {
            //拷贝模板到前台模板目录中去
            File::copy_dir($installdir . "template" . DIRECTORY_SEPARATOR, TEMPLATE_PATH . 'default' . DIRECTORY_SEPARATOR . 'addons' . DIRECTORY_SEPARATOR);
        }
        return true;
    }

    //卸载
    public function uninstall()
    {
        if (is_dir(TEMPLATE_PATH . 'default' . DIRECTORY_SEPARATOR . 'addons' . DIRECTORY_SEPARATOR . 'signin' . DIRECTORY_SEPARATOR)) {
            File::del_dir(TEMPLATE_PATH . 'default' . DIRECTORY_SEPARATOR . 'addons' . DIRECTORY_SEPARATOR . 'signin' . DIRECTORY_SEPARATOR);
        }
        return true;
    }

    /**
     * 会员中心边栏后
     * @return mixed
     * @throws \Exception
     */
    public function userSidenavAfter()
    {
        return $this->fetch('user_sidenav_after');
    }

}
