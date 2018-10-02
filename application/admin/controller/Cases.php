<?php
/**
 * Created by PhpStorm.
 * User: dengsuchuan
 * Date: 18-9-24
 * Time: 下午6:13
 */

namespace app\admin\controller;


use app\admin\common\Base;
use app\admin\model\CasesClass;
use app\admin\model\CaseInfo;
use think\facade\Request;

class Cases extends Base
{
    //产品列表
    public function CasesInfo(){
        //判断用户是否登录
        $this->isLogin();

        $CasesInfo = CaseInfo::order('create_time','desc')->paginate(15);
        $CasesInfoCount = $CasesInfo->total();
        $this->view->assign([
            'CasesInfo' => $CasesInfo,
            'CasesInfoCount' => $CasesInfoCount
        ]);
        return $this->view->fetch('info_view');
    }

    public function selectData(){
        if (Request::isPost()){
            $data = Request::post('modules');
            $CasesInfo = CaseInfo::where('casename|casecontent','like',"%$data%")
                ->order('create_time','desc')
                ->paginate(15);
            $CasesInfoCount = $CasesInfo->total();
            $this->view->assign([
                'CasesInfo' => $CasesInfo,
                'CasesInfoCount' => $CasesInfoCount
            ]);
            return $this->view->fetch('info_view');
        }else{
            $this->CasesInfo();
        }
    }


    //添加-界面
    public function addView(){
        $CasesClass = CasesClass::all();
        $this->view->assign([
            'CasesClass'=> $CasesClass
        ]);
        return $this->view->fetch('add_view');
    }
    //添加-功能
    public function add(){
        if(Request::isAjax()){
            $data = Request::post();
            unset($data['file']);
            unset($data['icon']);
            if($data['images']){
                $info = CaseInfo::create($data);
                if($info){
                    return json(1);
                }else{
                    return json(0);
                }
            }else{
                return json(0);
            }

        }else{
            return 'ERROR:NOT FIND HTML<br>CODE:404';
        }
    }


    //编辑-界面
    public function editView(){
        if(input('id')){
            $id = input('id');
            $CasesInfo = CaseInfo::where('caseId',$id)->select();
            $CasesClass = CasesClass::all();
            $this->view->assign([
                'CasesInfo' => $CasesInfo,
                'CasesClass'=> $CasesClass
            ]);
            return $this->view->fetch('edit_view');
        }else{
            return 'ERROR:NOT FIND HTML<br>CODE:404';
        }
    }
    //编辑-功能
    public function edit(){
        if(Request::isAjax()){
            $data = Request::post();
            if($data['images'] == ''){
                unset($data['images']);
            }
            unset($data['file']);
            unset($data['icon']);
            unset($data['content']);
            $id = $data['id'];
            unset($data['id']);

            $info = CaseInfo::where('caseId',$id)->update($data);
            if ($info){
                return json(1);
            }else{
                return json(0);
            }
        }else{
            return 'ERROR:NOT FIND HTML<br>CODE:404';
        }

    }

    //删除
    public function delete(){
        if(Request::isAjax()){
            $data = Request::post('id');
            $images = CaseInfo::where('caseId',$data)->value('images');
            $fileUrl = 'static/index/images/case/'.$images;
            $this->delFile($fileUrl);
            $info = CaseInfo::where('caseId',$data)->delete();
            if($info){
                return json(1);
            }else{
                return json(0);
            }
        }
    }

    //---------------------------文件操作
    //上传文件
    public function uploadCaseFile(){
        $file = Request::file('file');
        // 移动到框架应用根目录/uploads/ 目录下
        //$info = $file->move( 'static/index/images/Cases');
        $info = $file->move('static/index/images/case');
        if($info){
            $fileUrl = $info->getSaveName();
            return json_encode([
                'code' => 1,  // 成功状态码
                'fileUrl' =>  $fileUrl  // 文件地址
            ]);
        }else{
            return json_encode([
                'code' => 0,  // 成功状态码
            ]);
        }
    }
}