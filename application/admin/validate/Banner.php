<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/25 0025
 * Time: 13:46
 */

namespace app\admin\validate;


use think\Validate;

class Banner extends Validate
{
    protected $rule = [
        'br_language' => 'require',
        'br_order' => 'require',
        'br_title' => 'require',
    ];

    protected $message  = [
        'br_order.require' => '请填写排序',
        'br_title.require' => '请填写标题',
        'br_language.require' => '请选择语言',
    ];
}