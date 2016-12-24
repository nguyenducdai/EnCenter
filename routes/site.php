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

  



?>