<?php
namespace app\index\controller;

use app\index\common\Base;
use app\index\model\CaseInfo;
use app\index\model\CasesClass;

class Cases extends Base
{
    public function index(){
		$caseInfo = CaseInfo::order('create_time','desc')->paginate(6);
		$this->assign("caseInfo",$caseInfo);
        return $this->view->fetch();
    }

	public function caseClassifyShow(){
		$caseClassId = input('CaseClassId');
		$caseInfo = CaseInfo::where('caseclassid',$caseClassId)->order('create_time','desc')->paginate(6);
		$caseClassName = CasesClass::where('CaseClassId',$caseClassId)->value('className');
		$this->assign("caseInfo",$caseInfo);
		$this->assign("caseClassName",$caseClassName);
		return $this->view->fetch("caseClassifyShow");
	}
}
