<?php
/**
 * Created by PhpStorm.
 * User: dengsuchuan
 * Date: 18-9-21
 * Time: 下午4:15
 */

namespace app\admin\controller;


use app\admin\common\Base;
use app\admin\model\AdminModel;
use app\admin\model\CaseInfo;
use app\admin\model\GoodsInfo;
use app\admin\model\Message;
use app\admin\model\NewsInfo;
use think\Db;

class Index extends Base
{
    public function index(){
        //判断用户是否登录
        $this->isLogin();

        return $this->view->fetch();
    }

    public function welcomeShow(){
        $sum = 0;
        $goodsLookCount = Db::query("select lookglance from qy_goodsinfo;");
        foreach ($goodsLookCount as $value){
            $sum = $sum + $value['lookglance'];
        }

        $newsLookCount = Db::query("select lookglance from qy_newsinfo;");
        foreach ($newsLookCount as $value){
            $sum = $sum + $value['lookglance'];
        }

        $caseLookCount = Db::query("select lookglance from qy_caseinfo;");
        foreach ($caseLookCount as $value){
            $sum = $sum + $value['lookglance'];
        }

        $info = array(
            'os'=>PHP_OS,
            'environment'=>$_SERVER["SERVER_SOFTWARE"],
            'PHP'=>php_sapi_name(),
            'size'=>ini_get('upload_max_filesize'),
            'time'=>ini_get('max_execution_time').'秒',
            'surplus'=>round((disk_free_space(".")/(1024*1024)),2).'M',
            'register_globals'=>get_cfg_var("register_globals")=="1" ? "ON" : "OFF",
            'magic_quotes_gpc'=>(1===get_magic_quotes_gpc())?'YES':'NO',
            'magic_quotes_runtime'=>(1===get_magic_quotes_runtime())?'YES':'NO',
            'goodsCount' =>count(GoodsInfo::all()),
            'newsCount' => count(NewsInfo::all()),
            'casesCount' => count(CaseInfo::all()),
            'messageCount' => count(Message::all()),
            'adminCount' =>count(AdminModel::all()),
            'lookglance'=>$sum
        );
        $this->view->assign('info',$info);
        return $this->view->fetch('welcome');
    }
}