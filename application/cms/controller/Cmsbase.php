<?php
// +----------------------------------------------------------------------
// | Neaman [游者]
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | Author: neaman
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 前台控制模块
// +----------------------------------------------------------------------
namespace app\cms\controller;

use app\common\controller\Homebase;

class Cmsbase extends Homebase
{
    //CMS模型相关配置
    protected $cmsConfig = [];

    //初始化
    protected function initialize()
    {
        parent::initialize();
        $siteurl         = url('cms/index/index', '', true, false);
        $this->cmsConfig = cache("Cms_Config");
        $this->assign("cms_config", $this->cmsConfig);
        $this->assign("siteurl", $siteurl);
        if (!$this->cmsConfig['web_site_status']) {
            $this->error("站点已经关闭，请稍后访问~");
        }
    }
}
