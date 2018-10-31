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
use think\Log;
use think\Request;

class NewsController extends Controller
{
    private $new;

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->new = new NewsModel();
    }

    public function news(){
        try{
            $list = $this->new ->order('ns_intime desc')->paginate(4);
            $imgpath=config("news_upload_path");
            $this->assign('imgpath',$imgpath);
            $this->assign('list',$list);
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('news');
    }
    //新闻内容
    public function newsInfo(){
        try{
            $data = input();
            $result = $this->new->where('ns_id',$data['page'])->order('ns_intime desc')->find();
            $result['up'] = $this->new->where('ns_id','<',$data['page'])->order('ns_intime desc')->find();
            $result['next'] = $this->new->where('ns_id','>',$data['page'])->order('ns_intime desc')->find();
            $this->assign('result',$result);
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('news_info');
    }
}