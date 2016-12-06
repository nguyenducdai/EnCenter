<?php 
Route::Group(['prefix'=>'cp'], function(){

        Route::get('home',[
            'as'=>'cp.home',
            'uses'=>'Admin\HomeController@Home'
        ]);
});


?>