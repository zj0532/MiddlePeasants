<?php
use think\Route;
Route::get('/','www/index/index');//中农伟业首页

Route::get('/aboutMiddle','www/aboutMiddle/abbreviation');//关于中农
    Route::get('/abbreviation','www/aboutMiddle/abbreviation');//企业简介
    Route::get('/culture','www/aboutMiddle/culture');//企业文化
    Route::get('/sightseeing','www/aboutMiddle/sightseeing');//观光生态园
    Route::get('/breed','www/aboutMiddle/breed');//养殖模式
    Route::get('/traceability','www/aboutMiddle/traceability');//溯源体系

Route::get('/industry','www/industry/index');//全产业链

Route::get('/product','www/product/product');//中农产品

Route::get('/news','www/news/news');//新闻资讯
    Route::get('/newsInfo/:page','www/news/newsInfo');//新闻详细

Route::get('/home','www/home/home');//中农之家

Route::get('/contact','www/contact/contact');//联系我们
?>
