<?php
/**
 * Created by PhpStorm.
 * User: dengsuchuan
 * Date: 18-9-21
 * Time: 下午5:26
 */

namespace app\admin\controller;


use app\admin\common\Base;
use app\admin\model\AdminModel;
use think\Exception;
use think\facade\Request;

class Admin extends Base
{
    //管理员列表
    public function adminInfo(){
        //判断用户是否登录
        $this->isLogin();

        $adminInfo = AdminModel::order('create_time','desc')->select();
        $adminInfoCount = count($adminInfo);
        $this->view->assign([
            'adminInfo' => $adminInfo,
            'adminInfoCount' => $adminInfoCount
        ]);
        return $this->view->fetch('admin_info_view');
    }


    //添加管理员-界面
    public function adminAddView(){
        return $this->view->fetch('admin_add_view');
    }
    //添加管理员-功能
    public function adminAdd(){
        if(Request::isAjax()){
            $data = Request::post();
            $check = AdminModel::where('username',$data['username'])->find();
            $data['password'] = md5($data['password']);
            if(!$check){
                $info = AdminModel::create($data);
                if($info){
                    return json(1);
                }else{
                    return json(0);
                }
            }else{
                return json(0);
            }
        }
    }


    //编辑管理员-界面
    public function adminEditView(){
        if(input('id')){
            $id = input('id');
            $adminInfo = AdminModel::where('id',$id)->select();
            $this->view->assign(
                ['adminInfo' => $adminInfo]
            );
            return $this->view->fetch('admin_edit_view');
        }else{
            return 'ERROR:NOT FIND HTML<br>CODE:404';
        }
    }
    //编辑管理员-功能
    public function adminEdit(){
        if(Request::isAjax()){
            $data = Request::post();
            if($data['password_new'] == '' || md5($data['password_new']) == $data['password']){
                $data['password'] = $data['password'];
            }elseif (md5($data['password_new']) != $data['password']){
                $data['password'] = md5($data['password_new']);
            }

            unset($data['password_new']);

            $info = AdminModel::update($data);
            if ($info){
                return json(1);
            }else{
                return json(0);
            }
        }else{
            return 'ERROR:NOT FIND HTML<br>CODE:404';
        }

    }

    //删除管理员
    public function adminDelete(){
        if(Request::isAjax()){
            $data = Request::post('id');
            $info = AdminModel::where('id',$data)->delete();
            if($info){
                return json(1);
            }else{
                return json(0);
            }
        }
    }
}