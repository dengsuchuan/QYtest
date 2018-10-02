<?php
namespace app\index\common;

use app\index\model\CasesClass;
use app\index\model\Contact;
use app\index\model\GoodsClass;
use app\index\model\Link;
use app\index\model\NewsClass;
use app\index\model\NewsInfo;
use app\index\model\WebInfo;
use think\Controller;

class Base extends Controller
{
    //初始化方法
    protected function initialize()
    {
        $this->getWebInfo();
        $this->getContact();
        $this->getLink();
        $this->getNav();
        $this->getTrendsNews();
        $this->is_open();
    }

    //读取网站配置信息
    protected function getWebInfo(){
        $webInfo = WebInfo::where('id',1)->find();
        $this->view->assign('webInfo',$webInfo);
    }

    //读取联系信息
    protected function getContact(){
		$ContactInfo = Contact::all();
		$this->view->assign('ContactInfo',$ContactInfo);
    }

    //友情链接
    protected function getLink(){
        $link = Link::all();
        $this->view->assign('link',$link);
    }

    //顶部导航
    protected function getNav(){
        $goodsClassList = GoodsClass::all();//产品分类
        $newsClassList = NewsClass::all();//新闻分类
        $casesClassList = CasesClass::all();//案例分类
        $this->view->assign('GoodsClassLists',$goodsClassList);
        $this->view->assign('NewsClassLists',$newsClassList);
        $this->view->assign('CasesClassLists',$casesClassList);
    }

    //轮播下面的动态新闻
    protected function getTrendsNews(){
        $newsInfo = NewsInfo::all();
        $this->view->assign('NewsInfos',$newsInfo);
    }

    //检查站点是否关闭
    public function is_open(){
        //1.获取当前站点状态
        $isOpen = WebInfo::where('status',1)->value('status');

        //2.如果站点已经关闭，那么只允许关闭前台
        if($isOpen == 0){
            $this->view->assign('title','站点已关闭 · 静影探风');
            //关闭网站
            $info = <<<'INFO'
<head>
    <title>站点关闭</title>
</head>
<body style="background-color: #0f0f0f">
    <center>
        <h1 style="color: white;font-size: 60px;margin-top: 400px;">
            【站点已关闭，暂时无法访问】
        </h1>
        <h2 style="color: red;font-size: 50px;">
            ###  预计维护时长:12小时  ###
        </h2>
    </center>
</body>
INFO;
            exit($info);
        }

    }

}