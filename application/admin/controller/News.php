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
use app\admin\model\NewsInfo;
use think\facade\Request;

class News extends Base
{
    //新闻列表
    public function newsInfo(){
        //判断用户是否登录
        $this->isLogin();

        $newsInfo = NewsInfo::order('create_time','desc')->paginate(15);
        $newsInfoCount = $newsInfo->total();
        $this->view->assign([
            'newsInfo' => $newsInfo,
            'newsInfoCount' => $newsInfoCount
        ]);
        return $this->view->fetch('info_view');
    }

    public function selectData(){
        if (Request::isPost()){
            $data = Request::post('modules');
            $newsInfo = NewsInfo::where('newsname|newscontent','like',"%$data%")
                ->order('create_time','desc')
                ->paginate(15);
            $newsInfoCount = $newsInfo->total();
            $this->view->assign([
                'newsInfo' => $newsInfo,
                'newsInfoCount' => $newsInfoCount
            ]);
            return $this->view->fetch('info_view');
        }else{
            $this->newsInfo();
        }
    }

    //添加-界面
    public function addView(){
        $newsClass = NewsClass::all();
        $this->view->assign([
            'newsClass'=> $newsClass
        ]);
        return $this->view->fetch('add_view');
    }
    //添加-功能
    public function add(){
        if(Request::isAjax()){
            $data = Request::post();
            unset($data['icon']);
            $info = NewsInfo::create($data);
            if($info){
                return json(1);
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
            $NewsInfo = NewsInfo::where('newsId',$id)->select();
            $NewsClass = NewsClass::all();
            $this->view->assign([
                'NewsInfo' => $NewsInfo,
                'NewsClass'=> $NewsClass
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
            unset($data['file']);
            unset($data['icon']);
            unset($data['content']);
            $id = $data['id'];
            unset($data['id']);

            $info = NewsInfo::where('newsId',$id)->update($data);
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
            $info = NewsInfo::where('newsId',$data)->delete();
            if($info){
                return json(1);
            }else{
                return json(0);
            }
        }
    }
}