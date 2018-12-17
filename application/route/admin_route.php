<?php
use think\Route;
Route::get('/admcncp/','admin/index/get_index');//管理员首页
Route::get('/admcncp/login','admin/login/get_login');//登陆页面

//Route::get('/admcncp/jiesuan/:page','admin/index/get_jiesuan');//结算页面
//Route::get('/admcncp/zhanghu/:page','admin/index/get_zhanghu');//账户页面
//Route::get('/admcncp/jilu/:page','admin/index/get_jilu');//操作记录页面

Route::post('/admcncp/login','admin/login/post_login');//登陆逻辑
Route::post('/admcncp/quit','admin/login/post_quit');//登陆逻辑

//用户路由
Route::get('/admcncp/index_add','admin/index/get_index_add');//管理员 添加
Route::post('/admcncp/index_add','admin/index/post_index_add');//管理员 添加
Route::get('/admcncp/indexEdit/:id','admin/index/get_index_edit');//管理员 编辑
Route::post('/admcncp/indexEdit/:id','admin/index/post_index_edit');//管理员 编辑



//新闻
Route::get('admcncp/news/:page','admin/new/get_news_list');
Route::get('admcncp/newsAdd','admin/new/get_news_add');
Route::post('admcncp/newsAdd','admin/new/post_news_add');
Route::get('admcncp/newsEdit/:id/:page','admin/new/get_news_edit');
Route::post('admcncp/newsEdit/:id/:page','admin/new/post_news_edit');
Route::get('admcncp/newsDel/:id/:page','admin/new/get_news_del');


//联系我们
Route::get('admcncp/lxwm/:page','admin/index/get_lxwm_list');
Route::get('admcncp/lxwmEdit/:id/:page','admin/index/get_lxwm_edit');
Route::post('admcncp/lxwmEdit/:id/:page','admin/index/post_lxwm_edit');

//中农产品
Route::get('admcncp/product/','admin/product/get_product_list');
Route::get('admcncp/productAdd','admin/product/get_product_add');
Route::post('admcncp/productAdd','admin/product/post_product_add');
Route::get('admcncp/productEdit/:id','admin/product/get_product_edit');
Route::post('admcncp/productEdit/','admin/product/post_product_edit');
Route::get('admcncp/productDel/:id','admin/product/get_product_del');

//主营业务
Route::get('admcncp/yeWu','admin/YeWu/get_yeWu_list');
Route::get('admcncp/yeWuAdd','admin/YeWu/get_yeWu_add');
Route::post('admcncp/yeWuAdd','admin/YeWu/post_yeWu_add');
Route::get('admcncp/yeWuEdit/:id','admin/YeWu/get_yeWu_edit');
Route::post('admcncp/yeWuEdit/:id','admin/YeWu/post_yeWu_edit');
Route::get('admcncp/yeWuDel/:id','admin/YeWu/get_yeWu_del');
?>
