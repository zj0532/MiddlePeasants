<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/25 0025
 * Time: 11:10
 */

namespace app\admin\controller;


use think\Controller;
use app\admin\Model\YeWuModel;
use think\Request;
use think\Exception;

class YeWuController extends Controller
{
    private $ye_wu;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->ye_wu = new YeWuModel();
    }

    //主营业务页面
    public function get_yeWu_list(){
        try{
            $sidebar='4';
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');
            }
            $list = $this->ye_wu->order('order')->paginate(4);
            $imgpath=config("ye_wu_upload_path");
            $this->assign('imgpath',$imgpath);
            $this->assign('list',$list);
            $this->assign('sidebar',$sidebar);
        }catch (\Exception $e){
            $this->error($e->getMessage());
        }
        return $this->fetch('ye_wu');
    }
    //主营业务添加页面
    public function get_yeWu_add(){
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');
            }
            $sidebar = 4;
            $this->assign('sidebar',$sidebar);
        }catch (\Exception $e){
            $this->error($e->getMessage());
        }
        return $this->fetch('ye_wu_add');
    }
    //主营业务添加提交页面
    public function post_yeWu_add(){
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');
            }
            $data = input('post.');//通过助手将POST所有数据交给 data
            $file = request()->file('pic');
            $imgname = "";
            // 移动到框架应用根目录/static/uploads/gonggao/ 目录下
            if ($file)
            {
                $info = $file->rule('uniqid')->move(ROOT_PATH . 'public/static/uploads/yewu/');
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
            $data['title']=addslashes($data['title']);
            $data['content']=addslashes($data['editorValue']);
            $this->ye_wu->data([
                'language' => $data['language'],
                'title' => $data['title'],
                'pic' => $imgname,
                'content' => $data['content'],
                'order' => $data['order'],
            ]);
            $this->ye_wu->save();
        }catch (\Exception $e){
            $this->error($e->getMessage());
        }
        $this->success('添加成功！','/admcncp/yeWu');
    }
    //主营业务编辑页面
    public function get_yeWu_edit(){
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');
            }
            $data = input();//通过助手将POST所有数据交给 data
            $list = $this->ye_wu->where('id',$data['id'])->find();
            $imgpath=config("ye_wu_upload_path");
            $sidebar = 4;
            $this->assign('list',$list);
            $this->assign('imgpath',$imgpath);
            $this->assign('sidebar',$sidebar);
        }catch (\Exception $e){
            $this->error($e->getMessage());
        }
        return $this->fetch('ye_wu_edit');
    }
    //主营业务编辑提交页面
    public function post_yeWu_edit(){
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');
            }
            $data = input('post.');//通过助手将POST所有数据交给 data
            $validate = validate('YeWu');
            //验证
            if(!$validate->check($data)){
                throw new Exception($validate->getError());
            }
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('pic');
            if(!$file){
                throw new Exception('请选择图片');
            }
            $imgname = "";
            // 移动到框架应用根目录/static/uploads/banner/ 目录下
            if ($file)
            {
                $info = $file->rule('uniqid')->move(ROOT_PATH . 'public/static/uploads/yewu/');
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
            $data['title']=addslashes($data['title']);
            $data['content']=addslashes($data['content']);
            $this->ye_wu->save([
                'title' => $data['title'],
                'content' => $data['content'],
                'pic' => $imgname,
                'order' => $data['order'],
                'language' => $data['language'],
            ],['id'=>$data['id']]);
        }catch (\Exception $e){
            $this->error($e->getMessage());
        }
        return $this->success('编辑成功！','/admcncp/yeWu');
    }
    //主营业务删除页面
    public function get_yeWu_del(){
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');exit();
            }
            $data = input();//通过助手将POST所有数据交给 data

            $this->ye_wu->destroy($data['id']);
        }catch (\Exception $e){
            $this->error($e->getMessage());
        }
        $this->success('删除成功！','/admcncp/yeWu');
    }
}