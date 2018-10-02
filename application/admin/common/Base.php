<?php
/**
 * Created by PhpStorm.
 * User: dengsuchuan
 * Date: 18-9-21
 * Time: 上午11:21
 */

namespace app\admin\common;


use think\Controller;
use think\facade\Session;


class Base extends Controller
{

    //检测用户是否登录
    //1.调用位置:后台入口  admin.php/index/index()
    protected function isLogin(){
        if(!Session::has('username')){
            $this->error('请先登录','admin/Login/loginSystemShow');
        }
    }


    //删除文件
    public function delFile($address){
        if(file_exists ($address)){
            unlink($address);
        }
    }

    //上传文件
    public function uploadFile($file,$url){
        $info = $file->move($url);
        if($info){
            $fileUrl = $info->getSaveName();
            return $fileUrl;
        }else{
            return 0;
        }
    }
}