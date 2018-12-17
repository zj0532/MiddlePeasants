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

use think\Log;

class ProductController extends Controller
{

    public function __construct(Request $request = null)
    {
        parent::__construct($request);

    }

    //中农产品list
    public function get_product_list(){
        try{
            $sidebar='3';
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');
            }
            $list = $this->product->order('pt_order desc')->paginate(5);
            $imgpath=config("product_upload_path");
            $this->assign('imgpath',$imgpath);
            $this->assign('list',$list);
            $this->assign('sidebar',$sidebar);
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
            $this->error($e->getMessage());
        }
        return $this->fetch('product');
    }
    //中农产品添加
    public function get_product_add(){
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
        return $this->fetch('product_add');
    }
    //中农产品添加提交
    public function post_product_add(){
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');
            }
            $data = input('post.');//通过助手将POST所有数据交给 data
            $file = request()->file('pt_pic');
            $imgname = "";
            // 移动到框架应用根目录/static/uploads/gonggao/ 目录下
            if ($file)
            {
                $info = $file->rule('uniqid')->move(ROOT_PATH . 'public/static/uploads/product/');
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
            $data['pt_title']=addslashes($data['pt_title']);
            $this->product->data([
                'pt_language' => $data['pt_language'],
                'pt_title' => $data['pt_title'],
                'pt_pic' => $imgname,
                'pt_order' => $data['pt_order'],
            ]);
            $this->product->save();
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
            return show(404,'新增中农产品失败！',200);
        }
        return show(200,'新增中农产品成功！',200);
    }
    //中农产品编辑
    public function get_product_edit(){
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');
            }
            $data = input();//通过助手将POST所有数据交给 data
            $list = $this->product->where('pt_id',$data['id'])->find();
            $imgpath=config("product_upload_path");
            $sidebar = 3;
            $this->assign('list',$list);
            $this->assign('imgpath',$imgpath);
            $this->assign('sidebar',$sidebar);
        }catch (\Exception $e){
            $this->error($e->getMessage());
        }
        return $this->fetch('product_edit');
    }
    //中农产品编辑提交
    public function post_product_edit(){
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');
            }
            $data = input('post.');//通过助手将POST所有数据交给 data
            $validate = validate('Product');
            //验证
            if(!$validate->check($data)){
                return show(404,$validate->getError(),200);
            }
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('pt_pic');
            if(!$file){
                return show(404,'请选择图片！',200);
            }
            $imgname = "";
            // 移动到框架应用根目录/static/uploads/banner/ 目录下
            if ($file)
            {
                $info = $file->rule('uniqid')->move(ROOT_PATH . 'public/static/uploads/product/');
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
            $data['pt_title']=addslashes($data['pt_title']);
            $this->product->save([
                'pt_title' => $data['pt_title'],
                'pt_pic' => $imgname,
                'pt_order' => $data['pt_order'],
                'pt_language' => $data['pt_language'],
            ],['pt_id'=>$data['pt_id']]);
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
            return show(200,'编辑中农产品失败！',200);
        }
        return show(200,'编辑中农产品成功！',200);
    }
    //中农产品删除
    public function get_product_del(){
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');exit();
            }
            $data = input();//通过助手将POST所有数据交给 data

            $this->product->destroy($data['id']);
        }catch (\Exception $e){
            $this->error($e->getMessage());
        }
//        return show(200,'删除成功！',200);
        $this->success('删除成功！');
    }
}