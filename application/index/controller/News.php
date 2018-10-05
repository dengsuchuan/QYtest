<?php

namespace app\index\controller;

use app\index\common\Base;
use app\index\model\NewsClass;
use app\index\model\NewsInfo;
use function PHPSTORM_META\type;

class news extends Base
{
    //总览显示
    public function index()
    {
		$newsInfo = NewsInfo::order('create_time','desc')->paginate(10);
		$this->assign("newsInfo",$newsInfo);
        return $this->view->fetch();
    }

    //每个分类的显示
	public function newsClassifyShow(){
		$newsClassId = input('newsClassId');
		$newsClassName = NewsClass::where('NewsClassId',$newsClassId)->value('ClassName');
		$newsInfo = NewsInfo::where('newsclassid',$newsClassId)->order('create_time','desc')->paginate(6);
		$this->assign("newsInfo",$newsInfo);
		$this->assign("newsClassName",$newsClassName);
		return $this->view->fetch("newsClassifyShow");
	}

	//详细显示
    public function newsInfo(){
        $id = input("id");
        $frontId = $id-1;
        $afterId = $id+1;

        //访问量增加
        //读取数据库访问量
        $lookCount = NewsInfo::Where('newsId',$id)->value('lookglance');
        $lookCount += 1;
        NewsInfo::where('newsId',$id)->update(['lookglance'=>$lookCount]);

        $newsArrayFront = NewsInfo::where('newsId',$frontId)->select();
        $newsArray = NewsInfo::where('newsId',$id)->select();
        $newsArrayAfter = NewsInfo::where('newsId',$afterId)->select();
        $classId = $newsArray[0]['newsclassid'];
        $classNewsList = NewsInfo::where('newsclassid',$classId)->select();

        $this->view->assign("newsArrayFront",$newsArrayFront);
        $this->view->assign("newsArray",$newsArray);
        $this->view->assign("newsArrayAfter",$newsArrayAfter);
        $this->view->assign("classNewsList",$classNewsList);
        return $this->view->fetch("view-newsInfo");
    }

}
