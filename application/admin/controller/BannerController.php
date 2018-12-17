<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/17 0017
 * Time: 10:58
 */

namespace app\admin\controller;


use think\Controller;

class BannerController extends Controller
{
    //BannerModel list
    public function get_banner_list(){
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');
            }
            $list = $this->banner->order('br_order desc')->paginate(5);
            $imgpath=config("banner_upload_path");
            $this->assign('imgpath',$imgpath);
            $this->assign('list',$list);
            $this->assign('sidebar','4');
        }catch (\Exception $e){
            $this->log($e->getMessage(),'error');
            $this->error($e->getMessage());
        }
        return $this->fetch('banner');
    }
    //Banner添加
    public function get_banner_add(){
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');
            }
            $this->assign('sidebar','4');
        }catch (\Exception $e){
            $this->error($e->getMessage());
        }
        return $this->fetch('banner_add');
    }
    //Banner添加提交
    public function post_banner_add(){
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');
            }
            $data = input('post.');//通过助手将POST所有数据交给 data
            $file = request()->file('br_pic');
            $imgname = "";
            // 移动到框架应用根目录/static/uploads/gonggao/ 目录下
            if ($file)
            {
                $info = $file->rule('uniqid')->move(ROOT_PATH . 'public/static/uploads/banner/');
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
            $data['br_title']=addslashes($data['br_title']);
            $this->banner->data([
                'br_language' => $data['br_language'],
                'br_title' => $data['br_title'],
                'br_pic' => $imgname,
                'br_order' => $data['br_order'],
            ]);
            $this->banner->save();
        }catch (\Exception $e){
            $this->log($e->getMessage(),'error');
            return show(404,'新增中农产品失败！',200);
        }
        return show(200,'新增中农产品成功！',200);
    }
    //Banner编辑
    public function get_banner_edit(){
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');
            }
            $data = input();//通过助手将POST所有数据交给 data
            $list = $this->banner->where('br_id',$data['id'])->find();
            $imgpath=config("banner_upload_path");
            $this->assign('list',$list);
            $this->assign('imgpath',$imgpath);
            $this->assign('sidebar','4');
        }catch (\Exception $e){
            $this->error($e->getMessage());
        }
        return $this->fetch('banner_edit');
    }
    //Banner编辑提交
    public function post_banner_edit(){
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');
            }
            $data = input('post.');//通过助手将POST所有数据交给 data
            $validate = validate('Banner');
            //验证
            if(!$validate->check($data)){
                return show(404,$validate->getError(),200);
            }
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('br_pic');
            if(is_null($file)){
                return show(404,'请选择图片！',200);
            }
            $imgname = "";
            // 移动到框架应用根目录/static/uploads/banner/ 目录下
            if ($file)
            {
                $info = $file->rule('uniqid')->move(ROOT_PATH . 'public/static/uploads/banner/');
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
            $data['br_title']=addslashes($data['br_title']);
            $this->banner->save([
                'br_title' => $data['br_title'],
                'br_pic' => $imgname,
                'br_order' => $data['br_order'],
                'br_language' => $data['br_language'],
            ],['br_id'=>$data['br_id']]);
        }catch (\Exception $e){
            $this->log($e->getMessage(),'error');
            return show(404,'编辑中农产品失败！',200);
        }
        return show(200,'编辑中农产品成功！',200);
    }
    //Banner删除
    public function get_banner_del(){
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');exit();
            }
            $data = input();//通过助手将POST所有数据交给 data

            $this->banner->destroy($data['id']);
        }catch (\Exception $e){
            $this->error($e->getMessage());
        }
//        return show(200,'删除成功！',200);
        $this->success('删除成功！');
    }
}