<?php
/**
 * Created by PhpStorm.
 * User: dengsuchuan
 * Date: 18-9-24
 * Time: 下午6:13
 */

namespace app\admin\controller;


use app\admin\common\Base;
use app\admin\model\Cooperate as CooperateMode;
use think\facade\Request;

class Cooperate extends Base
{
    public function cooperateInfo(){
        //判断用户是否登录
        $this->isLogin();

        $cooperateInfo = CooperateMode::order('CooperateId','desc')->paginate(15);
        $cooperateInfoCount = $cooperateInfo->total();
        $this->view->assign([
            'cooperateInfo' => $cooperateInfo,
            'cooperateInfoCount' => $cooperateInfoCount
        ]);
        return $this->view->fetch('info_view');
    }

//    //添加-界面
//    public function addView(){
//        return $this->view->fetch('add_view');
//    }
//    //添加-功能
//    public function add(){
//        if(Request::isAjax()){
//            $data = Request::post();
//            unset($data['icon']);
//            $info = LinkMode::create($data);
//            if($info){
//                return json(1);
//            }else{
//                return json(0);
//            }
//        }else{
//            return 'ERROR:NOT FIND HTML<br>CODE:404';
//        }
//    }


    //编辑-界面
    public function editView(){
        if(input('id')){
            $id = input('id');
            $cooperateInfo = CooperateMode::where('CooperateId',$id)->select();
            $this->view->assign([
                'cooperateInfo' => $cooperateInfo,
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
            $id = $data['CooperateId'];
            unset($data['CooperateId']);
            unset($data['file']);
            $info = CooperateMode::where('CooperateId',$id)->update($data);
            if ($info){
                return json(1);
            }else{
                return json(0);
            }
        }else{
            return 'ERROR:NOT FIND HTML<br>CODE:404';
        }

    }

//    //删除
//    public function delete(){
//        if(Request::isAjax()){
//            $data = Request::post('id');
//            $info = CooperateMode::where('CooperateId',$data)->delete();
//            if($info){
//                return json(1);
//            }else{
//                return json(0);
//            }
//        }
//    }

    //文件上传
    public function upFile(){
        $file = Request::file('file');
        $id = input('id');
        $url = 'static/index/images/default/';
        $res = $this->uploadFile($file,$url);

        if($res){//如果上传成功
            //删除旧文件
            $file = CooperateMode::where('CooperateId',$id)->value('CooperateImg');
            $fileUrl = $url.$file;
            $this->delFile($fileUrl);
            //更新数据
            $info = CooperateMode::where('CooperateId',$id)->update(['CooperateImg'=>$res]);
            if($info){
                return json(1);
            }else{
                return json(0);
            }
        }else{
            return 0;
        }
    }
}