<?php
Route::group(['prefix' => 'tangshi'], function() {
    Route::get('list', '\Guozheng\TangShi\Controller\Api\ApiController@index');
});