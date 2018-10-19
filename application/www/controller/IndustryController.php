<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/19 0019
 * Time: 14:13
 */

namespace app\www\controller;


use think\Controller;

class IndustryController extends Controller
{
    public function index(){
        return $this->fetch('index');
    }
}