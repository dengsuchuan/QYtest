<?php
/**
 * Created by PhpStorm.
 * User: dengsuchuan
 * Date: 18-9-24
 * Time: 下午6:13
 */

namespace app\admin\controller;


use app\admin\common\Base;
use app\admin\model\NewsClass;
use think\facade\Request;


class NewsClassController extends Base
{

    //分类管理
    public function classManageView(){
        //判断用户是否登录
        $this->isLogin();

        $classList = NewsClass::order('ClassName','desc')->paginate(15);
        $classListCount = $classList->total();
        $this->view->assign([
            'classList'=> $classList,
            'classListCount'=>$classListCount
        ]);
        return $this->view->fetch("class_manage_view");
    }
    public function editView(){
        if(input('id')){
            $id = input('id');
            $newsInfo = NewsClass::where('NewsClassId',$id)->select();
            $this->view->assign([
                'newsInfo' => $newsInfo,
            ]);
            return $this->view->fetch('edit_view');
        }else{
            return 'ERROR:NOT FIND HTML<br>CODE:404';
        }
    }
    public function edit(){
        if(Request::isAjax()){
            $data = Request::post();
            $id = $data['id'];
            unset($data['id']);
            $info = NewsClass::where('NewsClassId',$id)->update($data);
            if ($info){
                return json(1);
            }else{
                return json(0);
            }
        }else{
            return 'ERROR:NOT FIND HTML<br>CODE:404';
        }
    }

    public function addView(){
        return $this->view->fetch('add_view');
    }
    public function add(){
        if(Request::isAjax()){
            $data = Request::post();
            $info = NewsClass::create($data);
            if($info){
                return json(1);
            }else{
                return json(0);
            }
        }

    }

    //删除
    public function delete(){
        if(Request::isAjax()){
            $data = Request::post('id');
            $info = NewsClass::where('NewsClassId',$data)->delete();
            if($info){
                return json(1);
            }else{
                return json(0);
            }
        }
    }

}