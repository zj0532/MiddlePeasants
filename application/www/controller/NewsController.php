<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/19 0019
 * Time: 14:22
 */

namespace app\www\controller;


use think\Controller;
use app\admin\model\NewsModel;

class NewsController extends Controller
{
    public function news(){
        try{
            $new = new NewsModel();
            $list = $new ->order('ns_intime desc')->select();
            $this->assign('list',$list);
            Log::write('测试日志信息，这是警告级别，并且实时写入','notice');
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('news');
    }
    //新闻内容
    public function newsInfo(){
        return $this->fetch('news_info');
    }
}