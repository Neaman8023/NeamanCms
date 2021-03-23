<?php
// +----------------------------------------------------------------------
// | Neaman [游者]
// +----------------------------------------------------------------------
// | Author: neaman
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 百度推送插件
// +----------------------------------------------------------------------
namespace addons\baidupush;

use addons\baidupush\library\Push;
use sys\Addons;

class Baidupush extends Addons
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

    public function baidupush($params, $extra = null)
    {
        $config = $this->getAddonConfig();
        $urls   = is_string($params) ? [$params] : $params;
        $extra  = $extra ? $extra : 'urls';
        $status = explode(',', $config['status']);
        foreach ($status as $index => $item) {
            if ($extra == 'urls' || $extra == 'append') {
                Push::connect(['type' => $item])->realtime($urls);
            } elseif ($extra == 'del' || $extra == 'delete') {
                Push::connect(['type' => $item])->delete($urls);
            }
        }
    }

}
