<?php
// +----------------------------------------------------------------------
// | Neaman [游者]
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | Author: neaman
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 验证码管理
// +----------------------------------------------------------------------
namespace addons\vaptcha\Controller;

use addons\vaptcha\library\Vaptcha as VaptchaLib;
use app\addons\util\AddonsBase;

class Index extends AddonsBase
{

    public function init()
    {
        $offline_action = $this->request->param('offline_action/s');
        $v              = $this->request->param('v/s');
        $callback       = $this->request->param('callback/s');
        $config         = get_addon_config('vaptcha');
        if (!$config['appvid'] || !$config['appkey']) {
            $this->error('请先在后台中配置vaptcha验证的参数信息');
        }
        $VaptchaLib = new VaptchaLib($config['appvid'], $config['appkey']);
        if ($v) {
            $knock = $this->request->param('knock/s');
            echo $VaptchaLib->offline($offline_action, $callback, $v, $knock);
        } else {
            echo $VaptchaLib->offline($offline_action, $callback);
        }

    }

}
