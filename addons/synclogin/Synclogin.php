<?php
// +----------------------------------------------------------------------
// | Neaman [游者]
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | Author: neaman
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 第三方插件
// +----------------------------------------------------------------------
namespace addons\synclogin;

use app\member\service\User;
use sys\Addons;
use think\Db;

class Synclogin extends Addons
{
    //安装
    public function install()
    {
        return true;
    }

    //卸载
    public function uninstall()
    {
        return true;
    }

    public function syncLogin($param)
    {
        $this->assign($param);
        $config = $this->getAddonConfig();
        $this->assign('config', $config);
        return $this->fetch('login');
    }

    public function userConfig($param)
    {
        $this->assign($param);
        $config = $this->getAddonConfig();
        $this->assign('config', $config);
        $arr  = array();
        $type = explode(',', $config['type']);
        if (is_array($type)) {
            foreach ($type as &$v) {
                $arr[$v]['name']    = strtolower($v);
                $arr[$v]['is_bind'] = $this->check_is_bind_account(User::instance()->isLogin(), strtolower($v));
                if ($arr[$v]['is_bind']) {
                    $token = Db::name('sync_login')->where(array('type' => strtolower($v), 'uid' => User::instance()->isLogin()))->find();
                    //$user_info = \addons\synclogin\ThinkSDK\GetInfo::getInstance($arr[$v]['name'], array('access_token' => $token['oauth_token'], 'openid' => $token['oauth_token_secret']));
                    //$arr[$v]['info'] = $user_info;
                }
            }
            unset($v);
            $this->assign('list', $arr);
            $this->assign('addon_config', $config);
        }
        return $this->fetch('syncbind');
    }

    protected function check_is_bind_account($uid = 0, $type = '')
    {
        $check = Db::name('sync_login')->where(array('uid' => $uid, 'type' => $type))->count();
        if ($check > 0) {
            return true;
        }
        return false;
    }

}
