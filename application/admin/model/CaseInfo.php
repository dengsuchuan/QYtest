<?php
namespace app\admin\model;

use think\Model;

class CaseInfo extends Model
{
    protected $pk = 'id';
    protected $table = 'qy_caseinfo';

    protected $autoWriteTimestamp = true;//自动时间粗
    protected $create_time = 'create_time';
    protected $dateFormat = 'Y年m月d日';
}