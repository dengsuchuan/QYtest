<?php
/**
 * Created by PhpStorm.
 * User: dengsuchuan
 * Date: 18-9-24
 * Time: 下午6:13
 */

namespace app\admin\controller;


use app\admin\common\Base;
use app\admin\model\GoodsClass;
use app\admin\model\GoodsInfo;
use think\facade\Request;

class Goods extends Base
{
    //产品列表
    public function goodsInfo(){
        //判断用户是否登录
        $this->isLogin();

        $goodsInfo = GoodsInfo::order('create_time','desc')->paginate(15);
        $goodsInfoCount = $goodsInfo->total();
        $this->view->assign([
            'goodsInfo' => $goodsInfo,
            'goodsInfoCount' => $goodsInfoCount
        ]);
        return $this->view->fetch('goods_info_view');
    }

    public function selectData(){
        if (Request::isPost()){
            $data = Request::post('modules');
            $goodsInfo = GoodsInfo::where('goodsname|goodscontent','like',"%$data%")
                ->order('create_time','desc')
                ->paginate(15);
            $goodsInfoCount = $goodsInfo->total();
            $this->view->assign([
                'goodsInfo' => $goodsInfo,
                'goodsInfoCount' => $goodsInfoCount
            ]);
            return $this->view->fetch('goods_info_view');
        }else{
            $this->goodsInfo();
        }
    }

    //添加-界面
    public function addView(){
        $goodsClass = GoodsClass::all();
        $this->view->assign([
            'goodsClass'=> $goodsClass
        ]);
        return $this->view->fetch('add_view');
    }
    //添加-功能
    public function add(){
        if(Request::isAjax()){
            $data = Request::post();
            unset($data['file']);
            unset($data['icon']);
            if($data['images']){
                $info = GoodsInfo::create($data);
                if($info){
                    return json(1);
                }else{
                    return json(0);
                }
            }else{
                return '没有图片'.var_dump($data);
            }

        }else{
            return 'ERROR:NOT FIND HTML<br>CODE:404';
        }
    }


    //编辑-界面
    public function editView(){
        if(input('id')){
            $id = input('id');
            $goodsInfo = GoodsInfo::where('newsId',$id)->select();
            $goodsClass = GoodsClass::all();
            $this->view->assign([
                'goodsInfo' => $goodsInfo,
                'goodsClass'=> $goodsClass
            ]);
            return $this->view->fetch('edit_view');
        }else{
            return 'ERROR:NOT FIND HTML<br>CODE:404';
        }
    }
    //编辑-功能
    public function edit(){
        if(Request::isAjax()){
            $data = Request::post();
            if($data['images'] == ''){
                unset($data['images']);
            }
            unset($data['file']);
            unset($data['icon']);
            unset($data['content']);
            $id = $data['id'];
            unset($data['id']);

            $info = GoodsInfo::where('newsId',$id)->update($data);
            if ($info){
                return json(1);
            }else{
                return json(0);
            }
        }else{
            return 'ERROR:NOT FIND HTML<br>CODE:404';
        }

    }

    //删除
    public function delete(){
        if(Request::isAjax()){
            $data = Request::post('id');
            $images = GoodsInfo::where('newsId',$data)->value('images');
            $fileUrl = 'static/index/images/goods/'.$images;
            $this->delFile($fileUrl);
            $info = GoodsInfo::where('newsId',$data)->delete();
            if($info){
                return json(1);
            }else{
                return json(0);
            }
        }
    }

    //---------------------------文件操作
    //上传文件
    public function uploadGoodsFile(){
        $file = Request::file('file');
        $info = $file->move('static/index/images/goods');

        if($info){
            $fileUrl = $info->getSaveName();
            return json_encode([
                'code' => 1,  // 成功状态码
                'fileUrl' =>  $fileUrl  // 文件地址
            ]);
        }else{
            return json_encode([
                'code' => 0,  // 成功状态码
            ]);
        }
    }
}