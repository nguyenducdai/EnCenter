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


        Route::get('tintuc/create',[
            'as'=>'cp.news.add',
            'uses'=>'Admin\NewsController@Add'
        ]); 

        Route::post('tintuc/dcreate',[
            'as'=>'cp.news.Dcreate',
            'uses'=>'Admin\NewsController@DAdd'
        ]);

         Route::get('tintuc/del/{id}',[
            'as'=>'cp.news.del',
            'uses'=>'Admin\NewsController@Del'
        ]);

        Route::get('tintuc/edit/{id}',[
            'as'=>'cp.news.edit',
            'uses'=>'Admin\NewsController@Edit'
        ]);

          Route::post('tintuc/dedit/{id}',[
            'as'=>'cp.news.Dedit',
            'uses'=>'Admin\NewsController@DEdit'
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


        //Học vien


         Route::get('hocvien/index',[
            'as'=>'cp.hocvien.index',
            'uses'=>'Admin\HocvienController@index'
        ]); 

        Route::get('hocvien/del/{id}',[
            'as'=>'cp.hocvien.del',
            'uses'=>'Admin\HocvienController@Del'
        ]); 


         Route::get('hocvien/create',[
            'as'=>'cp.hocvien.add',
            'uses'=>'Admin\HocvienController@Add'
        ]); 

        Route::post('hocvien/create',[
            'as'=>'cp.hocvien.Dcreate',
            'uses'=>'Admin\HocvienController@Dcreate'
        ]);


        //SLIDE

         Route::post('slide/create',[
            'as'=>'cp.slide.Dcreate',
            'uses'=>'Admin\SlideController@Dcreate'
        ]);

          Route::get('slide/create',[
            'as'=>'cp.slide.create',
            'uses'=>'Admin\SlideController@create'
        ]);

        Route::get('slide/index',[
            'as'=>'cp.slide.index',
            'uses'=>'Admin\SlideController@Index'
        ]);

        Route::get('slide/del/{id}',[
            'as'=>'cp.slide.del',
            'uses'=>'Admin\SlideController@Del'
        ]);
        Route::get('slide/edit/{id}',[
            'as'=>'cp.slide.edit',
            'uses'=>'Admin\SlideController@Edit'
        ]);

        Route::post('slide/dedit/{id}',[
            'as'=>'cp.slide.dedit',
            'uses'=>'Admin\SlideController@DEdit'
        ]);





});


?>