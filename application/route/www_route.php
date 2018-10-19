<?php
use think\Route;
Route::get('/','/cn');//中农伟业首页
Route::get('/cn','www/index/index');//中农伟业首页



Route::get('/cn/emaar_south','www/emaar_south/index_cn');//伊玛尔 南区
Route::get('/cn/emaar_beach_vista','www/emaar_beach_vista/index_cn');//伊玛尔 海滨新区
Route::get('/cn/emaar_mountain_villa','www/emaar_mountain_villa/index_cn');//伊玛尔 山庄
Route::get('/cn/emaar_cloud_creek_port','www/emaar_cloud_creek_port/index_cn');//伊玛尔 云溪港
Route::get('/cn/emaar_centre','www/emaar_centre/index_cn');//伊玛尔 中心区
Route::get('/cn/news_list/:page','www/newslist/list_cn');//伊玛尔 新闻列表
Route::get('/cn/news/:id','www/news/page_cn');//伊玛尔 新闻
//关于我们
Route::get('/cn/ibk','www/Ibk/company_introduction_cn');//ibk 公司介绍
Route::get('/cn/framework_cn','www/Ibk/framework_cn');//组织架构
Route::get('/cn/member_list_cn','www/ibk/member_list_cn');//重要成员列表
Route::get('/cn/member_info_cn','www/ibk/member_info_cn');//重要成员详情
Route::get('/cn/business_cn','www/Ibk/business_cn');//主营业务
//迪拜资讯
Route::get('/cn/investment_advantage_cn','www/news/investment_advantage_cn');//迪拜投资房产投资优势
Route::get('/cn/new_list_cn','www/news/new_list_cn');//迪拜投资房产投资优势新闻列表
Route::get('/cn/new_content_cn/:id','www/news/new_content_cn');//迪拜投资房产投资优势新闻详情
//迪拜房产
Route::get('/cn/emaar','www/emaar/index');//EMAAR房产介绍
Route::get('/cn/dp','www/dp/index');//DP房产介绍
Route::get('/cn/eit','www/eit/index');//ELLINGTON艾灵顿房产介绍

Route::get('/cn/contentus','www/contentus/lian_xwm');//联系我们
Route::post('/contentus','www/contentus/post_contentus');//联系我们提交

Route::get('/en','www/index/index_en');//伊玛尔首页
Route::get('/en/emaar_south','www/emaar_south/index_en');//伊玛尔 南区
Route::get('/en/emaar_beach_vista','www/emaar_beach_vista/index_en');//伊玛尔 海滨新区
Route::get('/en/emaar_mountain_villa','www/emaar_mountain_villa/index_en');//伊玛尔 山庄
Route::get('/en/emaar_cloud_creek_port','www/emaar_cloud_creek_port/index_en');//伊玛尔 云溪港
Route::get('/en/emaar_centre','www/emaar_centre/index_en');//伊玛尔 中心区
Route::get('/en/news_list/:page','www/newslist/list_en');//伊玛尔 新闻列表
Route::get('/en/news/:id','www/news/page_en');//伊玛尔 新闻

Route::get('/ar','www/index/index_ar');//伊玛尔首页
Route::get('/ar/emaar_south','www/emaar_south/index_ar');//伊玛尔 南区
Route::get('/ar/emaar_beach_vista','www/emaar_beach_vista/index_ar');//伊玛尔 海滨新区
Route::get('/ar/emaar_mountain_villa','www/emaar_mountain_villa/index_ar');//伊玛尔 山庄
Route::get('/ar/emaar_cloud_creek_port','www/emaar_cloud_creek_port/index_ar');//伊玛尔 云溪港
Route::get('/ar/emaar_centre','www/emaar_centre/index_ar');//伊玛尔 中心区
Route::get('/ar/news_list/:page','www/newslist/list_ar');//伊玛尔 新闻列表
Route::get('/ar/news/:id','www/news/page_ar');//伊玛尔 新闻
?>
