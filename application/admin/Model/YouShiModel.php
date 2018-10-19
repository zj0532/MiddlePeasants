<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/20 0020
 * Time: 15:53
 */

namespace app\admin\Model;


use think\Model;
use traits\model\SoftDelete;

class YouShiModel extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = 'base_you_shi';
    // 定义时间戳字段名
    protected $createTime = 'you_create';
    protected $updateTime = 'you_update';
    //软删除
    use SoftDelete;
    protected $deleteTime = 'you_delete';
}