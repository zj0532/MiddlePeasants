<?php
namespace app\www\controller;
use think\Controller;
use think\Db;
use think\Request;
class IndexController extends Controller
{
    public function index(){
        return $this->fetch('index');
    }
}
