<?php
// +----------------------------------------------------------------------
// | Neaman [游者]
// +----------------------------------------------------------------------
// | Author: neaman
// +----------------------------------------------------------------------
// | Trait Curd
// +----------------------------------------------------------------------
namespace app\admin\library\traits;


use think\Db;

trait Curd
{
    
    /**
     * 排除前台提交过来的字段
     * @param $params
     * @return array
     */
    protected function preExcludeFields($params)
    {
        if (is_array($this->excludeFields)) {
            foreach ($this->excludeFields as $field) {
                if (key_exists($field, $params)) {
                    unset($params[$field]);
                }
            }
        } else {
            if (key_exists($this->excludeFields, $params)) {
                unset($params[$this->excludeFields]);
            }
        }
        return $params;
    }
    
    
    //查看
    public function index()
    {
        if ($this->request->isAjax()) {
            //如果发送的来源是Selectpage，则转发到Selectpage
            if ($this->request->request('keyField')) {
                return $this->selectpage();
            }
            list($page, $limit, $where) = $this->buildTableParames();
            $order = $this->request->param("order/s", "DESC");
            $sort = $this->request->param("sort", !empty($this->modelClass) && $this->modelClass->getPk() ? $this->modelClass->getPk() : 'id');

            $count = $this->modelClass
                ->where($where)
                ->order($sort, $order)
                ->count();

            $data = $this->modelClass
                ->where($where)
                ->order($sort, $order)
                ->page($page, $limit)
                ->select();
            $result = ["code" => 0, 'count' => $count, 'data' => $data];
            return json($result);
        }
        return $this->fetch();
    }

    /**
     * 添加
     */
    public function add()
    {
        if ($this->request->isPost()) {
            
            $params = $this->request->post();
            if ($params) {
                $result = false;
                Db::startTrans();
                try {
                    //是否采用模型验证
                    if ($this->modelValidate) {
                        $result = $this->validate($params,$this->modelValidate);
                        if (true !== $result) {
                            return $this->error($result);
                        }
                    }
                    $result = $this->modelClass->allowField(true)->save($params);
                    Db::commit();
                } catch (ValidateException $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                } catch (PDOException $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                } catch (Exception $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                }
                if ($result !== false) {
                    $this->success('新增成功！');
                } else {
                    $this->error('No rows were inserted');
                }
            }
            $this->error('Parameter %s can not be empty');
        }
        return $this->view->fetch();
    }
    
    /**
     * 编辑
     */
    public function edit()
    {
        $ids = $this->request->param('id/d', 0);
        if (empty($ids)) {
            $this->error('参数错误！');
        }
        
        $data = $this->modelClass->where('id',$ids)->find();
        
        if (!$data) {
            $this->error('No Results were found');
        }
      
        if ($this->request->isPost()) {
            $params = $this->request->post();
            if ($params) {
                $params = $this->preExcludeFields($params);
                $result = false;
                Db::startTrans();
                try {
                    //是否采用模型验证
                    if ($this->modelValidate) {
                        $result = $this->validate($params,$this->modelValidate);
                        if (true !== $result) {
                            return $this->error($result);
                        }
                    }
                    $result = $data->allowField(true)->save($params);
                    Db::commit();
                } catch (ValidateException $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                } catch (PDOException $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                } catch (Exception $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                }
                if ($result !== false) {
                    $this->success('修改成功');
                } else {
                    $this->error('No rows were updated');
                }
            }
            $this->error('Parameter %s can not be empty');
        }
        $this->view->assign("row", $data);
        return $this->view->fetch();
    }
    

    //删除
    public function del()
    {
        $ids = $this->request->param('ids/a', null);
        if (empty($ids)) {
            $this->error('参数错误！');
        }
        if (!is_array($ids)) {
            $ids = array(0 => $ids);
        }
        $pk = $this->modelClass->getPk();
        $list = $this->modelClass->where($pk, 'in', $ids)->select();
        $count = 0;
        try {
            foreach ($list as $k => $v) {
                $count += $v->delete();
            }
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
        if ($count) {
            $this->success("操作成功！");
        } else {
            $this->error('没有数据删除！');
        }
    }

    //批量更新
    public function multi()
    {
        $id = $this->request->param('id/d', 0);
        $value = $this->request->param('value/d', 0);
        if ($this->request->has('param')) {
            $param = $this->request->param('param/s');
            $param = in_array($param, (is_array($this->multiFields) ? $this->multiFields : explode(',', $this->multiFields))) ? $param : '';
            if ($param) {
                try {
                    $row = $this->modelClass->find($id);
                    if (empty($row)) {
                        $this->error('数据不存在！');
                    }
                    $row->{$param} = $value;
                    $row->save();
                } catch (\Exception $e) {
                    $this->error($e->getMessage());
                }
                $this->success("操作成功！");
            } else {
                $this->error('操作不允许！');
            }
        }
        $this->error('Param参数不能为空');
    }

}
