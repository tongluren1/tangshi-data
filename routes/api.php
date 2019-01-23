<?php
Route::group(['prefix' => 'tangshi', 'middleware' => ['api']], function() {
    Route::get('list', '\Guozheng\TangShi\Controller\Api\ApiController@index');
});