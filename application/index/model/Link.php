<?php
namespace app\index\model;

use think\Model;

class Link extends Model
{
    protected $pk = 'id';
    protected $table = 'qy_link';

    protected $autoWriteTimestamp = true;//自动时间粗
    protected $createTime = 'create_time';
    protected $dateFormat = 'Y年m月d日';
}