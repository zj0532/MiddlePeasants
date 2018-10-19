<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/25 0025
 * Time: 11:21
 */

namespace app\admin\Model;


use think\Model;
use traits\model\SoftDelete;

class YeWuModel extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = 'base_business';
    // 定义时间戳字段名
    protected $createTime = 'create_time';
    protected $updateTime = 'update_time';
    //软删除
    use SoftDelete;
    protected $deleteTime = 'delete_time';
}