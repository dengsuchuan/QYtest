<?php
namespace app\index\controller;

use app\index\common\Base;
use app\index\model\About as AboutModel;

class About extends Base
{
    public function index(){
		$aboutInfo = AboutModel::all();
		$this->assign("aboutInfo",$aboutInfo);
        return $this->view->fetch();
    }
}
