<?php
// +----------------------------------------------------------------------
// | Neaman [游者]
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | Author: neaman
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 邮件插件
// +----------------------------------------------------------------------
namespace addons\saiyouems;

use addons\saiyouems\lib\Ems;
use sys\Addons;

class Saiyouems extends Addons
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

    /**
     * 邮箱发送行为
     * @param   Sms     $params
     * @return  boolean
     */
    public function emsSend($params)
    {
        $ems    = new Ems();
        $result = $ems->email($params['email'])->subject('邮件验证')->text("你的邮件验证码是：{$params['code']}")->send();
        return $result;
    }

    /**
     * 邮箱发送通知
     * @param   array   $params
     * @return  boolean
     */
    public function emsNotice($params)
    {
        $ems    = new Ems();
        $result = $ems->email($params['email'])->subject($params['title'])->text($params['msg'])->send();
        return $result;
    }

    /**
     * 检测验证是否正确
     * @param   Sms     $params
     * @return  boolean
     */
    public function emsCheck($params)
    {
        return true;
    }

}
