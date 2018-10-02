<?php
/**
 * Created by PhpStorm.
 * User: dengsuchuan
 * Date: 18-9-24
 * Time: 下午6:13
 */

namespace app\admin\controller;


use app\admin\common\Base;
use app\admin\model\ScopeMode;
use think\facade\Request;

class Scope extends Base
{

    public function scopeInfoView(){
        //判断用户是否登录
        $this->isLogin();

        $scopeInfo = ScopeMode::all();
        $this->view->assign('scopeInfo',$scopeInfo);
        return $this->view->fetch('info_view');
    }

    public function edit(){
        if(Request::isAjax()){
            $data = Request::post();
            $arr = json_decode($data['json'],true);

            foreach ($arr as $value){
                $id = $value['id'];
                unset($value['id']);
                ScopeMode::where('id',$id)->update($value);
            }
            return json(1);
        }
    }

}