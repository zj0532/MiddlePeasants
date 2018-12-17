<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/19 0019
 * Time: 13:12
 */

namespace app\www\controller;


use think\Controller;
use think\Request;

class AboutMiddleController extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        try{
            $list = $this->banner->order('br_order')->select();
            $this->assign('list',$list);
            $this->assign('imgpath',config("banner_upload_path"));
        }catch (\Exception $e){
            $this->log($e->getMessage());
        }
    }

    //企业简介
    public function abbreviation(){
        return $this->fetch('index');
    }
    //企业文化
    public function culture(){
        return $this->fetch('culture');
    }
    //观光生态园
    public function sightseeing(){
        return $this->fetch('sightseeing');
    }
    //养殖模式
    public function breed(){
        return $this->fetch('breed');
    }
    //溯源体系
    public function traceability(){
        return $this->fetch('traceability');
    }
}