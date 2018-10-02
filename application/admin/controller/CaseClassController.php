<?php
/**
 * Created by PhpStorm.
 * User: dengsuchuan
 * Date: 18-9-24
 * Time: 下午6:13
 */

namespace app\admin\controller;


use app\admin\common\Base;
use app\admin\model\CasesClass as CaseClass;
use think\facade\Request;


class CaseClassController extends Base
{

    //分类管理
    public function classManageView(){

        //判断用户是否登录
        $this->isLogin();

        $classList = CaseClass::order('ClassName','desc')->paginate(15);
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
            $caseInfo = CaseClass::where('CaseClassId',$id)->select();
            $this->view->assign([
                'caseInfo' => $caseInfo,
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
            $info = CaseClass::where('CaseClassId',$id)->update($data);
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
            $info = CaseClass::create($data);
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
            $info = CaseClass::where('CaseClassId',$data)->delete();
            if($info){
                return json(1);
            }else{
                return json(0);
            }
        }
    }

}