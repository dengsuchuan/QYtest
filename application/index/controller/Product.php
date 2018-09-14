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
}