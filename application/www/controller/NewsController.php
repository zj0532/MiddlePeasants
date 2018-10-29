<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/19 0019
 * Time: 14:22
 */

namespace app\www\controller;


use think\Controller;

class NewsController extends Controller
{
    public function news(){
        return $this->fetch('news');
    }
    //新闻内容
    public function newsInfo(){
        return $this->fetch('news_info');
    }
}