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

class ProductModel extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = 'base_product';
    // 定义时间戳字段名
    protected $createTime = 'pt_create';
    protected $updateTime = 'pt_update';
    //软删除
    use SoftDelete;
    protected $deleteTime = 'pt_delete';
}