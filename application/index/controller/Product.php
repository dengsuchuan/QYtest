<?php
namespace app\index\controller;

use app\index\common\Base;
use app\index\model\GoodsClass;
use app\index\model\GoodsInfo;

class Product extends Base
{
    public function index(){
    	$goodsInfo = GoodsInfo::order('create_time','desc')->paginate(6);
    	$this->assign("GoodsInfo",$goodsInfo);
        return $this->view->fetch();
    }

    public function productClassifyShow(){
		$goodsClassId = input('GoodsClassId');
		$goodsClassName = GoodsClass::where('GoodsClassId',$goodsClassId)->value('className');
		$goodsInfo = GoodsInfo::where('Goodsclassid',$goodsClassId)->order('create_time','desc')->paginate(6);
		$this->assign("GoodsInfo",$goodsInfo);
		$this->assign("goodsClassName",$goodsClassName);
    	return $this->view->fetch("productClassifyShow");
	}

    //详细显示
    public function productInfo(){
        $id = input("id");
        $frontId = $id-1;
        $afterId = $id+1;

        //访问量增加
        //读取数据库访问量
        $lookCount = GoodsInfo::Where('newsId',$id)->value('lookglance');
        $lookCount += 1;
        GoodsInfo::where('newsId',$id)->update(['lookglance'=>$lookCount]);

        $newsArrayFront = GoodsInfo::where('newsId',$frontId)->select();
        $newsArray = GoodsInfo::where('newsId',$id)->select();
        $newsArrayAfter = GoodsInfo::where('newsId',$afterId)->select();
        $classId = $newsArray[0]['goodsclassid'];
        $classNewsList = GoodsInfo::where('goodsclassid',$classId)->select();

        $this->view->assign("newsArrayFront",$newsArrayFront);
        $this->view->assign("newsArray",$newsArray);
        $this->view->assign("newsArrayAfter",$newsArrayAfter);
        $this->view->assign("classNewsList",$classNewsList);
        return $this->view->fetch("view-productInfo");
    }
}