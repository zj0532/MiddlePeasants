<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/19 0019
 * Time: 14:32
 */

namespace app\www\controller;


use think\Controller;

class ContactController extends Controller
{
    public function contact(){
        return $this->fetch('contact');
    }
}