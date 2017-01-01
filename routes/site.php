<?php 

	Route::get('/',[
	    'as'=>'cp.home',
	    'uses'=>'HomeController@Index'
	]);

   Route::get('detail/{id}',[
        'as'=>'cp.home.detail',
        'uses'=>'HomeController@Detail'
   ]); 

   // REGISTER KHOA HOC

   Route::post('register/{id}',[
        'as'=>'cp.home.register',
        'uses'=>'HomeController@Register'
   ]); 

	Route::get('archive',[
        'as'=>'cp.home.archive',
        'uses'=>'HomeController@ArchiveKh'
	]); 

   Route::get('new/detail/{id}',[
        'as'=>'cp.home.detail.new',
        'uses'=>'HomeController@DetailNew'
   ]); 

   Route::get('new/archive',[
        'as'=>'cp.home.archive.new',
        'uses'=>'HomeController@Archive'
   ]); 

   // -LIEN HE

    Route::get('lienhe.html',[
        'as'=>'cp.home.lienhe',
        'uses'=>'HomeController@LienHe'
   ]); 

    Route::get('gioithieu.html',[
        'as'=>'cp.home.gioithieu',
        'uses'=>'HomeController@GioiThieu'
   ]); 

   Route::get('profile',[
        'as'=>'cp.home.profile',
        'uses'=>'HomeController@Profile'
   ]); 

  Route::get('profile/del/{idU}/{idK}',[
        'as'=>'cp.home.profile.del',
        'uses'=>'HomeController@Del'
   ]); 

   Route::post('profile/do/',[
        'as'=>'cp.home.profile.do',
        'uses'=>'HomeController@PCN'
   ]); 





?>