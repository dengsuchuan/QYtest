<?php
namespace app\admin\model;

use think\Model;

class Message extends Model
{
    protected $pk = 'id';
    protected $table = 'qy_message';

    protected $autoWriteTimestamp = true;//自动时间粗
    protected $createTime = 'create_time';
    protected $dateFormat = 'Y年m月d日';
}