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

Route::get('/product','www/product/index');//中农产品

Route::get('/news','www/news/index');//新闻资讯
    Route::get('/newsInfo','www/newsInfo/index');//新闻详细

Route::get('/home','www/home/index');//中农之家

Route::get('/contact','www/contact/index');//联系我们
?>
