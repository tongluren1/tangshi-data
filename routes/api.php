<?php
Route::group(['prefix' => 'api/tangshi', 'middleware' => ['api']], function() {
    Route::get('list', '\Guozheng\TangShi\Controller\Api\ApiController@index');
});