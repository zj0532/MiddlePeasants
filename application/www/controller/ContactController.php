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
        try{
            $banner = $this->banner->order('br_order')->select();
            $this->assign('banner',$banner);
            $this->assign('banner_pic',config("banner_upload_path"));
        }catch (\Exception $e){
            $this->log($e->getMessage());
            $this->error('页面错误！');
        }
        return $this->fetch('contact');
    }
}