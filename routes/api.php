<?php
Route::group(['prefix' => 'tangshi', 'middleware' => ['api']], function() {
    Route::get('list', 'Guozheng\TangShi\Controllers\Api\ApiController@index');
});