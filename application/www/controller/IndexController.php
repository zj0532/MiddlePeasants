<?php
namespace app\www\controller;

use think\Controller;
use think\Request;
use app\admin\model\NewsModel;
use think\Log;

class IndexController extends Controller
{
    private $new;

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->new = new NewsModel();
    }

    public function index(){
        try{
            $list=$this->new->paginate(3);
            foreach ($list as $key=>$value){
                $list[$key]['ns_descript'] = mb_substr($value['ns_descript'],0,30,'utf-8');
            }
            $new_imgpath = config("news_upload_path");
            $this->assign('new_imgpath',$new_imgpath);
            $this->assign('list',$list);
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('index');
    }
}
