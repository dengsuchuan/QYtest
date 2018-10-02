<?php
/**
 * Created by PhpStorm.
 * User: dengsuchuan
 * Date: 18-9-24
 * Time: 下午6:13
 */

namespace app\admin\controller;


use app\admin\common\Base;
use app\admin\model\WebInfo;
use function PHPSTORM_META\type;
use think\facade\Request;

class WebSet extends Base
{

    public function webInfoView(){
        //判断用户是否登录
        $this->isLogin();

        $webInfo = WebInfo::all();
        $this->view->assign('webInfo',$webInfo);
        return $this->view->fetch('info_view');
    }

    public function edit(){
        if(Request::isAjax()){
            $data = Request::post();
            unset($data['file']);
            unset($data['icon']);
            unset($data['logo']);
            unset($data['slide01_img']);
            unset($data['slide02_img']);
            unset($data['slide03_img']);
            if(isset($data['status'])){
                $data['status'] = 1;
            }else{
                $data['status'] = 0;
            }
            //$data['status'] = $data['status']=="on"?"1":"0";
            //var_dump($data);
            $info = WebInfo::where('id',1)->update($data);
            if($info){
                return json(1);
            }else{
                return json(0);
            }
        }
    }























    //---------------------------下面全部是文件操作-------------------------
    //修改logo
    public function uploadLogo(){
        $file = Request::file('file');
        $url = 'static/index/about/images/';
        $res = $this->uploadFile($file,$url);

        if($res){//如果上传成功
            //删除旧文件
            $file = WebInfo::where('id',1)->value('logo');
            $fileUrl = $url.$file;
            $this->delFile($fileUrl);
            //更新数据
            $info = WebInfo::where('id',1)->update(['logo'=>$res]);
            if($info){
                return 1;
            }else{
                return 0;
            }
        }
    }

    //修改icon
    public function uploadIcon(){
        $file = Request::file('file');
        $url = 'static/index/about/images/';
        $res = $this->uploadFile($file,$url);

        if($res){//如果上传成功
            //删除旧文件
            $file = WebInfo::where('id',1)->value('favicon');
            $fileUrl = $url.$file;
            $this->delFile($fileUrl);
            //更新数据
            $info = WebInfo::where('id',1)->update(['favicon'=>$res]);
            if($info){
                return json(1);
            }else{
                return json(0);
            }
        }
    }

    //修改轮播-1
    public function uploadLb1(){
        $file = Request::file('file');
        $url = 'static/index/images/default/';
        $res = $this->uploadFile($file,$url);

        if($res){//如果上传成功
            //删除旧文件
            $file = WebInfo::where('id',1)->value('slide01_img');
            $fileUrl = $url.$file;
            $this->delFile($fileUrl);
            //更新数据
            $info = WebInfo::where('id',1)->update(['slide01_img'=>$res]);
            if($info){
                return json(1);
            }else{
                return json(0);
            }
        }
    }

    //修改轮播-2
    public function uploadLb2(){
        $file = Request::file('file');
        $url = 'static/index/images/default/';
        $res = $this->uploadFile($file,$url);

        if($res){//如果上传成功
            //删除旧文件
            $file = WebInfo::where('id',1)->value('slide02_img');
            $fileUrl = $url.$file;
            $this->delFile($fileUrl);
            //更新数据
            $info = WebInfo::where('id',1)->update(['slide02_img'=>$res]);
            if($info){
                return json(1);
            }else{
                return json(0);
            }
        }
    }

    //修改轮播-3
    public function uploadLb3(){
            $file = Request::file('file');
            $url = 'static/index/images/default/';
            $res = $this->uploadFile($file,$url);

            if($res){//如果上传成功
                //删除旧文件
                $file = WebInfo::where('id',1)->value('slide03_img');
                $fileUrl = $url.$file;
                $this->delFile($fileUrl);
                //更新数据
                $info = WebInfo::where('id',1)->update(['slide03_img'=>$res]);
                if($info){
                    return json(1);
                }else{
                    return json(0);
                }
            }
    }

}