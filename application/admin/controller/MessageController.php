<?php
/**
 * Created by PhpStorm.
 * User: dengsuchuan
 * Date: 18-9-24
 * Time: 下午6:13
 */

namespace app\admin\controller;


use app\admin\common\Base;
use app\admin\model\Message;
use app\admin\model\NewsClass;
use app\admin\model\NewsInfo;
use think\facade\Request;

class MessageController extends Base
{
    //留言列表
    public function messageInfo(){
        //判断用户是否登录
        $this->isLogin();

        $messageInfo = Message::order('create_time','desc')->paginate(15);
        $messageInfoCount = $messageInfo->total();
        $this->view->assign([
            'messageInfo' => $messageInfo,
            'messageInfoCount' => $messageInfoCount
        ]);
        return $this->view->fetch('info_view');
    }

    public function selectData(){
        if (Request::isPost()){
            $data = Request::post('modules');
            $messageInfo = Message::where('text|name|email|qq|tel','like',"%$data%")
                ->order('create_time','desc')
                ->paginate(15);
            $messageInfoCount = $messageInfo->total();
            $this->view->assign([
                'messageInfo' => $messageInfo,
                'messageInfoCount' => $messageInfoCount
            ]);
            return $this->view->fetch('info_view');
        }else{
            $this->messageInfo();
        }
    }


    //删除
    public function delete(){
        if(Request::isAjax()){
            $data = Request::post('id');
            $info = Message::where('id',$data)->delete();
            if($info){
                return json(1);
            }else{
                return json(0);
            }
        }
    }
}