<?php

Route::group(['prefix' => 'tangshi', 'middleware' => ['api']], function() {
    Route::get('list', 'ApiController@index');
});