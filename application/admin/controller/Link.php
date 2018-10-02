<?php
/**
 * Created by PhpStorm.
 * User: dengsuchuan
 * Date: 18-9-24
 * Time: 下午6:13
 */

namespace app\admin\controller;


use app\admin\common\Base;
use app\admin\model\Link as LinkMode;
use think\facade\Request;

class Link extends Base
{
    //友情链接列表
    public function linkInfo(){
        //判断用户是否登录
        $this->isLogin();

        $linkInfo = LinkMode::order('id','desc')->paginate(15);
        $linkInfoCount = $linkInfo->total();
        $this->view->assign([
            'linkInfo' => $linkInfo,
            'linkInfoCount' => $linkInfoCount
        ]);
        return $this->view->fetch('info_view');
    }

    //添加-界面
    public function addView(){
        return $this->view->fetch('add_view');
    }
    //添加-功能
    public function add(){
        if(Request::isAjax()){
            $data = Request::post();
            unset($data['icon']);
            $info = LinkMode::create($data);
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
            $LinkInfo = LinkMode::where('id',$id)->select();
            $this->view->assign([
                'LinkInfo' => $LinkInfo,
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
            $id = $data['id'];
            unset($data['id']);
            $info = LinkMode::where('id',$id)->update($data);
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
            $info = LinkMode::where('id',$data)->delete();
            if($info){
                return json(1);
            }else{
                return json(0);
            }
        }
    }
}