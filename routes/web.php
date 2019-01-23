<?php
Route::group(['prefix' => 'tangshi'], function(){
//    Route::get('/data', '\Guozheng\TangShi\Controller\Web\DataController@index');
    Route::get('/test', '\Guozheng\TangShi\Controller\Web\DataController@test');
});

