<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/19 0019
 * Time: 14:16
 */

namespace app\www\controller;


use think\Controller;
use think\Log;

class ProductController extends Controller
{
    public function product(){
        try{
            $list = $this->product->order('pt_order desc')->paginate(5);
            $banner = $this->banner->order('br_order')->select();
            $this->assign('banner',$banner);
            $this->assign('list',$list);
            $this->assign('imgpath',config("banner_upload_path"));
            $this->assign('product_pic',config("product_upload_path"));
        }catch(\Exception $e){
            Log::write($e->getMessage(),'error');
        }

        return $this->fetch('product');
    }
}