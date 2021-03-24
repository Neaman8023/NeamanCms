<?php
// +----------------------------------------------------------------------
// Csmmeet [ CSMMeet会议室预约系统 ]
// Author: Neaman
// Create by chensm at 2021-03-23
// +----------------------------------------------------------------------
namespace app\csmmeet\controller;

use app\common\controller\Adminbase;
use app\csmmeet\model\Room as ModelRoom;

/**
 * 会议室
 *
 * @icon fa fa-circle-o
 */
class Room extends Adminbase
{

    /**
     * Room模型对象
     *
     * @var \app\csmmeet\model\Room
     */
    protected $modelClass= null;

    public function initialize()
    {
        parent::initialize();
        $this->modelClass= new ModelRoom();
        $this->view->assign("needauditList", $this->modelClass->getNeedauditList());
        $this->view->assign("statusList", $this->modelClass->getStatusList());
    }

    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个基础方法、destroy/restore/recyclebin三个回收站方法
     * 因此在当前控制器中可不用编写增删改查的代码,除非需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */
    /**
     * 查看
     */
    public function index()
    {
        
        dump($this->modelClass->getNeedauditList());exit();
        // 设置过滤方法
        
        $this->request->filter([
            'strip_tags'
        ]);
  
        if ($this->request->isAjax()) {
            // 如果发送的来源是Selectpage，则转发到Selectpage
            if ($this->request->request('keyField')) {
                return $this->selectpage();
            }
            list ($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->modelClass->where($where)
                ->order($sort, $order)
                ->count();

                $list = $this->modelClass->alias("t")
                ->field('t.*,t1.name buildingname')
                ->where($where)
                ->join('csmmeet_building t1', 't1.id=t.csmmeet_building_id')
                ->order($sort, $order)
                ->limit($offset, $limit)
                ->select();

          //  $list = collection($list)->toArray();
            $result = array(
                "total" => $total,
                "rows" => $list
            );

            return json($result);
        }
        return $this->view->fetch();
    }
}
