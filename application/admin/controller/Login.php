<?php
namespace app\admin\controller;

use app\admin\common\Base;
use app\admin\model\AdminModel;
use think\facade\Request;
use think\facade\Session;


class Login extends Base
{

    public function loginSystemShow(){
        return $this->view->fetch("view-login-system");
    }

    public function loginSystem(){
        if(Request::isAjax()){
            $data = Request::post();
            $data['password'] = md5($data['password']);
            $info = AdminModel::where($data)->find();
            if($info){
                session('username',$data['username']);
                return json(1);
            }else{
                return json(0);
            }
        }else{
            $this->error("非法操作",'index/index/index');
        }
    }

    public function switchLoginU(){
        session('username',null);
        Session::clear();
        $this->redirect('index/index/index');
    }

}