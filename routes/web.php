<?php
Route::group(['prefix' => 'tangshi'], function(){
    Route::get('/data', '\Guozheng\TangShi\Controller\DataController@index');
});

