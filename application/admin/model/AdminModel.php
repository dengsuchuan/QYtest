<?php
namespace app\admin\model;

use think\Model;

class AdminModel extends Model
{
    protected $pk = 'id';
    protected $table = 'qy_admin';

    protected $autoWriteTimestamp = true;//自动时间粗
    protected $create_time = 'create_time';
    protected $dateFormat = 'Y年m月d日';
}