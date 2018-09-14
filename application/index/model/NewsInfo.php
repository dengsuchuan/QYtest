<?php
namespace app\index\model;

use think\Model;

class NewsInfo extends Model
{
    protected $pk = 'id';
    protected $table = 'qy_newsinfo';

    protected $autoWriteTimestamp = true;//自动时间戳
    protected $createTime = 'create_time';
    protected $dateFormat = 'Y年m月d日';
}