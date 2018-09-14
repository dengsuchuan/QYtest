<?php

namespace app\index\controller;

use app\index\common\Base;
use app\index\model\NewsClass;
use app\index\model\NewsInfo;

class news extends Base
{
    public function index()
    {
		$newsInfo = NewsInfo::order('create_time','desc')->paginate(10);
		$this->assign("newsInfo",$newsInfo);
        return $this->view->fetch();
    }

	public function newsClassifyShow(){
		$newsClassId = input('newsClassId');
		$newsClassName = NewsClass::where('NewsClassId',$newsClassId)->value('ClassName');
		$newsInfo = NewsInfo::where('newsclassid',$newsClassId)->order('create_time','desc')->paginate(6);
		$this->assign("newsInfo",$newsInfo);
		$this->assign("newsClassName",$newsClassName);
		return $this->view->fetch("newsClassifyShow");
	}

}
