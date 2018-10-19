<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/19 0019
 * Time: 14:30
 */

namespace app\www\controller;


use think\Controller;

class HomeController extends Controller
{
    public function home(){
        return $this->fetch('home');
    }
}