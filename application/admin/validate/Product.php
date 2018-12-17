<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/20 0020
 * Time: 17:57
 */

namespace app\admin\validate;

use think\Validate;
class Product extends Validate
{
    protected $rule = [
        'pt_title' => 'require',
        'pt_language' => 'require',
        'pt_order' => 'require',
    ];

    protected $message  = [
        'pt_order.require' => '请填写排序',
        'pt_title.require' => '请填写标题',
        'pt_language.require' => '请选择语言',
    ];
}