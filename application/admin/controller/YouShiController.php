<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/19 0019
 * Time: 11:59
 */

namespace app\admin\controller;


use think\Controller;
use think\Exception;
use think\Request;
use app\admin\model\YouShiModel;

class YouShiController extends Controller
{
    private $you_shi;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->you_shi = new YouShiModel();
    }

    //迪拜投资房产投资优势
    public function get_youShi_list(){
        try{
            $sidebar='3';
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');
            }
            $list = $this->you_shi->order('you_order desc')->paginate(5);
            $imgpath=config("you_shi_upload_path");
            $this->assign('imgpath',$imgpath);
            $this->assign('list',$list);
            $this->assign('sidebar',$sidebar);
        }catch (\Exception $e){
            $this->error($e->getMessage());
        }
        return $this->fetch('you_shi');
    }
    //迪拜投资房产投资优势添加
    public function get_youShi_add(){
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');
            }
            $sidebar = 3;
            $this->assign('sidebar',$sidebar);
        }catch (\Exception $e){
            $this->error($e->getMessage());
        }
        return $this->fetch('you_shi_add');
    }
    //迪拜投资房产投资优势添加提交
    public function post_youShi_add(){
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');
            }
            $data = input('post.');//通过助手将POST所有数据交给 data
            $file = request()->file('you_pic');
            $imgname = "";
            // 移动到框架应用根目录/static/uploads/gonggao/ 目录下
            if ($file)
            {
                $info = $file->rule('uniqid')->move(ROOT_PATH . 'public/static/uploads/youshi/');
                if ($info)
                {
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    $imgname = $info->getSaveName();
                }
                else
                {
                    // 上传失败获取错误信息
//                    return show(500,"图片上传失败，请重试",[],200);
                    $this->error('图片上传失败，请重试');
                }
            }
            $data['you_title']=addslashes($data['you_title']);
            $this->you_shi->data([
                'you_language' => $data['you_language'],
                'you_title' => $data['you_title'],
                'you_pic' => $imgname,
                'you_content' => $data['editorValue'],
                'you_order' => $data['you_order'],
            ]);
            $this->you_shi->save();
        }catch (\Exception $e){
            $this->error($e->getMessage());
        }
        $this->success('添加成功！','/admcncp/youShi/1');
    }
    //迪拜投资房产投资优势编辑
    public function get_youShi_edit(){
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');
            }
            $data = input();//通过助手将POST所有数据交给 data
            $list = $this->you_shi->where('you_id',$data['id'])->find();
            $imgpath=config("you_shi_upload_path");
            $sidebar = 3;
            $this->assign('list',$list);
            $this->assign('imgpath',$imgpath);
            $this->assign('sidebar',$sidebar);
        }catch (\Exception $e){
            $this->error($e->getMessage());
        }
        return $this->fetch('you_shi_edit');
    }
    //迪拜投资房产投资优势编辑提交
    public function post_youShi_edit(){
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');
            }
            $data = input('post.');//通过助手将POST所有数据交给 data
            $validate = validate('YouShi');
            //验证
            if(!$validate->check($data)){
                throw new Exception($validate->getError());
            }
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('you_pic');
            if(!$file){
                throw new Exception('请选择图片');
            }
            $imgname = "";
            // 移动到框架应用根目录/static/uploads/banner/ 目录下
            if ($file)
            {
                $info = $file->rule('uniqid')->move(ROOT_PATH . 'public/static/uploads/youshi/');
                if ($info)
                {
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    $imgname = $info->getSaveName();
                }
                else
                {
                    // 上传失败获取错误信息
                    $this->error('图片上传失败，请重试');
                }
            }
            $data['you_title']=addslashes($data['you_title']);
            $data['you_content']=addslashes($data['you_content']);
            $this->you_shi->save([
                'you_title' => $data['you_title'],
                'you_content' => $data['you_content'],
                'you_pic' => $imgname,
                'you_order' => $data['you_order'],
                'you_language' => $data['you_language'],
            ],['you_id'=>$data['you_id']]);
        }catch (\Exception $e){
            $this->error($e->getMessage());
        }
        return $this->success('编辑成功！','/admcncp/youShi/1');
    }
    //迪拜投资房产投资优势删除
    public function get_youShi_del(){
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');exit();
            }
            $data = input();//通过助手将POST所有数据交给 data

            $this->you_shi->destroy($data['id']);
        }catch (\Exception $e){
            $this->error($e->getMessage());
        }
        $this->success('删除成功！','/admcncp/youShi/1');
    }
}