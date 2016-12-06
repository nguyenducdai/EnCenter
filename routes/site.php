<?php 

Route::get('/',[
    'as'=>'cp.home',
    'uses'=>'HomeController@Index'
]);

?>