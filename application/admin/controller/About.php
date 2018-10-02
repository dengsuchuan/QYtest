<?php
/**
 * Created by PhpStorm.
 * User: dengsuchuan
 * Date: 18-9-24
 * Time: 下午6:13
 */

namespace app\admin\controller;


use app\admin\common\Base;
use app\admin\model\AboutMode;
use think\facade\Request;

class About extends Base
{
    //关于我们-界面
    public function aboutInfo(){
        //判断用户是否登录
        $this->isLogin();

        $aboutInfo = AboutMode::all();
        $this->view->assign([
            'aboutInfo' => $aboutInfo,
        ]);
        return $this->view->fetch('info_view');
    }

    public function edit(){
        if(Request::isAjax()){
            $data = Request::post();
            unset($data['file']);
            $info = AboutMode::where('id',1)->update($data);
            if($info){
                return json(1);
            }else{
                return json(0);
            }
        }
    }

    //文件上传
    public function upFile(){
        $file = Request::file('file');
        $url = 'static/index/about/images/';
        $res = $this->uploadFile($file,$url);

        if($res){//如果上传成功
            //删除旧文件
            $file = AboutMode::where('id',1)->value('images');
            $fileUrl = $url.$file;
            $this->delFile($fileUrl);
            //更新数据
            $info = AboutMode::where('id',1)->update(['images'=>$res]);
            if($info){
                return json(1);
            }else{
                return json(0);
            }
        }else{
            return 0;
        }
    }

}