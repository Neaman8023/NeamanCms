<?php
// +----------------------------------------------------------------------
// | Neaman [游者]
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | Author: neaman
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 卸载脚本
// +----------------------------------------------------------------------
namespace app\collection\uninstall;

use think\Db;
use \sys\UninstallBase;

class Uninstall extends UninstallBase
{
    //固定相关表
    private $modelTabList = array(
        'collection_node',
        'collection_content',
        'collection_program',
    );

    //卸载
    public function run()
    {
        if (request()->param('clear') == 1) {
            //删除固定表
            if (!empty($this->modelTabList)) {
                foreach ($this->modelTabList as $tablename) {
                    if (!empty($tablename)) {
                        $tablename = config('database.prefix') . $tablename;
                        Db::execute("DROP TABLE IF EXISTS `{$tablename}`;");
                    }
                }
            }
        }
        return true;
    }

}
