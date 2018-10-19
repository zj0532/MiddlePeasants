<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/19 0019
 * Time: 14:16
 */

namespace app\www\controller;


use think\Controller;

class ProductController extends Controller
{
    public function product(){
        return $this->fetch('product');
    }
}