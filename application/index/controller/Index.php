<?php
namespace app\index\controller;

use app\index\common\Base;
use app\index\model\About;
use app\index\model\CaseInfo;
use app\index\model\Cooperate;
use app\index\model\GoodsInfo;
use app\index\model\Scope;


class Index extends Base
{
    public function index(){
        $CooperateList = Cooperate::all();
        $ScopeList = Scope::all();
        $AboutList = About::all();
        $GoodsInfo = GoodsInfo::all();
		$CaseInfo = CaseInfo::order('create_time','desc')->paginate(8);
        $this->view->assign('CooperateLists',$CooperateList);
        $this->view->assign('ScopeLists',$ScopeList);
        $this->view->assign('AboutLists',$AboutList);
        $this->view->assign('GoodsInfoLists',$GoodsInfo);
        $this->view->assign('CaseInfoLists',$CaseInfo);
        return $this->view->fetch();
    }
}
