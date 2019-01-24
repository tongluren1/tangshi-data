<?php
Route::group(['prefix' => 'api/tangshi'], function() {
    Route::get('list', '\Guozheng\TangShi\Controller\Api\ApiController@index');
});