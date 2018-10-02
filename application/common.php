<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
//截取右边的展示内容

use app\index\model\GoodsClass;
use app\index\model\GoodsInfo;
use app\index\model\NewsClass;
use app\index\model\NewsInfo;
use app\index\model\CasesClass;
use app\index\model\CaseInfo;

//页数
function getInt($int){
    $int = $int > (int)$int?(int)$int+1:1;
    return $int;
}

function msubstr($content) {
    return mb_substr(strip_tags(str_replace(['&nbsp;','nbsp;','&amp;','nbsp;'],'',$content)),0,450).'...';
}

function getGoodsClassName($id){
    return GoodsClass::where('GoodsClassId',$id)->value("ClassName");
}

function getNewsClassName($id){
    return NewsClass::where('NewsClassId',$id)->value("ClassName");
}

function getCasesClassName($id){
    return CasesClass::where('CaseClassId',$id)->value("ClassName");
}

function getGoodsClassCount($classId){
    return count(GoodsInfo::where('goodsclassid',$classId)->select());
}
function getCasesClassCount($classId){
    return count(CaseInfo::where('caseclassid',$classId)->select());
}
function getNewsClassCount($classId){
    return count(NewsInfo::where('newsclassid',$classId)->select());
}