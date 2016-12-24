<?php 
Route::Group(['prefix'=>'cp'], function(){

        Route::get('login',[
            'as'=>'cp.admin.login',
            'uses'=>'Admin\AuthController@getLogin'
        ]); 

        Route::get('logout',[
            'as'=>'cp.admin.logout',
            'uses'=>'Admin\HomeController@getLogout'
        ]); 

        Route::post('dlogin',[
            'as'=>'cp.admin.dlogin',
            'uses'=>'Admin\AuthController@postLogin'
        ]); 


        Route::get('home',[
            'as'=>'cp.home',
            'uses'=>'Admin\HomeController@Home'
        ]); 

        /*USER MANAGE*/

        Route::get('user/index',[
            'as'=>'cp.user.index',
            'uses'=>'Admin\UserController@Index'
        ]);

         Route::get('user/del/{id}',[
            'as'=>'cp.user.del',
            'uses'=>'Admin\UserController@Del'
        ]);


         Route::get('user/edit/{id}',[
            'as'=>'cp.user.edit',
            'uses'=>'Admin\UserController@Edit'
        ]);

          Route::post('user/dedit/{id}',[
            'as'=>'cp.user.dedit',
            'uses'=>'Admin\UserController@Pedit'
        ]);

        /*NEWS MANAGE*/

        Route::get('tintuc/danhmuc',[
            'as'=>'cp.news.danhmuc',
            'uses'=>'Admin\DanhmucController@Index'
        ]); 

        Route::get('tintuc/them',[
            'as'=>'cp.news.add',
            'uses'=>'Admin\DanhmucController@Add'
        ]);

        Route::post('tintuc/dthem',[
            'as'=>'cp.news.dadd',
            'uses'=>'Admin\DanhmucController@Dadd'
        ]);

         Route::get('tintuc/del/{id}',[
            'as'=>'cp.news.del',
            'uses'=>'Admin\DanhmucController@del'
        ]);

         /*ARTICLE MANAGE*/


        Route::get('tintuc/index',[
            'as'=>'cp.news.index',
            'uses'=>'Admin\NewsController@Index'
        ]); 


         /*KHOA HOC MANAGE*/

         Route::get('khoahoc/index',[
            'as'=>'cp.khoahoc.index',
            'uses'=>'Admin\KhoaHocController@Index'
        ]); 

         Route::get('khoahoc/create',[
            'as'=>'cp.khoahoc.create',
            'uses'=>'Admin\KhoaHocController@Create'
        ]); 

        Route::post('khoahoc/do/create',[
            'as'=>'cp.khoahoc.Dcreate',
            'uses'=>'Admin\KhoaHocController@DCreate'
        ]); 

        Route::get('khoahoc/del/{id}',[
            'as'=>'cp.khoahoc.del',
            'uses'=>'Admin\KhoaHocController@Del'
        ]); 

        Route::get('khoahoc/edit/{id}',[
            'as'=>'cp.khoahoc.edit',
            'uses'=>'Admin\KhoaHocController@Edit'
        ]); 

        Route::post('khoahoc/edit/{id}',[
            'as'=>'cp.khoahoc.Dedit',
            'uses'=>'Admin\KhoaHocController@DEdit'
        ]);

        Route::get('khoahoc/detail/{id}',[
            'as'=>'cp.khoahoc.detail',
            'uses'=>'Admin\KhoaHocController@Detail'
        ]); 
});


?>