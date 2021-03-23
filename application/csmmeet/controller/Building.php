<?php

// +----------------------------------------------------------------------
// Csmmeet [ CSMMeet会议室预约系统 ]
// Author: neaman
// Create by neaman at 2020-02-26
// +----------------------------------------------------------------------
namespace app\csmmeet\controller;


use app\common\controller\Adminbase;
use app\csmmeet\model\Building as ModelBuilding;
use think\Db;


/**
 * 大楼
 *
 * @icon fa fa-circle-o
 */
class Building extends Adminbase
{
    /**
     * Building模型对象
     *
     * @var \app\admin\model\csmmeet\Building
     */
    protected $modelClass= null;
    //数据校验
    protected $modelValidate =null;

    public function initialize()
    {
        parent::initialize();
        $this->modelValidate = 'Building';
        $this->modelClass = new ModelBuilding();
    }

   //显示页
    public function index()
    {

        if($this->request->isAjax()){
            $count =$this->modelClass->count();
            $data = $this->modelClass->order('weigh','desc')->select();
           return json(['code'=>0,'count'=>$count,'data'=>$data]);
        }
        return $this->fetch();
    }
  
    //更新状态
    public function multi()
    {
        cache("Buildind", null);
        return parent::multi();
    }
}
