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

    //详细显示
    public function casesInfo(){
        $id = input("id");
        $frontId = $id-1;
        $afterId = $id+1;

        $casesArrayFront = CaseInfo::where('caseId',$frontId)->select();
        $casesArray = CaseInfo::where('caseId',$id)->select();
        $casesArrayAfter = CaseInfo::where('caseId',$afterId)->select();
        $classId = $casesArray[0]['caseclassid'];
        $classcasesList = CaseInfo::where('caseclassid',$classId)->select();

        $this->view->assign("casesArrayFront",$casesArrayFront);
        $this->view->assign("casesArray",$casesArray);
        $this->view->assign("casesArrayAfter",$casesArrayAfter);
        $this->view->assign("classcasesList",$classcasesList);
        return $this->view->fetch("view-casesInfo");
    }
}
