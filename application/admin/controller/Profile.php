<?php
// +----------------------------------------------------------------------
// | Neaman [游者]
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | Author: neaman
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 个人资料
// +----------------------------------------------------------------------
namespace app\admin\controller;

use app\admin\model\Adminlog as AdminlogModel;
use app\admin\model\AdminUser;
use app\admin\service\User;
use app\common\controller\Adminbase;
use think\facade\Session;
use think\facade\Validate;

class Profile extends Adminbase
{

    public function index()
    {
        if ($this->request->isAjax()) {
            $this->modelClass           = new AdminlogModel;
            list($page, $limit, $where) = $this->buildTableParames();
            $order                      = $this->request->param("order/s", "DESC");
            $sort                       = $this->request->param("sort", !empty($this->modelClass) && $this->modelClass->getPk() ? $this->modelClass->getPk() : 'id');
            $count                      = $this->modelClass
                ->where($where)
                ->where('uid', (int) User::instance()->isLogin())
                ->order($sort, $order)
                ->count();
            $list = $this->modelClass
                ->where($where)
                ->where('uid', (int) User::instance()->isLogin())
                ->order($sort, $order)
                ->page($page, $limit)
                ->select();

            $result = ["code" => 0, 'count' => $count, 'data' => $list];
            return json($result);
        }
        return $this->fetch();
    }

    //更新个人信息
    public function update()
    {
        if ($this->request->isPost()) {
            $params = $this->request->post();
            $params = array_filter(array_intersect_key(
                $params,
                array_flip(array('email', 'nickname', 'password', 'avatar'))
            ));
            if (!Validate::isEmail($params['email'])) {
                $this->error('请输入正确的Email地址');
            }
            if (isset($params['password'])) {
                if (!Validate::regex($params['password'], "/^[\S]{6,16}$/")) {
                    $this->error('密码长度必须在6-16位之间，不能包含空格');
                }
                $data               = encrypt_password($params['password']);
                $params['encrypt']  = $data['encrypt'];
                $params['password'] = $data['password'];
            }
            $exist = AdminUser::where('email', $params['email'])->where('id', '<>', (int) User::instance()->isLogin())->find();
            if ($exist) {
                $this->error('邮箱已经存在！');
            }
            if ($params) {
                $admin = AdminUser::get((int) User::instance()->isLogin());
                $admin->save($params);
                //因为个人资料面板读取的Session显示，修改自己资料后同时更新Session
                Session::set("admin", $admin->toArray());
                $this->success('修改成功！');
            }
            $this->error();
        }
        return;
    }
}
