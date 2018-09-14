<?php
namespace app\index\controller;

use app\index\common\Base;
use app\index\model\Message as MessageModel;
use think\facade\Request;

class Message extends Base
{
    public function index(){
        return $this->view->fetch();
    }

    public function addMessage(){
		if(Request::isPost()) {
			$data = Request::post();
			$info = MessageModel::create($data);
			if($info){
				return "<script>alert('留言成功');window.location.href='../index.html';</script>";
			}else{
				return "<script>alert('留言失败');window.location.href='../index.html';</script>";
			}

		}
	}

}
